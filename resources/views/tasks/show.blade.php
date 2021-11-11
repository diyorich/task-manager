<h2>Task: {{$task->title}}</h2>
<p>Done: {{strval($task->done)}}</p>
<p>Tags: 
@foreach($task->tags as $tag)
    <b style="color: {{$tag->color}}">{{$tag->title}}</b> 
    @if(!$loop->last)
    , 
    @endif
@endforeach
</p>
<br><br><br>
<form action="{{route('comments.store', $task->id)}}" method="POST">
    @csrf
    <textarea name="comment_text" id="" cols="30" rows="10">{{old('comment_text')}}</textarea>
    <button>Создать новый Коммент</button>
</form>

<table border="1px" style="width: 100%">
    <tr>
        <th>ID</th>
        <th>Text</th>
        <th>Actions</th>
    </tr>
    @foreach($comments as $comment)
    <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->comment_text}}</td>
        <td>
            <button><a href="{{route('comments.edit', ['task_id' => $task->id, 'id' => $comment->id])}}">Edit</a></button>
            <form action="{{route('comments.destroy', ['task_id' => $task->id, 'id' => $comment->id])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button>DELETE</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>