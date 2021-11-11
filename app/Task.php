<?php

namespace App;

use App\Tag;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class, 
            'tasks__tags',
            'task_id',
            'tag_id'
        );
    }

    public function setTags($ids)
    {
        if($ids == null){
            return;
        }
        $this->tags()->sync($ids);
    }

    public static function add($fields){
        $task = new self;
        $task->fill($fields);
        $task->save();
        return $task;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
