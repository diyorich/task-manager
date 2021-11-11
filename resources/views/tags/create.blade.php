@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<h2>Создание тега</h2>
<form action="{{route('tags.store')}}" method="POST">
    @csrf
    <p>
        <input type="text" name="title" value="{{old('title')}}">
    </p>
    <p>
        <input type="color" name="color" value="{{old('color')}}">
    </p>
    <p>
        <button>Save</button>
    </p>
</form>