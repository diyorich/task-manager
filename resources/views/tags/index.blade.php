<button><a href="{{route('tags.create')}}">Создать новый тег</a></button>
<br><br><br>

<table border="1px">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Color</th>
        <th>Actions</th>
    </tr>
    @foreach($tags as $tag)
    <tr>
        <td>{{$tag->id}}</td>
        <td>{{$tag->title}}</td>
        <td style="background: {{$tag->color}}"></td>
        <td>
            <button><a href="{{route('tags.edit', $tag->id)}}">Edit</a></button>
            <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button>DELETE</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>