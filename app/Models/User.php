<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nric',
        'email',
        'password',
        'gender',
        'phone_no',
        'address',
        'next_of_kin_phone_no',
        'next_of_kin',
        'position',
        'status',
        'appointment_id',
        'password',
        'panel_id',
        'worker_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**p
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appointment()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_users');
    }

    public function panel()
    {
        return $this->belongsTo(Panel::class);
    }
}
