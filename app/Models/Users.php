<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table='users';
    protected $primaryKey='User_ID';

    public function rooms()
    {
        return $this->hasMany(RoomsModel::class, 'User_ID');
    }
}