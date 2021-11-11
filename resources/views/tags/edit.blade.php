@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<h2>Создание тега</h2>
<form action="{{route('tags.update', $tag->id)}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <p>
        <input type="text" name="title" value="{{$tag->title}}">
    </p>
    <p>
        <input type="color" name="color" value="{{$tag->color}}">
    </p>
    <p>
        <button>Edit</button>
    </p>
</form>