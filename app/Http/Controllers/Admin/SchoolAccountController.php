<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SchoolAccount;
use Illuminate\Http\Request;

class SchoolAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['available'] = $data['downloads'];
        $data['password'] = encrypt(time());
        $account = SchoolAccount::create($data);
        session()->flash('notify_msg','School account added successfully!');
        return redirect()->route('admin.schools.show' , $account->school_id);
    }

    public function validateData($request){
        return $request->validate([
            'school_id' => 'required|string|exists:schools,id',
            'klass_id' => 'required|string|exists:klasses,id',
            'name' => 'required|string',
            'code' => 'required|string',
            'amount' => 'required|string',
            'downloads' => 'required|string',
            'term' => 'required|string',
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
