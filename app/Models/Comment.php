<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='comment';

    protected $fillable = [
        'slug',
        'user_id',
        'reservation_id',
        'description',
        'star_rating'
    ];

    public function roomresevation()
    {
        return $this->belongsTo(Roomreservation::class);
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
     
}
