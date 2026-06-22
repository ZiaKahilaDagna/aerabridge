<?php

namespace App\Models;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ReportComment extends Model
{
    protected $fillable = [
        'report_id',
        'user_id',
        'parent_comment_id',
        'content',
        'is_internal',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(ReportComment::class, 'parent_comment_id');
    }

    public function replies()
    {
        return $this->hasMany(ReportComment::class, 'parent_comment_id');
    }

    public function isReply()
    {
        return !is_null($this->parent_comment_id);
    }
}