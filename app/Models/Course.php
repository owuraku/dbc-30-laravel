<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    public function students(): HasMany {
        return $this->hasMany(Student::class);
    }

    public function subjects(): BelongsToMany {
        return $this->belongsToMany(Subject::class);
    }
}
