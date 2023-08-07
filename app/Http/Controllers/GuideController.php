<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;
class GuideController extends Controller
{
   public function index() {
    $guide_list = Guide::all();
    return view('policy.guidelist', ['guide_list' => $guide_list]);
   }
}
