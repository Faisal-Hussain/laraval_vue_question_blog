<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
//    protected $fillable=['title','slug','body','category_id','user_id'];
protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class,'question_id','id')->latest()->with('like');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getPathAttributes(){
        return "/api/question/{question}";
    }
}
