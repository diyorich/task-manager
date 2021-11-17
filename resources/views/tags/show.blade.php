<button><a href="{{route('tasks.index')}}">Список тасков</a></button>


<table border="2px" style="width: 80%">
<tr><th>ID</th>
<th>Title</th>
<th>Date created</h>

@foreach($tag->tasks as $related_tasks)
<tr>
    <td>{{$related_tasks->id}}</td>
    <td>{{$related_tasks->title}}</td>
    <td>{{$related_tasks->created_at}}</td>
    <br>
</tr>
@endforeach
</table>

