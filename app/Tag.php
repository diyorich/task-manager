<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'color'
    ];

    public function tasks()
    {
        return $this->belongsToMany(
            Task::class, 
            'tasks__tags',
            'tag_id',
            'task_id'
        );
    }

    public static function add($fields){
        $tag = new self;
        $tag->fill($fields);
        $tag->save();
        return $tag;
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
