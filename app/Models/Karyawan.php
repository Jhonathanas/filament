<?php

namespace App\Models;

use App\Models\job_desk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = ['nik','nama','jk'];
    
    public function job_desk(): BelongsTo
    {
        return $this->belongsTo(job_desk::class);
    }
}

