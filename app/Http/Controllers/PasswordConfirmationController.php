<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomReservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordConfirmationController extends Controller
{
    public function show()
    {
        return view('auth.confirm-password');
    }

    public function confirm(Request $request, $id)
    {
        if (Hash::check(request()->password, auth()->user()->password)) {
           
      

          //  return redirect()->intended('admin/updatestatus2/'.$value->id');
          return redirect()->intended('admin/updatestatus2/'.$value->id);
           
        }
        return back()->withErrors(['password' => 'The provided password does not match our records.']);
        
        
        
        

       
           
    }

}