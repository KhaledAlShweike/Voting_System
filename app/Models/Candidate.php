<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public function Media()
{
    return $this->hasMany(Media::class);
}

public function Category()
{
    return $this->belongsTo(Category::class);
}

public function votes()
    {
        return $this->hasMany(Votes::class);
    }

}
