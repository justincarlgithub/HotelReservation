<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use DB;
use Carbon\Carbon;
use App\Models\Room;

class timer extends AbstractWidget
{
    public $reloadTimeout = 5;

    /**
     * The configuration array.
     *
     * @var array
     */
   
    protected $config = [];
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $room = DB::table('room')
            ->get();
       // return view('admin.booking.index', compact('roomreservation'))->with('i', (request()->input('page', 1)-1)*5)

        return view('widgets.timer', [
            'config' => $this->config,
            'room' => $room
        ]);

         
    }
}
