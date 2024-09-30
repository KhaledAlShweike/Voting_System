<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function Cndidate()
{
    return $this->hasMany(Candidate::class);
}

public function votes()
{
    return $this->hasMany(Votes::class);
}

}
