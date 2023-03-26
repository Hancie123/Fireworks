<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsModel extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $primaryKey='room_id';

    public function user()
    {
        return $this->belongsTo(Users::class, 'User_ID');
    }

    public function customers()
    {
        return $this->hasMany(Customers::class, 'room_id');
    }
}