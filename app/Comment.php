<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_text',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function setTask($id)
    {
        if($id == null){
            return;
        }
        $this->task_id = $id;
        $this->save();
    }

    public static function add($fields){
        $comment = new self;
        $comment->fill($fields);
        $comment->save();
        return $comment;
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
