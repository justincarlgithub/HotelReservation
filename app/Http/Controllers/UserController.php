<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $room = Room::first();
        return view('user.index') -> with(['room' => $room]);
    }
    public function about()
    {
        return view('user.about');
    }
    public function amenities()
    {
        return view('user.amenities');
    }
    public function room()
    {
        $room = Room::get();
        return view('user.room') -> with(['rooms' => $room]);
    }
    public function booking()
    {
      
        return view('user.booking');
    }
    public function bookingothers()
    {
        return view('user.bookingothers');
    }
    public function testimonial()
    {
        return view('user.testimonial');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function create($id)
    {
        $room = Room::find($id);
        return view('user.booking', compact('room'));
    }
    public function store(RoomFormRequest $request)
    {
        $data = $request->validated();

        $room = new Room;
        $room->name = $data['name'];
        $room->price = $data['price'];

        if($request->hasfile('image')) 
        {
            $file = $request -> file('image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $room->image = $filename;
        }

        $room->status=$request->status == true ? '1' : '0';
        $room->save();
        return redirect('admin/room')->with('message', 'Room Added Successfully');

    }
   
}
