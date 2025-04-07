<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'passport_number',
        'issue_date',
        'expiry_date',
    ] ;
    public function user()
    {
        return $this->belongsTo(User::class);  // Pasport foydalanuvchiga tegishli
    }

         
}