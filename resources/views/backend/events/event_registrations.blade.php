@extends('layouts.app_admin')
@section('title','Show Event Registrations')
@section('content')
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
            @endif
 
             
             

            <h2>Registrations</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        
                        <th>Ticket Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($arrRegistrations as $objRegistration)
                     <tr>
                        <td>{{ $objRegistration->id }}</td> 
                        <td>{{ $objRegistration->name }}</td>
                        <td>{{ $objRegistration->email }}</td>
                        <td>{{ $objRegistration->phone }}</td>
                        <td>{{ $objRegistration->ticket_type }}</td>
                        <td>{{ $objRegistration->status }}</td>
                        <td>
                            @if($objRegistration->status=='pending')
                                <form action="{{ url('admin/update_event_register') }}/{{ $objRegistration->id }}/accepted" method="post">
                                    <button type="submit" class="btn btn-success">Accepted</button>
                                     
                                    @csrf
                                </form>

                                <form action="{{ url('admin/update_event_register') }}/{{ $objRegistration->id }}/rejected" method="post">
                                    <button type="submit" class="btn btn-danger">Rejected</button>
                                     
                                    @csrf
                                </form>
                            @else
                                No action
                            @endif
                        </td>
                        
                     </tr>
                     @endforeach
                    
 
                  </tbody>
                </table>
            </div>
        </main>
@endsection