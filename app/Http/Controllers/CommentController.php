<?php

namespace App\Http\Controllers;

use App\Task;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, $task_id)
    {
        $this->validate($request, [
            'comment_text' => 'required',
        ]);
        $comment = Comment::add($request->all());
        $comment->setTask($task_id);
        return redirect()->back();
    }

    public function edit($task_id, $id)
    {
        $task = Task::find($task_id);
        $comment = $task->comments()->find($id);
        return view('comments.edit', compact('comment', 'task'));
    }

    public function update(Request $request, $task_id, $id)
    {
        $this->validate($request, [
            'comment_text' => 'required',
        ]);
        $task = Task::find($task_id);
        $comment = $task->comments()->find($id);
        $comment->edit($request->all());
        return redirect()->route('tasks.show', $task_id);
    }

    public function destroy($task_id, $id)
    {
        $task = Task::find($task_id);
        $comment = $task->comments()->find($id)->remove();
        return redirect()->back();
    }
}
