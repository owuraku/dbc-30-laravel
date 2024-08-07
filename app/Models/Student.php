<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $attributes = ['imageURL'];

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function getImageURL() {
        $image = $this->image ? $this->image : 'images/default.jpg'; // not necessary
        return Storage::url($image);
    }
}
