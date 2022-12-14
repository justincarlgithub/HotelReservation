<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\RoomFormRequest;
use Alert;
use Illuminate\Support\Str;


class RoomController extends Controller
{
    public function index()
    {
        $room = Room::oldest()->paginate(5);
        return view ('admin.room.index', compact('room'))->with('i', (request()->input('page', 1)-1)*5);
    }
    public function create()
    {
        return view ('admin.room.addroom');
    }
    public function store(RoomFormRequest $request)
    {
        $data = $request->validated();

        $room = new Room;
        $room->description = $data['description'];
        $room->RoomNo = $data['RoomNo'];
        $room->name = $data['name'];
        $room->price = $data['price'];
        $room->capacity = $data['capacity'];
        if($request->hasfile('profile')) {
            $file = $request -> file('profile');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $room->profile = $filename;
        }
        $room->slug = Str::slug(Str::random(5).$data['RoomNo'].Str::random(5));
        $room->save();
        
            
            return redirect('admin/view-room')->with('success', 'Room Added Successfully');
    

    }

  
    public function edit(Room $room)
    {
        
        return view('admin.room.editroom', compact('room'));
    }
    public function update(Request $request, Room $room)
    {
         $request->validate([
            'profile' => 'mimes:jpeg,png,jpg',
            'name' => 'required', 'string',  'max:200' ,
            'price' =>   'required', 'numeric' ,
            'capacity' =>  'required','numeric',
            'description' =>'required',
            'RoomNo' =>'numeric', 'unique:room'
            ]);

        $room->name = $request['name'];
        $room->price = $request['price'];
        $room->description = $request['description'];
        $room->capacity = $request['capacity'];
        $room->RoomNo = $request['RoomNo'];
        if($request->hasfile('profile')) {

            $path = 'uploads/category/'.$room->profile;

            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request -> file('profile');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $room->profile = $filename;
        }
        $room->slug = Str::slug(Str::random(5).$room->RoomNo.Str::random(5));
        $room->save();
       
       return redirect('admin/view-room')->with('success', 'Room Updated Successfully');
    }

    public function delete($slug) 
    {
        Room::where('slug', $slug)->delete();
       
        return redirect('admin/view-room')->with('success', 'Room Deleted Successfully');
    }
}
