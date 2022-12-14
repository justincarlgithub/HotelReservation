<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roomreservation;
use DB;
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
                    ->where('users.role', '0')
                    ->select('users.*', 'roomreservation.user_id', 'roomreservation.check_in')
                    ->groupBy('roomreservation.user_id')
                    ->get();
       
        $warn =  DB::table('roomreservation')
                    ->where('roomreservation.check_in', '<', $todayDate)
                    ->where('status', '0')
                    ->groupBy('user_id')
                    ->count();
                    
        $warn2 = Roomreservation::where('roomreservation.check_in', '<', $todayDate)
                    ->where('status', '0')
                    ->select('user_id')
                    ->groupBy('user_id')
                    ->get();
       
        $warnid = [];
// loop over $divisionIDs to get div_ids 
foreach($warn2 as $war)
              {
              $warnid[] = $war['sales'];
              }   
      
            $as =  json_encode($warnid) ;
   
        return view('admin.users.index', compact('users', 'warn','warn2', 'war', 'as'))->with('i');
    }
}
