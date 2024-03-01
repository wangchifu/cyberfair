<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{    
    use HasFactory;

    protected $fillable = [
        'year_id','code','school','name','upload_user_id','user_id'
    ];

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function upload_user()
    {
        return $this->belongsTo(User::class,'upload_user_id','id');
    }

}
