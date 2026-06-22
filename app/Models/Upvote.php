<?php

namespace App\Models;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    protected $fillable = [
        'report_id',
        'user_id',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}