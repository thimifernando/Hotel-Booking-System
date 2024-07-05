@extends('layouts.app')
@section('title', 'Contact Details')
@section('content')


    <div class="container-fluid">
        <div class="card">
            {{-- <div class="card-header">
                <a href="{{ route('booking.create') }}" class="btn btn-info float-right mr-2" type="button">Add New Booking</a>
                <a href="{{ route('booking.view') }}" class="btn btn-info float-right mr-5" type="button">View Booking</a>
            </div> --}}
            


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
                            <th>Name</th>
                            {{-- <th>Email</th> --}}
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($con as $contact)
                        <tr>
                        
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        {{-- <td>{{ $contact->email }}</td> --}}
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td><a href="{{ route('contacts.destroy', $contact->id) }}" class="btn btn-danger" 
                            onclick="event.preventDefault(); 
                                     if(confirm('Are you sure you want to delete this contact?')) {
                                         document.getElementById('delete-form-{{ $contact->id }}').submit();
                                     }">
                             Delete
                         </a></td>
             
                         <!-- Hidden delete form -->
                         <form id="delete-form-{{ $contact->id }}" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: none;">
                             @csrf
                             @method('DELETE')
                         </form>
                     </div>
                            

                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
