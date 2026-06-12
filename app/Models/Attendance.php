<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'attendance_date',
        'check_in_time',
        'check_out_time',
        'worked_hours',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }
}
