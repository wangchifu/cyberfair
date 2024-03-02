<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{    
    use HasFactory;

    protected $fillable = [
        'year_id','code','school','site_name','user_id'
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
