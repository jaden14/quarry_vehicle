<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subquarry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','requirements',
    ];
    
    public function setrequirementsAttribute($value)
    {
        $this->attributes['requirements'] = json_encode($value);
    }

    public function getrequirementsAttribute($value)
    {
        return $this->attributes['requirements'] = json_decode($value);
    }
}
