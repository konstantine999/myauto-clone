<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Car extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    protected $fillable = [
        'manufacturer_id',
        'model_id',
        'category_id',
        'transmission_id',
        'fuel_type',
        'color_id',
        'interior_material',
        'engine_size',
        'cylinder_count',
        'airbag_count',
        'mileage',
        'mileage_dimension',
        'steering_wheel_position',
        'drive',
        'door_count',
        'have_cats',
        'is_duty_paid',
        'is_turbo',
        'is_inspection_passed',
        'price',
        'description',
        'manufacture_year',
        'user_id',
    ];
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($car) {
            if (!$car->user_id && auth()->check()) {
                $car->user_id = auth()->id();
            }
        });
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function model()
    {
        return $this->belongsTo(CarModell::class, 'model_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function transmission()
    {
        return $this->belongsTo(Transmission::class, 'transmission_id');
    }
    public function fuel()
    {
        return $this->belongsTo(FuelType::class, 'fuel_type');
    }
    public function color()
    {
        return $this->belongsTo(CarColors::class, 'color_id');
    }
    public function interiorMaterial()
    {
        return $this->belongsTo(InteriorMaterial::class, 'interior_material');
    }
    public function fuelType()
    {
        return $this->belongsTo(FuelType::class, 'fuel_type');
    }

}
