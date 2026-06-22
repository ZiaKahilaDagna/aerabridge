<?php

namespace App\Models;

use App\Models\Report;
use Illuminate\Database\Eloquent\Model;

class ReportPriorityLog extends Model
{
    protected $fillable = [
        'report_id',
        'old_score',
        'new_score',
        'reason',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}