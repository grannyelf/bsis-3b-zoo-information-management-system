<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'species_id',
        'year_age',
        'month_age',
        'gender',
        'weight',
        'height',
        'habitat_id',
        'category_id',
        'description',
        'image',
    ];

    protected $casts = [
        'year_age' => 'integer',
        'month_age' => 'integer',
        'weight' => 'float',
        'height' => 'float',
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
