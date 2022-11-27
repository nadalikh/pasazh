<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- JavaScript Bundle with Popper -->
    <!-- CSS only -->
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>--}}

    <style>
        .add-product-icon {
            width: 142px;
            height: 35px;
            background-image: url("https://seller.epasazh.com/images/panel/plus-symbol-white.svg");
            background-size: 15px;
            background-position: 122px 50%;
            position: relative;
            background-color: #00adf0;
            background-repeat: no-repeat;
            border-radius: 200px;
            color: white;
            font-size: 13px !important;
            display: inline-flex;￼
            align-items: center;
            padding: 0 15px;
            font-family: iranyekanB;
            line-height: normal;
        }
        li.dropdown.add-product-btn-cell {
            height: 60px;
            display: flex;
            align-items: center;
        }
    </style>
    <title>{{$title}}</title>
    @vite(['resources/js/app.js'])
</head>
<body>
@yield('content')
@extends('footer')

