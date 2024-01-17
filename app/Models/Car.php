<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = array('*');
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        // Attach an event listener to set user_id before saving
        static::saving(function ($car) {
            // Check if user_id is not already set
            if (!$car->user_id && auth()->check()) {
                $car->user_id = auth()->id();
            }
        });
    }
    
}
