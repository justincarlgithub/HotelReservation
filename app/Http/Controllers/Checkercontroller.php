<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;

class Checkercontroller extends Controller
{
    function check(Request $request)
    {
    if($request->get('email'))
     {
      $email = $request->get('email');
      $data = DB::table("users")
       ->where('email', $email)
       ->count();
      if($data > 0)
      {
        echo 'not_unique';
      }
      else
      {
       echo 'unique';
      }
    }
     }

    function checkdate(Request $request)
    {
     if($request->get('check_in'))
     {
     
      $room_id = $request->get('room_id');
      $check_in = $request->get('check_in');
      $data = DB::table("roomreservation")
       ->where('room_id', $room_id)
       ->where(function($query) use ($check_in) {
              $query->where(function ($q) use ($check_in) {
                $q  ->where('check_in', '<=', $check_in)
                    ->where('check_out','>' ,$check_in);    
              });
            })
       ->count();
      if($data > 0)
      {
        echo 'not_unique';
      }
      else
      {
       echo 'unique';
      }
    }
   
    }

    function checkout(Request $request)
    {
     if($request->get('check_out'))
     {
      $room_id = $request->get('room_id');
      $check_out =$request->get('check_out');
      $check_in =$request->get('check_in');
      $data = DB::table("roomreservation")
       ->where('room_id', $room_id)
       ->where(function ($query) use ($check_in, $check_out) {
        $query->where(function ($q) use ($check_in, $check_out) {
            $q->where('check_in', '>=', $check_in)
                ->where('check_out', '<=', $check_out);
            $q->orWhere('check_in', '<', $check_out)
              ->where('check_out', '>=', $check_out);
        });
      })
       // ->whereRaw('"'.$check_out.'" between `check_in` and `check_out`')
      // ->whereRaw('"'.$t.'" between `start_date` and `End_date`')
       //->orWhereRaw('"'.$check_in.'" > `check_in` AND "'.$check_in.'" < `check_out`')
      // ->orWhereBetween($check_in, ['check_in', 'check_out'])
       // ->whereColumn([[$check_in, '<=', 'check_out'], ['$check_in', '=>', 'check_out']])

       ->count();
      if($data > 0)
      {
        echo 'not_unique';
      }
      else
      {
       echo 'unique';
      }
    }
   
    }
    function editcheckdate(Request $request)
    {
     if($request->get('check_in'))
     {
      $room= $request->get('room');
      $room_id = $request->get('room_id');
      $check_in =$request->get('check_in');
      $data = DB::table("roomreservation")
      
       ->where('room_id', $room_id)
       ->where(function($query) use ($check_in) {
              $query->where(function ($q) use ($check_in) {
                $q  ->where('check_in', '<=', $check_in)
                    ->where('check_out','>' ,$check_in);
                   //     
              });
            })
            ->whereNotIn('id', [$room])
            ->count();
     
      if($data > 0)
      {
        echo 'not_unique';
      }
      else
      {
       echo 'unique';
      }
    }

   
    }
    function editcheckout(Request $request)
    {
     if($request->get('check_out'))
     {
      $room= $request->get('room');
      $room_id = $request->get('room_id');
      $check_out =$request->get('check_out');
      $check_in =$request->get('check_in');
      $data = DB::table("roomreservation")
       ->where('room_id', $room_id)
       ->where(function ($query) use ($check_in, $check_out) {
        $query->where(function ($q) use ($check_in, $check_out) {
            $q->where('check_in', '>=', $check_in)
                ->where('check_out', '<=', $check_out);
            $q->orWhere('check_in', '<', $check_out)
              ->where('check_out', '>=', $check_out);
        });
      })
      ->whereNotIn('id', [$room])
       ->count();
      if($data > 0)
      {
        echo 'not_unique';
      }
      else
      {
       echo 'unique';
      }
    }
   
  }
   function gdate(Request $request)
    {
     if($request->get('check_out'))
     {
      $check_out = $request->get('check_out');
      $check_in = $request->get('check_in');

      $date1 = Carbon::createFromFormat('Y-m-d', $check_in );
      $date2 = Carbon::createFromFormat('Y-m-d', $check_out);

      $compare = $date1->gte($date2);
      $compare1 = $date1->gte($date2) and $date1->lte($date2);
      if($compare)
      {
        echo 'not_invalid';
      }
      else
      {
        echo 'invalid';
      }
    }
}

  

    
}
