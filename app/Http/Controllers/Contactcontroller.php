<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Guide;

class Contactcontroller extends Controller
{
    public function index() {
        $guide = Guide::all();
        return view('policy.contact', ['guide' => $guide]);
    }

    public function data_save(Request $request){
        $contact = new Contact;
        $contact->email = $request->email;
        $contact->user_name = $request->user_name;
        $contact->product_id = $request->product_id;
        $contact->Inquiry_content = $request->content;
        $contact->category_id = $request->category;
        $contact->contact_img_1 = $request->contact_img_1;
        $contact->contact_img_2 = $request->contact_img_2;
        $contact->contact_img_3 = $request->contact_img_3;
        $contact->contact_img_4 = $request->contact_img_4;
        $contact->save();
        return redirect()->route('contact');
    }
}
