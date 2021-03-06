<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['message','recived_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
