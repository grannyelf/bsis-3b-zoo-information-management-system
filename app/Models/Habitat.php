<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habitat extends Model
{
    use HasFactory;
   protected $fillable = [
        'hab_name',
        'hab_desc',
        'hab_temp',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
