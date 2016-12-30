<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table = 'checkin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'tweet', 'latitude', 'longitude',
        ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}

