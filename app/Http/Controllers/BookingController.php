<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomReservation;
use App\Models\Room;
use App\Models\Transactions;
use DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Http\Controllers\Toastr;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomreservation = DB::table('room')
            ->join('roomreservation', 'room.id', '=', 'roomreservation.room_id')
            ->join('users', 'roomreservation.user_id', '=', 'users.id'  )
            ->select('users.*','room.*', 'roomreservation.*')
            ->where('roomreservation.status', '0')
            ->orderBY('roomreservation.check_in', 'ASC')
           ->paginate(5);
        return view('admin.booking.index', compact('roomreservation'))->with('i', (request()->input('page', 1)-1)*5);
    }
    public function checkin()
    {
        $roomreservation = DB::table('room')
            ->join('roomreservation', 'room.id', '=', 'roomreservation.room_id')
            ->join('users', 'roomreservation.user_id', '=', 'users.id'  )
            ->select('users.*','room.*', 'roomreservation.*')
            ->where('roomreservation.status', '1')
            ->orderBY('roomreservation.check_in', 'ASC')
           ->paginate(5);
        return view('admin.booking.checkin', compact('roomreservation'))->with('i', (request()->input('page', 1)-1)*5);
    }
    public function checkout()
    {
        $roomreservation = DB::table('room')
            ->join('roomreservation', 'room.id', '=', 'roomreservation.room_id')
            ->join('users', 'roomreservation.user_id', '=', 'users.id'  )
            ->select('users.*','room.*', 'roomreservation.*')
            ->where('roomreservation.status', '2')
            ->orderBY('roomreservation.check_in', 'ASC')
           ->paginate(5);
        return view('admin.booking.checkout', compact('roomreservation'))->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomreservation = Roomreservation::find($id);
        if($roomreservation->user_id != Auth::id()) {
            abort(403);
        }
        $room = DB::table('room')
            ->join('roomreservation', 'room.id', '=', 'roomreservation.room_id')
           ->select('room.*', 'roomreservation.*')
           ->where('roomreservation.id',$id)
           ->first();
        return view('admin.booking.modal', compact('roomreservation', 'room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $value = Transactions::find($id);
        return view('admin.booking.action', compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomreservation = Roomreservation::find($id);
       
        if($roomreservation->status != '2' && $roomreservation->user_id != Auth::id() )
        {
            abort(403);
        }
        else
        {
            Roomreservation::where('id', $id)->delete();
            return back()->with('success', 'Success! User created');
        }
        
    }

    public function updatestatus($id) 
    {
        $getStatus = Roomreservation::select('status')->where('id',$id)->first();
        if($getStatus->status==0){
            $status = 1;
        }else{
            $status = 0;
        }
        
       
        Roomreservation::where('id',$id)->update(['status'=>$status]);
         return back();

        
        
    }
    public function status($id) 
    {
        $getStatus = Roomreservation::select('status')->where('id',$id)->first();
        if($getStatus->status==1){
            $status = 2;
        }else{
            $status = 0;
        }
        
        DB::table('roomreservation')
            ->where('id', $id)
            ->update([ 'status' => $status ]);

        return redirect('admin/booking-checkin')->with('success', 'Payment Updated Successfully!'); 
        
        
    }
    public function tag($id) 
    {
        $getStatus = Roomreservation::select('status')->where('id',$id)->first();
        $status = 4;
        
        Roomreservation::where('id',$id)->update(['status'=>$status]);
         return back();

        
        
    }
}
