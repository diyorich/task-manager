<?php

namespace App\Http\Controllers;

use App\Task;
use App\Tag;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('tasks.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $task = Task::add($request->all());
        $task->setTags($request->get('tags'));
        return redirect()->route('tasks.index');
    }

    public function show($task_id)
    {
        $task = Task::find($task_id);
        $comments = $task->comments->all();
        return view('tasks.show', compact('task', 'comments'));
    }

    public function edit($task_id)
    {
        $task = Task::find($task_id);
        $tags = Tag::all();
        return view('tasks.edit', compact('tags', 'task'));
    }

    public function update(Request $request, $task_id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $task = Task::find($task_id);
        $task->edit($request->all());
        $task->setTags($request->get('tags'));
        return redirect()->route('tasks.index');
    }

    public function destroy($task_id)
    {
        Task::find($task_id)->remove();
        return redirect()->back();
    }
}
