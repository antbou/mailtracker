<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
        $mails = Tracker::get()->where('user_id',auth()->user()->id);
        return view('mails.index',compact('mails'));
    }
}
