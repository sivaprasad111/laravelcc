@extends('website.main.master')

@section('title','Show booking data')


@section('body')

    <div class="jumbotron bg-info text-center">
        <h3 class="bg-warning p-3">Welcome To My Detail</h3>
        <img src="{{ url('upload/',$booking->image) }}" alt="" id="showimg" class="rounded-circle">
        <h2>My ID is : {{$booking->id}}</h2>
        <h2>My Room is : {{$booking->room}}</h2>
        <h2>My Email is : {{$booking->email}}</h2>
        <h2>My Address is : {{$booking->address}}</h2>
    </div>





@endsection
