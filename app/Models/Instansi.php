<?php

namespace App\Models;

use App\Models\User;
use App\Models\ReportAssignment;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $fillable = [
        'name',
        'category',
        'head_name',
        'phone',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function reportAssignments()
    {
        return $this->hasMany(ReportAssignment::class);
    }
}