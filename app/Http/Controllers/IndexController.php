<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Comments;
use App\Models\Roomreservation;
use Carbon\Carbon;
use DB;
class IndexController extends Controller
{
   
    public function index()
    {
        
        return view('user.index') ;
    }
    public function about()
    {
        return view('index.about');
    }
    public function fetchroom()
    {
        
    }
    public function amenities()
    {
        return view('user.amenities');
    }
    public function room()
    {
        $todayDate = Carbon::now('GMT+8')->format('Y-m-d');
        $roomreservation = DB::table('room')
                        ->leftJoin('roomreservation',  'room.id', '=', 'roomreservation.room_id' )
                        ->select('room.*', 'roomreservation.check_in', 'roomreservation.check_out')

                        ->where(function ($query) use ($todayDate) {
                            $query->where(function ($q) use ($todayDate) {
                                $q->where('check_in', '>=', $todayDate)
                                    ->where('check_out', '<=', $todayDate);
                                $q->orWhere('check_in', '<', $todayDate)
                                  ->where('check_out', '>=', $todayDate);
                            });
                        })
                        ->groupBy('id')
                           ->get();
        $room = Room::all();
        return view('index.room', compact('roomreservation', 'room'));
    }
    public function roomdisplay($id)
    {
        $room = Room::find($id);
        return view('index.insideindex.roomdisplay');
    }
    public function booking($id)
    {
        $room = Room::find($id);
        return view('modals.booking');
    }
    public function promo()
    {
        return view('modals.promo') ;
    }
    public function testimonials()
    {
        $comments = DB::table('comment')
        ->join('users', 'comment.user_id', '=', 'users.id')
        ->select('comment.*', 'users.*')
        ->where('comment.Analysis', '=', 'Positive')
        ->orderBy('comment.created_at', 'ASC')
        ->get();

        return view('index.testimonials', compact ('comments'));

      
    }
    public function contact()
    {
        return view('index.contact');
    }
    public function create($id)
    {
        $room = Room::find($id);
        return view('user.booking', compact('room'));
    }
}
