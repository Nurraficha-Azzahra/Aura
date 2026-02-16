<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';
    protected $fillable = [
        'user_id', 'kategori_id', 'title', 'description', 'photo', 'status', 'created_at'
    ];  
    protected $hidden = ["update_at"]; 

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function responses() {
        return $this->hasMany(Response::class, 'aspirasi_id');
    }

}

