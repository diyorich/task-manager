@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<h2>Изменение таска: {{$task->title}}</h2>
<form action="{{route('tasks.update', $task->id)}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <p>
        <input type="text" name="title" value="{{$task->title}}">
    </p>
    <p>
        <select name="tags[]" multiple id="">
            @foreach($tags as $tag)
            <option
            @if(in_array($tag->id, $task->tags->pluck('id')->all()))
            selected
            @endif
             value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
    </p>
    <p>
        <button>Edit</button>
    </p>
</form>