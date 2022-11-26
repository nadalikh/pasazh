@extends('header', ['title'=>'making shop'])
@section('content')
<form action="{{route('createShop')}}" method="post" class="form-control d-block w-50 mx-auto mt-5" >
@csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="Slogan" class="form-label">Slogan</label>
        <input type="text" class="form-control" id="Slogan" name="Slogan">
    </div>
    <div class="mb-3">
        <label for="shopId" class="form-label">Unique id</label>
        <input type="text" class="form-control" id="shopId" name="shopId">
    </div>
    <div class="mb-3">
        <select name="state" class="form-select w-25 d-inline mx-1">
            <option selected >select state</option>
            <option value="Tehran">Tehran</option>
            <option value="Alborz">Alborz</option>
            <option value="Azarbaijan">Azarbaijan</option>
        </select>
        <select name="city" class="form-select w-25 d-inline mx-1">
            <option selected >select city</option>
            <option value="Tehran">Tehran</option>
            <option value="Boomehen">Boomehen</option>
            <option value="Pardis">Pardis</option>
        </select>
    </div>
    <div>
        <input class="form-control bg-primary text-light" type="submit" value="save my store">
    </div>
</form>


@endsection
@extends('footer')
