<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class job_desk extends Model
{
    use HasFactory;
    protected $fillable = ['jobdesk','description','salary'];

    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class);
    }
}
