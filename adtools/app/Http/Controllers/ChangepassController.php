<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ChangepassController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @param string $strnotification
     * @return \Illuminate\Http\Response
     */
    public function index($strnotification=null)
    {
        return View('auth.changepass', compact('strnotification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $seq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //var_dump($request->email); exit();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);
        $requestdata = request()->except(['_token', '_method']);
        $tmpuser = User::where('email', $request->email);
        if($request->password == $request->password_confirmation){
            $tmpuser->update(['password' => bcrypt($request->password)]);
            $strnotification = '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Attention!</h4>
                Your Password has been changed!!!
              </div>';
            return $this->index($strnotification);
        }else{
            $strnotification = '<div class="callout callout-danger">
                <h4>Error!</h4>
                <p>Your Password is not same!!!</p>
              </div>';
            return $this->index($strnotification);
        }
    }

}
