<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function Candidate()
{
    return $this->hasMany(Candidate::class);
}

public function Vote()
{
    return $this->hasMany(Vote::class);
}

}
