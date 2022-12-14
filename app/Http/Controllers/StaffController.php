<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StaffFormRequest;
use Alert;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function index()
    {
        $staff = User::where('role', '1')->oldest()->paginate(3);
        return view ('admin.staff.index', compact('staff'))->with('i', (request()->input('page', 1)-1)*3);
    }

    public function create()
    {
        return view ('admin.staff.add');
    }
    public function store(StaffFormRequest $request)
    {
        $data = $request->validated();

        $staff = new User;
        $staff->firstname = $data['firstname'];
        $staff->lastname = $data['lastname'];
        $staff->email = $data['email'];
        $staff->role = $data['role'];
        $staff->password =Hash::make($data['password']);
        $staff->slug = Str::slug(Str::random(2).$data['firstname'].Str::random(3));
        $staff->save();
       
        return redirect('admin/staff')->with('success','Staff Added Successfully');

    }

    public function edit(User $user)
    {
        return view('admin.staff.edit', compact('user'));
    }
    public function update(Request $request,$id)
    {  
    
            $password = Hash::make($request['password']);

            DB::table('users')
                ->where('id', $id)
                ->update([ 'password' => $password ]);
                Alert::success('Congrats', 'You\'ve Successfully Registered');
            return redirect('admin/staff'); 

    }

    public function delete($slug) 
    {
        User::where('slug', $slug)->delete();
       return redirect('admin/staff')->with('success', 'Room Deleted Successfully!'); 
    }

    
    
    public function search(Request $request)
    {
        $staff =Users::all();
      if($request->keyword != ''){
      $staff = Users::where('firstname','LIKE','%'.$request->keyword.'%')->get();
      }
      return response()->json([
         'staff' => $staff
      ]);
    }
}
