<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable=['title','body','user_id','last_user_id'];

    public function user(){
        return $this->belongsTo(User::class);//由一个帖子找到一个用户
    }
    public function comments(){
        return $this->hasMany(Comment::Class);//一个用户有多个评论
    }
}
