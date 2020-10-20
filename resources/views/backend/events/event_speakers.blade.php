@extends('layouts.app_admin')
@section('title','Show speakers')
@section('content')
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
            @endif
 
                
             <form action="{{ url('admin/eventspeakers') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Speaker Name</label>
                   

                  <select name="speaker_id"  class="form-control @error('speaker_id') is-invalid @enderror">
                      <option value="">Select Speaker</option>
                      @foreach($arrSpeakers as $objSpeaker)
                        <option value="{{ $objSpeaker->id }}">{{ $objSpeaker->name }}</option>
                      @endforeach
                  </select>

 

                  @error('speaker_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <input type="hidden" name="event_id" value="{{ $event_id }}">
 
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>   




            <h2>Speakers</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Speaker Name</th>
                        <th>Speaker Position</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    @foreach($arrEventSpeakers as $objEventSpeaker)
                    <tr>
                        <td>{{ $objEventSpeaker->id }}</td>
                        <td>{{ $objEventSpeaker->name }}</td>
                        <td>{{ $objEventSpeaker->position }}</td>
                        <td>
                            
                            <form action="{{ url('admin/eventspeakers') }}/{{ $objEventSpeaker->id }}/{{ $event_id }}" method="post" enctype="multipart/form-data">
                                <button type="submit" class="btn btn-danger">Delete</button>
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
 
                  </tbody>
                </table>
            </div>
        </main>
@endsection