<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    //参照したいテーブル
    protected $table = 'error_commits';
}
