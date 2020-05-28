<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id'];
    // Table Name
    protected $table = 'posts';
    // PK
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
