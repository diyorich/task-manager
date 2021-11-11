@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<h2>Создание таска</h2>
<form action="{{route('tasks.store')}}" method="POST">
    @csrf
    <p>
        <input type="text" name="title" value="{{old('title')}}">
    </p>
    <p>
        <select name="tags[]" multiple id="">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
    </p>
    <p>
        <button>Save</button>
    </p>
</form>