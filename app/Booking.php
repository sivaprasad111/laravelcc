<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=['room','email','address','image'];

    public function setNameAttribute($value)
    {
        $this->attributes['room'] = strtoupper($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = ucfirst($value);
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtoupper($value);
    }





    // public function getNameAttribute($value)
    // {
    //     return ucfirst($value);
    // }
    // public function getEmailAttribute($value)
    // {
    //     return strtoupper($value);
    // }
    // public function getAddressAttribute($value)
    // {
    //     return strtolower($value);
    // }



}
