<?php

namespace App\Http\Controllers\Account;

use App\Helpers\VideoStream;
use App\Http\Controllers\Controller;
use App\Media;
use App\SchoolAccount;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function login(){
        return view('auth.account_login');
    }
    // 1599408214
    public function auth(Request $request){
        session()->forget('atg_error');
        $data = $request->validate([
            'code' => 'required|exists:school_accounts,code',
            'password' => 'required|string',
        ]);
        $account = SchoolAccount::where('code' , $data['code'])->first();
        // dd(strtolower(decrypt($account->password)));
        if(strtolower(decrypt($account->password)) == strtolower($data['password'])){
            session()->put('school_account' , encrypt($account));
            return redirect()->route('account.dashboard');
        }
        else{
            return redirect()->back()->withErrors(['password' => 'Password is incorrect. please try again!']);
        }
    }

    public function dashboard(){
        $account = decrypt(session()->get('school_account'));
        if(empty($account)){
            return redirect()->route('account.login');
        }
        $status = false;
        if($account->status == 1){
            $status = true;
            $medias = Media::where('status','Visible')
                        ->where('klass_id' , $account->klass_id)
                        ->where('term' , $account->term)
                        ->orderby('title','asc')->paginate(50);
        }
        else{
            $media = [];
            session()->flash('error' , 'Your account in inactive!  Pay to activate your account');
        }

        return view('account.dashboard' , compact('account' , 'medias' , 'status'));
    }

    public function logout(Request $request){
        session()->forget('school_account');
        return redirect()->route('account.login');
    }

    public function download(Request $request){
        $data = $request->validate([
            'media_id' => 'required',
        ]);

        $media = Media::findorfail($data['media_id']);

        $name = $media->title;
        $filename = $media->getAttachment();
        $amt = $media->price;

        $raw = decrypt(session()->get('school_account'));
        $account = SchoolAccount::findorfail($raw->id);


        if($account->available > 0){
            $exists = Storage::disk('local')->exists($filename);
            if($exists){

                $account->available--;
                $account->save();
                $account->refresh();
                session()->put('school_account' , encrypt($account));

                session()->flash('success_msg','Downloading in progress...');
                return downloadFileFromPrivateStorage($filename , $name);
            }

            session()->flash('error_msg','Download unsuccessful!');
            return back();

        }
        session()->flash('error_msg','Insufficient funds!');
        return back();
    }

    public function atg_callback(Request $request){
        $user = auth()->user();
        $reference = $request->reference;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://aimtoget.com/payment/verify/".$reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_HTTPHEADER => array(
            // 	// Set Here Your Requesred Headers

            // ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $result = json_decode($response);

            if(empty($result)){
                session()->flash('error_msg','Error occurred! Couldnt validate reference No. #'.$reference);
                session()->put('atg_error' , 'Error occurred! Couldnt validate reference No. #'.$reference. ' Call the admin with this reference number to manually verify your payment!');
                return response()->json();
            }

            $recharge = [
                'user_id' => $user->id ?? null,
                'uuid' => $reference,
                'amount' => $result->data->amount,
                'purpose' => 'Your airtime recharge was successful!',
                'type' => 'Deposit',
                'status' => 'Completed',
            ];
            Transaction::create($recharge);

            session()->flash('success_msg','Recharge Successful!');
            session()->forget('atg_error');
            return response()->json();
        }
    }


    public function watchVideoAttachment($filename){
        $stream = new VideoStream(decrypt($filename));
        return $stream->start();
    }


}
