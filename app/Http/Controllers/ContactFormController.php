<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //Send email
        Mail::to('ndeluccapps@gmail.com')->send(new ContactFormMail($data));
        if(count(Mail::failures()) > 0){
            return redirect('contact')->with('error','Try again later');
        }else{
            return redirect('contact')->with('success','Mail Sent!, We will respond as sonn as possible!');
        }
    }
}
