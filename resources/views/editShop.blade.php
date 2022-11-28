@extends('header', ['title'=>'edit shop'])
@section('content')
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a href="#" class="navbar-brand navbar-brand-center bg-black">
            <img class="navbar-brand-logo img-responsive" src="https://seller.epasazh.com/images/panel/seller-center-white.svg" style="width: 100px; height: 50px;" alt="Elephant">
        </a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="nav navbar-nav my-auto navbar-left not-padding">
                <li class="nav-item add-product-btn-cell my-auto">
                    <a class="dropdown text-decoration-none" href="#"><span class="add-product-icon pt-2   ">adding new product</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="circle" width="36" height="36" src="https://dl.epasazh.com/UserPhoto/default.png">
                        <p class="d-inline">{{auth()->user()->mobile}}</p>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <form action="{{route('editShop', $shop->unique_id)}}" method="post" class="form-control col-10 d-block w-50 mx-auto mt-5" >
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
    </div>
    <script type="module">
        $('.dropdown').on("click", function(){
            if(! $('.dropdown-menu').hasClass("show")  )
                $('.dropdown-menu').addClass("show")
            else
                $('.dropdown-menu').removeClass("show")

        });

    </script>


@endsection
