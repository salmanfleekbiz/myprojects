<?php

namespace App\Http\Controllers\Front\Losspassword;
use Auth;
use DB;
use Mail;
use App\User;
use App\Userinfo;
use App\Resellercode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LosspasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$categories = \App\Category::latest('id','asc')->get();
            $losspassword = 'losspassword';
            return view('front.losspassword.'.$losspassword)->with('categories',$categories);
        
    }

    public function sendpassword(Request $request)
    {
		// $vaar="1234";
		// echo bcrypt($vaar);
		// die;
		
        if (User::where('email', '=', $request->input("email"))->count() > 0) {

          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          $password = substr( str_shuffle( $chars ), 0, 8 );
		
			$user=User::where('email',$request->input("email"))->first();
        
          $message =  "You have a code below please check and reset your password.<br><br> Email: ".$request->input("email")." <br><br> Code: ".$user->remember_token."<br><br>Link: ".url('/changepassword/'.$user->remember_token.'')."<br><br>Thanks & Regards<br><br>SugarHouse Team";
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: SugarHouse<info@sugarHouse.com>' . "\r\n";
          $to = $request->input("email");
          $subject = "SugarHouse Forgot Password";
          $mail = mail($to,$subject,$message,$headers);

          return Redirect::back()->withMessage('Please check your email');
        }else{
          return redirect('/forgotpassword')->withErrors("Email address does not exists.");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changepassword($acccode)
    {
		if(!empty($acccode)){
		
		$categories = \App\Category::latest('id','asc')->get();
            $changepassword = 'changepassword';
		 return view('front.changepassword.'.$changepassword)->with('categories',$categories)->with('acccode',$acccode);
		}
		else {
			     return redirect('/forgotpassword')->withErrors("Code does not exists.");
			
		}
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitchangepassword(Request $request)
    {
		
		  if (User::where('remember_token', '=', $request->input("code"))->count() > 0) {
		
			$password=bcrypt($request->input("npass"));
		  // $updatepassword =User::where('email',$request->input("email"))->first();
          // $updatepassword->password=bcrypt($request->input("npass"));
          // $updatepassword->updated_at=date("Y-m-d H:i:s");
          // $updatepassword->save();
		  
		  DB::table('users')
            ->where('email', $request->input("email"))
            ->update(['password' => $password , 'updated_at'=>date("Y-m-d H:i:s")]);
			
			 return redirect('login')->withMessages("Password Successfully Changed");
		  }
		  else {
			  
			  return redirect('changepassword')->withErrors("Activation Code is not valid");
		  }
        //
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
