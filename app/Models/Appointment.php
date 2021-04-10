<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    public $timestamps = false;

    protected $fillable = [
        'complaints',
        'treatment',
        'medication',
        'treatment_fee',
        'resit_no',
        'queue_no'
    ];

    public function patient()
    {
        $this->hasMany(User::class);
    }
}
