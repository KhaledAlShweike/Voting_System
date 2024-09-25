<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function CandidateCategory()
    {
        return $this->hasMany(CandidateCategory::class);
    }
}
