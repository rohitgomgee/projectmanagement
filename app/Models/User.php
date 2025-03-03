<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens; // Use Sanctum for token-based authentication

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // HasApiTokens now from Sanctum

    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    protected $hidden = ['password'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }
}
