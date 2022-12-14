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
        $roomreservation = Roomreservation::with(['room'])->where('roomreservation.check_in', '!=', Carbon::today())->get();
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
