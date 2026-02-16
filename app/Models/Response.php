<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'user_id', 'aspirasi_id', 'message',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function aspirasi() {
        return $this->belongsTo(Aspirasi::class);
    }
}
