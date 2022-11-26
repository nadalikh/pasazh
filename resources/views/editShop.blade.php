@extends('header', ['title'=>'edit shop'])
@section('content')
<form action="{{route('editShop', $shop->unique_id)}}" method="post" class="form-control d-block w-50 mx-auto mt-5" >
@csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$shop->name}}">
    </div>
    <div class="mb-3">
        <label for="Slogan" class="form-label">Slogan</label>
        <input type="text" class="form-control" id="Slogan" name="Slogan" value="{{$shop->Slogan}}">
    </div>
    <div class="mb-3">
        <label for="shopId" class="form-label">Unique id</label>
        <input type="text" class="form-control" id="shopId" name="shopId" value="{{$shop->unique_id}}" >
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{$shop->phone}}">
    </div>
    <div class="mb-3">
        <label for="mobile" class="form-label">mobile</label>
        <input type="text" class="form-control" id="phone" name="mobile" value="{{$shop->mobile}}">
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{$shop->address}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{$shop->description}}">
    </div>
    <div class="mb-3">
        <select name="state" class="form-select w-25 d-inline mx-1">
            <option value="Tehran"  {{ ($shop->state == "Tehran") ? "selected" : ""}}>Tehran</option>
            <option value="Alborz" {{($shop->state == "Alborz") ? "selected" : ""}}>Alborz</option>
            <option value="Azarbaijan" {{($shop->state == "Azarbaijan") ? "selected" : ""}}>Azarbaijan</option>
        </select>
        <select name="city" class="form-select w-25 d-inline mx-1">
            <option value="Tehran" {{ ($shop->city == "Tehran") ? "selected" : ""}}>Tehran</option>
            <option value="Boomehen" {{ ($shop->city == "Boomehen") ? "selected" : ""}}>Boomehen</option>
            <option value="Pardis" {{ ($shop->city == "Pardis") ? "selected" : ""}}>Pardis</option>
        </select>
    </div>
    <div>
        <input class="form-control bg-primary text-light" type="submit" value="update my store">
    </div>
</form>


@endsection
@extends('footer')
