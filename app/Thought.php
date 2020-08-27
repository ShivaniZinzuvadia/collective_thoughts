<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thought extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    static function getMaxSortOrder($published_by){
       $max = (Thought::where('published_by', $published_by)->max('sort_order')) + 1;
       return $max;
    }
}
