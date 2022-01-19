<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Tracker;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
   public function index (){
       return view('statistics.index');
   }
   public function status(){
       return view('statistics.status');
   }
}
