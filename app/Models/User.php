<?php

namespace App\Models;

use App\Models\Instansi;
use App\Models\Report;
use App\Models\ReportVerification;
use App\Models\ReportAssignment;
use App\Models\ReportProgress;
use App\Models\Upvote;
use App\Models\Notification;
use App\Models\ReportComment;
use App\Models\Configuration;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'email',
        'password',
        'full_name',
        'phone',
        'role',             
        'instansi_id',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function comments()
    {
        return $this->hasMany(ReportComment::class);
    }

    public function verifications()
    {
        return $this->hasMany(ReportVerification::class, 'admin_id');
    }

    public function assignedBy()
    {
        return $this->hasMany(ReportAssignment::class, 'assigned_by');
    }

    public function tugas()
    {
        return $this->hasMany(ReportAssignment::class, 'petugas_id');
    }

    public function progres()
    {
        return $this->hasMany(ReportProgress::class, 'petugas_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function systemConfigurations()
    {
        return $this->hasMany(Configuration::class, 'updated_by');
    }
}