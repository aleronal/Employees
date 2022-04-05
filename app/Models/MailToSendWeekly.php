<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailToSendWeekly extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the UserEmailController
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
