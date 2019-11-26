<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Mail;
use App\Mail\SendEmailTest;
 use Session;
use DB;
class MailController extends Controller
{
   // --------------------Onsite Catering View Method-----------------// 
  

    public function sendemail(Request $request)
    {
     
    	$data = [
    		'name' => $request->name,
    		'email' =>$request->email,
    		'phone' =>$request->phone, 
        'subject' =>$request->subject, 
    		'content' =>$request->message
    	];

    	$sendMail = Mail::send('emails.test',$data,function($mail) use ($data){
    	 	$mail->from($data['email'], $data['name'])
    	 	->to('info@livepharmacy.com')
    	 	->subject($data['subject']);
    	 });  
        if($sendMail){
 		    return redirect()->back()->with('success',"Mail Send Successfully !");
        }else{
            return redirect()->back()->with('error',"Mail Did't Send"); 
        }
    }
}
