<?php

namespace App\Models;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ReportVerification extends Model
{
    protected $fillable = [
        'report_id',
        'admin_id',
        'verification_status',
        'note',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function superAdmin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}