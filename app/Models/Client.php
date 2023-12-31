<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

        protected $fillable = ['full_name','gender','phone','address'];

    public function cars()
    {
        return $this->hasMany(Car::class, 'client_id', 'id');
    }
}
