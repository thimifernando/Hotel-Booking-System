@extends('layouts.app')
@section('title', 'Blog')
@section('content')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{-- <a href="{{ route('booking.create') }}" class="btn btn-info float-right mr-2" type="button">Add New Booking</a>
                <a href="{{ route('booking.view') }}" class="btn btn-info float-right mr-5" type="button">View Booking</a> --}}
            </div>
            


            <form action="{{ url()->current() }}">
 
                <div class="card-footer">
                    <div class="row">
   
                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                Results
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-light">

                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($book as $books)
                        <tr>{{$books->name}}</tr>


                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
