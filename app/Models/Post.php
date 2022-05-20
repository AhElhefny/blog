<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Category;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $date=['delete_at'];
    protected $with=['category','user','comments'];


    public function scopeFilter($qurey ,array $filters){

        $qurey->when($filters['search'] ?? false,fn($qurey , $search)=>
            $qurey->where(fn($query)=>
                  $query->where('title','like','%' . $search . '%')
                ->orWhere('excerpt','like','%' . $search . '%')
        ))->when($filters['category'] ?? false ,fn($query,$category)=>
                $query->whereHas('category',fn($query)=>
                $query->where('name',$category)
        ))->when($filters['user'] ?? false ,fn($query,$user)=>
                $query->whereHas('user',fn($query)=>
                $query->where('name',$user)
        ));
    }

//    public function getRouteKeyName()
//    {
//        return 'title'; // TODO: Change the autogenerated stub
//    }

    public function setTitleAttribute($title){
        $this->attributes['title']=Str::replace(' ','-',$title);
    }

    public function getTitleAttribute($title){
        return Str::replace('-',' ',$title);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}