<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'car_models';
    protected $primaryKey = 'id';
    public    $timestamps = true;
    protected $fillable   = ['model_name','founded','description','car_id'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
