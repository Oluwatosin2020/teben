<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Media;
use App\SchoolAccount;
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
        $medias = Media::where('status','Visible')
                        ->where('klass_id' , $account->klass_id)
                        ->where('term' , $account->term)
                        ->orderby('title','asc')->paginate(50);
        return view('account.dashboard' , compact('account' , 'medias'));
    }

    public function download(Request $request){
        $data = $request->validate([
            'media_id' => 'required',
        ]);

        $media = Media::findorfail(decrypt($data['media_id']));

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
}
