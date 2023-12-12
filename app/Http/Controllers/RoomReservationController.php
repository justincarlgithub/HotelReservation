<?php

namespace App\Http\Controllers;

use DB;
use id;
use Auth;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Users;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RoomReservation;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationNotification;

class RoomReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Roomreservation $roomreservation)
    {
        $room = Room::first();


        return view('index.roomdisplay')->with(['room' => $room]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function roomdisplay(Room $room)
    {
        // $dates = [];
        $checkin = Roomreservation::where('room_id', $room->id)->pluck('check_in');
        $checkout = Roomreservation::where('room_id', $room->id)->pluck('check_out');



        $convertedCheckin = intval($checkin);


        //  for($date= $s; $date = $e;){
        //  $dates[]= $date->format('Y-m-d');
        // }
        // $d = Roomreservation::where('room_id', $room->id)->whereBetween('check_in', [$s, $e])->get();
        //  return $d;

        //   $period = CarbonPeriod::create('2019-05-30', '2019-06-03');
        // $period->toArray();
        // dd($period);
        return view('index.insideindex.roomdisplay', compact('room'));
    }





    public function check()
    {
        return view('auth.check_availability');
    }

    public function create()
    {
        $room = Room::first();
        return view('index.insideindex.booking')->with(['room' => $room]);
    }

    public function reserveindex()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'room_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'payme' => 'required',
            'req' => 'nullable'
        ]);

        $reservation = new Roomreservation;
        $reservation->user_id = auth()->id();
        $reservation->room_id = $data['room_id'];
        $reservation->check_in = $data['check_in'];
        $reservation->check_out = $data['check_out'];
        $reservation->total = $data['payme'];
        $reservation->request = $data['req'];
        $sl = "HdSLSU";
        $reservation->slug = Str::slug($sl . '-' . Str::random(3));

        Alert::success('You have Reserved Successfully <br/><br/> <h5>You may view your reservation slip in your account:)</h5>')
            ->showCancelButton($btnText = '<a href = "view-invoice-pdf">Click to view </a>', $btnColor = '#dc3545')
            ->showConfirmButton(
                $btnText = '<a class="add-padding" href="generate-invoice-pdf">Click to Download</a>', // here is class for link
                $btnColor = '#38c177',
                ['className'  => 'no-padding'], // add class to button
            )->autoClose(false)
            ->showCloseButton(true);

        $reservation->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $room = Room::find($id);
        return view('user.booking', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Roomreservation $roomreservation)
    {
        $this->authorize('view', $roomreservation);
        $roomreservation = Roomreservation::find($id);
        $room = DB::table('room')
            ->join('roomreservation', 'room.id', '=', 'roomreservation.room_id')
            ->select('room.*', 'roomreservation.*')
            ->where('roomreservation.id', $id)
            ->first();
        return view('index.useraccount.editreservatation', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        Roomreservation::where('slug', $slug)

            ->update(['check_in' => $request['check_in'], 'check_out' => $request['check_out'], 'total' => $request['payme1']]);


        return redirect('account/ac')->with('success', 'Reservation Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Roomreservation::where('id', $id)->delete();

        Alert::success('Congrats', 'Room Deleted Successfully');
        return back();
    }
}
