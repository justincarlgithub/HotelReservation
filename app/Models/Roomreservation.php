<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomreservation extends Model
{
    use HasFactory;
    
    protected $dates = ['created_at', 'updated_at']; 
    protected $table= "roomreservation";

    protected $fillable = [
        'slug',
        'user_id',
        'room_id',
        'check_in',
        'check_out'
    ];
 
    public function user(){
        return $this ->belongsTo(User::class);
    }
    public function room(){
        return $this ->belongsTo(Room::class);
    }
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }

    public function getRoomreservationCountAttribute()
    {
        return $this->roomreservation()->count();
    } 
}
