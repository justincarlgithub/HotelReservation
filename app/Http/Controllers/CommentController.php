<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Comment;
use App\Models\Roomreservation;
use Carbon\Carbon;
class CommentController extends Controller
{
    public function adminindex()
    {
        $comments = DB::table('comment')
                    ->join('users', 'comment.user_id', '=', 'users.id')
                    ->select('comment.*', 'users.*')
                    ->orderBy('comment.created_at', 'ASC')
                    ->get();

       

                    Carbon::setWeekStartsAt(Carbon::SUNDAY);
                    Carbon::setWeekEndsAt(Carbon::SATURDAY);
                  
                   
                    $commentClassification = Comment::select(\DB::raw("Sentiment_Polarity as polarity "), \DB::raw("Score as rating"))
                               ->groupBy("rating")
                               ->orderBy("rating", "ASC")
                                ->get();         
                    $labels=[];
                    $data = [];
                    foreach($commentClassification as $commentClassifications)
                    {
                        $labels[] =$commentClassifications['rating'];
                        $data[] = $commentClassifications['polarity'];
                    } 
                  
                      
                      $tsales=Roomreservation::select(\DB::raw("sum(total) as sales", ))->whereDate('updated_at',Carbon::now('GMT+8')) ->where('status', '2')->get();
                      $roomoccupied = Roomreservation::select(\DB::raw("count(*)"))->where('status','1')->count();
                      $todayDate = Carbon::now('GMT+8')->format('Y-m-d');
                      $count = Roomreservation::whereDate('created_at' ,$todayDate)->count();
                     
                     
                  
                    
                    return view('admin.comment.index', compact('count','labels', 'data', 'tsales', 'roomoccupied'));
               

    }
}
