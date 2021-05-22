<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    use HasFactory;

    protected $table = 'panel_companies';

    protected $fillable = [
        'company_name',
        'company_details',
        'max_coverage',
        'payback_period'
    ];

    public function patient()
    {
        $this->belongsTo(User::class);
    }
}
