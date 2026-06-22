<?php

namespace App\Models;

use App\Models\User;
use App\Models\ReportVerification;
use App\Models\ReportAssignment;
use App\Models\ReportProgress;
use App\Models\Upvote;
use App\Models\Notification;
use App\Models\ReportComment;
use App\Models\ReportPriorityLog;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'photo_url',
        'latitude',
        'longitude',
        'location_address',
        'category',
        'priority_score',
        'ai_analysis_result',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verification()
    {
        return $this->hasOne(ReportVerification::class);
    }

    public function assignment()
    {
        return $this->hasOne(ReportAssignment::class);
    }

    public function progress()
    {
        return $this->hasMany(ReportProgress::class);
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function comments()
    {
        return $this->hasMany(ReportComment::class);
    }

    public function priorityLogs()
    {
        return $this->hasMany(ReportPriorityLog::class);
    }
}