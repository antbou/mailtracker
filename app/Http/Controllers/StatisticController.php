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
    public function browser(){
        return view('statistics.browser');
    }
    public function device(){
        return view('statistics.device');
    }
    public function platform(){
        return view('statistics.platform');
    }
    public function country(){
        return view('statistics.country');
    }
}
