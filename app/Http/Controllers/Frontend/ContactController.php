<?php

namespace App\Http\Controllers\Fronend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Model\Contact;

class ContactController extends Controller
{
    
    public function contact(Request $request)
    {
    	 
    	 
    	  $contact = new Contact();
    	  $contact->name      = $request->name;
          $contact->email         = $request->email;
    	  $contact->phone       = $request->phone; 
    	  $contact->subject       = $request->subject; 
    	  $contact->message       = $request->message; 


    	  $contact->save();

            if ($contact){
                Session::flash('success',"Contact added successsfully !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Contact Added to Faield !!!');
                return redirect()->back();
            }

            
    	  }

          
}
