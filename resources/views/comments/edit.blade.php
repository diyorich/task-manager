@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<h2>Изменение комментария к таску: {{$task->title}}</h2>
<form action="{{route('comments.update', ['task_id' => $task->id, 'id' => $comment->id])}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <textarea name="comment_text" id="" cols="30" rows="10">{{$comment->comment_text}}</textarea>
    <button>Изменить</button>
</form>