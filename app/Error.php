<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $fillable = ['title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //参照したいテーブル
    protected $table = 'error_commits';
}
