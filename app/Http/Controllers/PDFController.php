<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Models\RoomReservation;
use Auth;
class PDFController extends Controller
{
    public function generateInvoicePDF(Roomreservation $roomreservation)
    {
        if($roomreservation->user_id != Auth::id()) {
            abort(403);
        }
        $pdf = PDF::loadView('myPDF',compact('roomreservation'));
        return $pdf->download('HotelDeSLSU.pdf');
    }

    public function view(Roomreservation $roomreservation)
    {
        if($roomreservation->user_id != Auth::id()) {
            abort(403);
        }
     
        return view('myPDF',compact('roomreservation') );
        
    }
}