<?php

namespace App\Models;

<<<<<<< HEAD
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

=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
>>>>>>> e7931bbbacd40f92ce42736210fc5eb200712355
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
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
=======
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
>>>>>>> e7931bbbacd40f92ce42736210fc5eb200712355
