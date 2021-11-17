<button><a href="{{route('tasks.create')}}">Создать новую задачу</a></button>
<br><br><br>

<table border="1px" style="width: 100%">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Done</th>
        <th>Tags</th>
        <th>Actions</th>
    </tr>
    @foreach($tasks as $task)
    <tr>
        <td>{{$task->id}}</td>
        <td>{{$task->title}} <br> Комментариев: {{$task->comments()->count()}}</td>
        <td style="background:
        @if($task->done)
        green
        @else
        red
        @endif
        "></td>
        <td>
            @foreach($task->tags as $tag)
                <a href="{{route('tasktag.show', $tag->id)}}"><b style="color: {{$tag->color}}">{{$tag->title}}</b></a>
                @if(!$loop->last)
                , 
                @endif
            @endforeach <br> ({{$task->tags()->count()}})
        </td>
        <td>
            <button><a href="{{route('tasks.show', $task->id)}}">Show</a></button>
            <button><a href="{{route('tasks.edit', $task->id)}}">Edit</a></button>
            <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button>DELETE</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>