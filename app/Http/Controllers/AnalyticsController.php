<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Users;
use App\Models\Room;
use App\Models\Roomreservation;
use DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function dash(){
       
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
      
       
        $bookings = Roomreservation::select(\DB::raw("count(id) as total, 0"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('day_name','day')
                    ->orderBy('day')
                    ->get();         
        $labels=[];
        $data = [];
        foreach($bookings as $booking)
        {
            $labels[] = $booking['day_name'];
            $data[] = $booking['total'];
        } 
        $bookings1 = Roomreservation::select(\DB::raw("count(id) as ytotal, 0"), \DB::raw("MONTHNAME(created_at) as monthname"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('monthname')
                    ->orderBy('monthname', 'ASC')
                    ->get();     
                     
        $ylabel=[];
        $ydata = [];
        foreach($bookings1 as $booking1)
        {
            $ylabel[] = $booking1['monthname'];
            $ydata[] = $booking1['ytotal'];
        } 

        $bookings2 = Roomreservation::select(\DB::raw("count(id) as mtotal, 0"), \DB::raw("WEEK(created_at) as week"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('week')
                    ->orderBy('week')
                    ->get();     
                     
        $mlabel=[];
        $mdata = [];
        foreach($bookings2 as $booking2)
        {
            $mlabel[] = $booking2['week'];
            $mdata[] = $booking2['mtotal'];
        } 

        
        $incomes = Roomreservation::select(\DB::raw("sum(total) as income, 0"), \DB::raw("DAYNAME(updated_at) as day_name"), \DB::raw("DAY(updated_at) as day"))
                    ->where('status', '2')
                    ->whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->whereYear('updated_at', date('Y'))
                    ->groupBy('day_name','day')
                    ->orderBy('day')
                    ->get();  
        $ldate=[];
        $dincome = [];
        foreach($incomes as $income)
            {
            $ldate[] = $income['day_name'];
            $dincome[] = $income['income'];
            }   
       $incomes1 = Roomreservation::select(\DB::raw("sum(total) as income, 0"), \DB::raw("WEEK(created_at) as week"))
                  ->where('status', '2')
                  ->whereYear('updated_at', date('Y'))
                  ->groupBy('week')
                  ->orderBy('week')
                  ->get();  
        $lweek=[];
        $dweek = [];
        foreach($incomes1 as $income1)
            {
            $lweek[] = $income1['week'];
            $dweek[] = $income1['income'];
            }   

       $incomes2 = Roomreservation::select(\DB::raw("sum(total) as income, 0"), \DB::raw("MONTHNAME(created_at) as monthname"))
                ->where('status', '2')
                ->whereYear('created_at', date('Y'))
                ->groupBy('monthname')
                ->orderBy('monthname')
                ->get();  

          $lyear=[];
          $dyear = [];
          foreach($incomes2 as $income2)
              {
              $lyear[] = $income2['monthname'];
              $dyear[] = $income2['income'];
              }   
          
          $tsales=Roomreservation::select(\DB::raw("sum(total) as sales", ))->whereDate('updated_at',Carbon::now('GMT+8')) ->where('status', '2')->get();
          $roomoccupied = Roomreservation::select(\DB::raw("count(*)"))->where('status','1')->count();
          $todayDate = Carbon::now('GMT+8')->format('Y-m-d');
          $count = Roomreservation::whereDate('created_at' ,$todayDate)->count();
         
         
      
        
        return view('admin.dashboard', compact('count','labels', 'data','ylabel', 'ydata', 'mlabel', 'mdata', 'ldate', 'dincome','lweek', 'dweek', 'lyear', 'dyear', 'tsales', 'roomoccupied'));
    }

    public function sales() {

        $record = Roomreservation::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
      
         $data = [];
     
         foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
          }
     
        $data['chart_data'] = json_encode($data);
        return view('admin.sales', $data);
        }
   
}
