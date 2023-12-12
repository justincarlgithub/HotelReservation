<?php

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\ConfirmPassword;
use App\Models\Roomreservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Checkercontroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\RoomReservationController;
use App\Http\Controllers\PasswordConfirmationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $room = DB::table('room')
        ->join('roomreservation', 'room.id', 'roomreservation.room_id')
        ->select('room.*')
        ->where('roomreservation.check_in', '!=', Carbon::today())
        ->get();


    $comments = Comment::all();
    return view('welcome', compact('room', 'comments'));
});

Route::get('home', function () {
    $room = DB::table('room')
        ->join('roomreservation', 'room.id', 'roomreservation.room_id')
        ->select('room.*')
        ->where('roomreservation.check_in', '!=', Carbon::today())
        ->get();
    $comments = DB::table('comment')
        ->join('users', 'comment.user_id', '=', 'users.id')
        ->select('comment.*', 'users.*')
        ->orderBy('comment.created_at', 'ASC')
        ->get();
    return view('welcome', compact('room', 'comments'));
});

Route::get('a', function () {
    return view('a');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('index')->group(function () {
    Route::get('home', [IndexController::class, 'index']);
    Route::get('about', [IndexController::class, 'about']);
    Route::get('room', [IndexController::class, 'room']);
    Route::get('booking/{id}', [IndexController::class, 'booking']);
    Route::get('bookingothers', [IndexController::class, 'bookingothers']);
    Route::get('testimonials', [IndexController::class, 'testimonials']);
    Route::get('contact', [IndexController::class, 'contact']);
    Route::get('promo', [IndexController::class, 'promo']);
    Route::get('roomdisplay/{room:slug}', [RoomReservationController::class, 'roomdisplay']);
    Route::get('check', [RoomReservationController::class, 'check']);
});


Route::prefix('account')->middleware(['auth'])->group(function () {
    Route::get('ac', [UserAccountController::class, 'account']);;
    Route::get('changeprofile/{id}', [UserAccountController::class, 'edit'])->name('change-profile');
    Route::patch('updateprofile/{id}', [UserAccountController::class, 'update']);
    Route::post('addcomment', [UserAccountController::class, 'store']);
    Route::put('editcomment/{comments:slug}', [UserAccountController::class, 'updatecomment']);
    Route::get('deletecomment/{comments:slug}', [UserAccountController::class, 'deletecomment']);
    Route::get('changepassword/{id}', [UserAccountController::class, 'editpass'])->name('change-password');
    Route::patch('updatepass/{id}', [UserAccountController::class, 'updatepass']);

    Route::get('generate-invoice-pdf/{roomreservation:slug}', [PDFController::class, 'generateInvoicePDF']);
    Route::get('view-invoice-pdf/{roomreservation:slug}', [PDFController::class, 'view']);
});


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [AnalyticsController::class, 'dash']);
    // Route :: get ('dashboard', [AnalyticsController::class, 'index']);
    Route::get('staff', [StaffController::class, 'index']);
    Route::get('view-room', [RoomController::class, 'index']);
    Route::get('add-room', [RoomController::class, 'create']);
    Route::post('add-room', [RoomController::class, 'store']);
    Route::get('edit-room/{room:slug}', [RoomController::class, 'edit']);
    Route::put('update-room/{room:slug}', [RoomController::class, 'update']);
    Route::get('delete/{room:slug}', [RoomController::class, 'delete']);
    Route::post('/search', [StaffController::class, 'search'])->name('search');
    Route::get('users', [AdminController::class, 'users']);
    Route::get('booking', [BookingController::class, 'index']);
    Route::get('booking-checkin', [BookingController::class, 'checkin']);
    Route::get('booking-checkout', [BookingController::class, 'checkout']);
    Route::get('booking/{id}', [BookingController::class, 'create']);
    Route::get('payment/{id}', [BookingController::class, 'show']);
    Route::post('booking', [BookingController::class, 'index']);
    Route::get('booking/delete/{id}', [BookingController::class, 'destroy']);
    Route::get('update-redtagged/{id}', [BookingController::class, 'tag']);
    Route::get('ban-user/{id}', [UserAccountController::class, 'status']);

    Route::get('comments', [CommentController::class, 'adminindex']);
});

Route::prefix('admin')->middleware(['auth', 'superadmin'])->group(function () {
    Route::get('add-staff', [StaffController::class, 'create']);
    Route::post('add-staff', [StaffController::class, 'store']);
    Route::put('edit-staff-password/{user:id}', [StaffController::class, 'update']);
    Route::post('updatestaff', [StaffController::class, 'update']);
    Route::get('delete-staff/{user:slug}', [StaffController::class, 'delete']);



    Route::get('updatestatus/{id}', [BookingController::class, 'updatestatus']);
    Route::get('analytics/bookings', [AnalyticsController::class, 'index'])->name('analyze.booking');
    Route::get('analytics/sales', [AnalyticsController::class, 'sales']);


    Route::get('records', [AnalyticsController::class, 'records']);
});

Route::post('email', [Checkercontroller::class, 'check']);
Route::post('editdatecheck', [Checkercontroller::class, 'editcheckdate']);
Route::post('editoutdate', [Checkercontroller::class, 'editcheckout']);
Route::post('datecheck', [Checkercontroller::class, 'checkdate']);
Route::post('outdate', [Checkercontroller::class, 'checkout']);
Route::post('datecheck1', [Checkercontroller::class, 'gdate']);
Route::get('fetch-room', [StudentController::class, 'fetchroom']);

Route::prefix('admin')->middleware(['superadmin', 'password.confirm'])->group(function () {

    Route::get('updatestatus2/{id}', [BookingController::class, 'status']);
    Route::get('edit-staff/{user:slug}', [StaffController::class, 'edit']);
});

Route::prefix('reservation')->middleware(['auth'])->group(function () {
    Route::post('add', [RoomReservationController::class, 'store']);
    Route::get('delete/{roomreservation}', [RoomReservationController::class, 'destroy']);
    Route::get('/booking/{id}', [BookingController::class, 'edit']);
    Route::put('/update-booking/{roomreservation:slug}', [RoomReservationController::class, 'update']);
});
