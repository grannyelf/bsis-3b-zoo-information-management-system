<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'species_id',
        'age',
        'weight',
        'height',
        'habitat_id',
        'category_id',
        'description',
        'image',
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function habitat()
    {
        return $this->belongsTo(Habitat::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function needs()
    {
        return $this->belongsToMany(Need::class);
    }   
}
