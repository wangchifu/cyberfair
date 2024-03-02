<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{    
    use HasFactory;

    protected $fillable = [
        'year_id','code','school','user_id'
    ];

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
