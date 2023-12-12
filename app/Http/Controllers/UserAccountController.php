<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomReservation;
use Auth;
use DB;
use Alert;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use SentimentAnalysis;



class UserAccountController extends Controller
{
   
       

        // returns true or false
      

    public function account(Request $request){
       
        $recent = Roomreservation::where('user_id', Auth::id())
                    ->where('status', '0')
                    ->orderBy('check_in', 'ASC')
                    ->paginate(1,['*'],'recent');
                    
        $comment = DB::table('comment')
                    ->join('users', 'comment.user_id', '=', 'users.id') 
                    ->where('comment.user_id', Auth::id())
                    ->paginate(1, ['*']);  
      

        $countComment = Comment::join('roomreservation','comment.roomreservation_id', 'roomreservation.id')
                    ->join('users', 'comment.user_id', 'users.id')
                    ->select('comment.*', 'roomreservation.id', 'users.firstname', 'users.profile_image', 'users.lastname')
                    ->where('comment.user_id', Auth::id())
                    ->get();
        
        $booking = Roomreservation::with('comment')->where('user_id', Auth::id())
                    ->where(function($query) {
                $query->where('status','1')
                    ->orWhere('status','2');})
                    
                        ->paginate(1, ['*'], 'booking');;
        $count = User::join('roomreservation','users.id', 'roomreservation.user_id')
                        ->select('users.*', 'roomreservation.user_id', 'roomreservation.check_in', 'roomreservation.status')
                        ->where('roomreservation.status', '4')
                        ->get()
                        ->countBy('user_id');
                    
        
        $exist = DB::table('comment')
                ->join('roomreservation', 'comment.roomreservation_id', '=', 'roomreservation.id')
                ->select( 'roomreservation.id')
                ->count();
        
                $arr = Roomreservation::where('user_id', auth()->user()->id)->pluck('id')->toArray();
                $comments = Comment::whereIn('roomreservation_id', $arr)->latest()->get();


              
      
       return view ('index.userindex', compact('recent', 'booking', 'comment', 'exist', 'comments', 'count', 'countComment'))->with('i', (request()->input('page', 1)-1)*1);
    }

    public function comments()
    {
        $exist = DB::table('roomreservation')
        ->join('comment', 'roomreservation.id', '=', 'comment.reservation_id')
        ->where('roomreservation.user_id',  Auth::id())
        ->where('comment.user_id',  Auth::id())
        ->select('roomreservation.*', 'comment.*')
        ->paginate(5);

        return view ('index.useraccount.addcomment', compact('exist'))->with('i', (request()->input('page', 1)-1)*5);
    }
    
   

    public function updatepass(Request $request, $id)
    {
        $this->validate($request, [ 
            'oldpassword' => 'required',
            'password' => 'required', 'min:8', 'confirmed',
            'password_confirmation' => 'same:password',
        ]);
 
        $hashedPassword = Auth::user()->password;
        $has = $request->password; 
        $hasd = $request->password_confirmation;
        if (\Hash::check($request->oldpassword , $hashedPassword)) 
        {
            if (\Hash::check($request->password , $hashedPassword)) 
            {
                return redirect()->back()->with('error', 'Password is the same with old');    
            }
            elseif($has != $hasd)
            {
                return redirect()->back()->with('error', 'Old and New pass does not match');    
            }
            else{
                
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->password);
                $users->save();
                return redirect('account/ac')->with('success', 'password updated successfully');
            } 
        }
        else
        {
            return redirect()->back()->with('error', 'old pass does not match');
        }
       
                   
               

    }
    public function editpass($id)
    {
        return view('index.changepass');
    }
    public function edit($id)
    {

        $user = User::find($id);
        return view('index.changeprofile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'profile_image' => 'mimes:jpeg,png,jpg']);
        $users = User::find($id);
       
        if($request->hasfile('profile_image')) {

            $path = 'uploads/profile/'.$users->profile_image;

            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request -> file('profile_image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('uploads/profile/', $filename);
            $users->profile_image = $filename;
            $us = $filename;

            DB::table('users')
                ->where('id', $id)
                ->update([ 'profile_image' => $us]);
          
            return redirect('account/ac')->with('success', 'Profile Change Successfully!'); 
 
        }
        return redirect()->back();
    }
    public function store(Request $request)
    {
       
        $data = $request->validate([
           
            'reserve_id' => 'required',
            'description' => 'required','string','max:200',
            'rating' => 'required']);

        $comment = new comment;
        $comment->user_id = Auth::id();
        $comment->roomreservation_id = $data['reserve_id'];
        $comment->description = $data['description'];
        $comment->slug = Str::slug(Str::random(5));
        $comment->star_rating = $request->rating;
        $comment->save();
        return redirect('account/ac')->with('success', 'Commented Successfully!'); 
    }
    public function updatecomment(Request $request, $slug)
    {
        

        DB::table('comment')
                ->where('slug',  $slug)
                ->update([ 'description' =>  $request['comment']]);
       
     
      
        return redirect()->back()->with('success', 'Comment Updated Successfully!'); 
    }
    public function deletecomment(Request $request, $slug)
    {
        

        DB::table('comment')
                ->where('slug',  $slug)
                ->delete();
       
     
      
        return redirect()->back()->with('success', 'Comment Deleted Successfully!'); 
    }
    public function adminindex()
    {
        $comments = DB::table('comment')
                    ->join('users', 'comment.user_id', '=', 'users.id')
                    ->select('comment.*', 'users.*')
                    ->orderBy('comment.created_at', 'ASC')
                    ->get();

        return view ('admin.comment.index', compact( 'comments'));

       
    }

    public function status($id){

        try {

            $code = 1;
            $update_status = User::whereId($id)->update([
                'banned' =>  $code
            ]);
            if( $update_status)
            {
                return back()->with('success', 'Blocked successfully!');
            }
            return back()->with('error', 'Fail to Block');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}
