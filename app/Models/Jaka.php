<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaka extends Model
{
    use HasFactory;

    protected $primaryKey = "jaka_id";

    protected $fillable = [
        'jaka_name',
    ];

    public function lecturer(){
        return $this->hasMany(Lecturer::class);
    }
}
