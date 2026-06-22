<?php

namespace App\Models;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ReportProgress extends Model
{
    protected $fillable = [
        'report_id',
        'petugas_id',     
        'status',
        'description',
        'photo_evidence_url',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    // NAMA METHOD JUGA SAMA DENGAN ROLE
    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}