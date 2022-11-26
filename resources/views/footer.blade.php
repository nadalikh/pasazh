@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-center text-danger">{{$error}}</p>
    @endforeach
@endif
@if (\Illuminate\Support\Facades\Session::has('success'))
    <p class="text-center text-success">{{\Illuminate\Support\Facades\Session::get('success')}}</p>
@endif
</body>
</html>
