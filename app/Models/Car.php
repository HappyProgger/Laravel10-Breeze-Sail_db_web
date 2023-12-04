<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','brand','model','body_color','license_plate','is_parked'];
    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id','id');
    }
}
