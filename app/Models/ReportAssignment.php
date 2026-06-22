<?php

namespace App\Models;

use App\Models\Report;
use App\Models\Instansi;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ReportAssignment extends Model
{
    protected $fillable = [
        'report_id',
        'instansi_id',
        'petugas_id',      
        'assigned_by',
        'deadline',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }

    // NAMA METHOD JUGA SAMA DENGAN ROLE
    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}