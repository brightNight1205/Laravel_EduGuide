<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

     protected static $data = [
        'Royal University of Phnom Penh',
        'Institute of Technology of Cambodia',
        'Royal University of law and Economics',
        'Asia Europe University',
        'Cambodia Academy of Digital Technology',
        
    ];

      public static function getSampleNames()
    {
        return self::$data;
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
        public function majors()
    {
        return $this->hasMany(Major::class);
    }

}

