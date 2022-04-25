<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subquarry extends Model
{
    protected $fillable = ['requirements'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['requirements'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['requirements'] = json_decode($value);
    }
}