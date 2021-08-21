@extends('website.main.master')

@section('title','booking List')


@section('body')

    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6">
               <button class="btn btn-primary btn-lg">Booking List</button>
            </div>
            <div class="col-lg-6 d-flex justify-content-lg-end align-items-center">
               <a href="{{ route('booking.create') }}" class="btn btn-outline-light btn-lg">+ Add New Booking</a>
            </div>
        </div>

        {{-- flash sms --}}
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif
        {{-- end sms --}}

        {{-- this is table portion --}}
        <table class="table table-bordered text-white bg-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile Photo</th>
                    <th>Room</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Show</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($std as $booking)
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>
                        <img src="{{ url('upload/',$booking->image)}}" alt=""  class="rounded-circle" id="indeximg">
                    </td>
                    <td>{{$booking->room}}</td>
                    <td>{{$booking->email}}</td>
                    <td>{{$booking->address}}</td>
                    {{-- show link --}}
                    <td>
                        <a href="{{ route('booking.show',$booking->id) }}" class="btn btn-primary">Show</a>
                    </td>
                    {{-- end --}}

                    {{-- edit link --}}
                    <td>
                        <a href="{{ route('booking.edit',$booking->id) }}" class="btn btn-success">Edit</a>
                    </td>
                    {{-- edit end --}}

                    {{-- for delete --}}
                    <td>
                        <form action="{{ route('booking.destroy',$booking->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                    {{-- end delete --}}
                </tr>
                @endforeach

            </tbody>
        </table>
        {{-- end table --}}

        <div class="d-flex justify-content-center align-items-center">
            <div>{{$std->links()}}</div>
        </div>
    </div>





@endsection
