<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleViolations extends Model
{
    use HasFactory;
    protected $fillable = ['date','time','plate_no','responsible','conveyance_type','violation_type','remarks'];
    protected $date = ['date'];
    protected $time = ['time'];
}
