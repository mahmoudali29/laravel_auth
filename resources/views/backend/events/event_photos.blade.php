@extends('layouts.app_admin')
@section('title','Show Event Photos')
@section('content')
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
            @endif
 
             



            <h2>Photos</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    
 
                  </tbody>
                </table>
            </div>
        </main>
@endsection