<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consultation;

class ConsultationController extends Controller
{
    public function index(Request $request) {
        $data = new consultation;
        $data->email = $request->email;
        $data->company_name = $request->company_name;
        $data->phone_number = $request->phone_number;
        $data->user_name = $request->user_name;
        $data->content = $request->content;
        $data->save();
        return redirect()->route('consultation');
    }
}
