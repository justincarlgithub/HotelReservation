<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roomreservation;
use DB;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use PHPUnit\Framework\TestCase;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashcontent');
    }

    public function users()
    {
        $todayDate = date("Y-m-d");
        $users = User::join('roomreservation','users.id', 'roomreservation.user_id')
                    ->select('users.*', 'roomreservation.user_id', 'roomreservation.check_in', 'roomreservation.status')
                    ->where('roomreservation.status', '4')
                    ->where('users.role', '0')
                    ->groupBy('status')
                    ->groupBy('roomreservation.user_id')
                    ->get();
            
        $count = User::join('roomreservation','users.id', 'roomreservation.user_id')
                    ->select('users.*', 'roomreservation.user_id', 'roomreservation.check_in', 'roomreservation.status')
                    ->where('roomreservation.status', '4')
                    ->where('users.role', '0')
                    ->get()
                    ->countBy('user_id');
      
        $warn =  DB::table('roomreservation')
                    ->where('status', '4')
                    ->groupBy('status')
                    ->count();   
    
   
        return view('admin.users.index', compact('users', 'warn','count'))->with('i');
    }

 

   
    public function sentiment(){
      
        
       
  
    return view('admin.users.index', compact('ana'));
    }

}
