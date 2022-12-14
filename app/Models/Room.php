<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $table = 'room';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function roomreservation()
    {
        return $this->hasMany(Roomreservation::class);
    }
}
