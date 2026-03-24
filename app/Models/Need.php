<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    use HasFactory;
    protected $fillable = [
        'food_name',
        'animal_needs',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
