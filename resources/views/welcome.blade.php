@extends('header', ['title'=>'login'])
@section('content')
@if(! \Illuminate\Support\Facades\Session::has('sent'))
<form action="{{route('preLogin')}}" method="post" class="form-control d-block w-25 mx-auto mt-5" >
@csrf
    <div class="mb-3">
        <label for="mobile" class="form-label">Mobile number</label>
        <input type="text" class="form-control" id="mobile" name="mobile">
    </div>
    <div>
        <input class="form-control bg-primary text-light" type="submit" value="send verification code">
    </div>
</form>
@else
<form action="{{route('login')}}" method="post" class="form-control d-block w-25 mx-auto mt-5" >
@csrf
    <div class="mb-3">
        <input type="hidden" name="mobile" value="{{\Illuminate\Support\Facades\Session::get('sent')}}">
        <label for="verification_code" class="form-label">verification code</label>
        <input type="text" class="form-control" id="verification_code" name="verification_code">
    </div>
    <div>
        <input class="form-control bg-primary text-light" type="submit" value="send verification code">
    </div>
</form>
@endif

@endsection

