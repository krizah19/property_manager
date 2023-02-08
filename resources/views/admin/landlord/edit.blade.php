@extends('layouts.master')


@section('title')
   Edit Landlord 
@endsection


@section('content')

<div class="row">
          <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Landlord</h4>
                
    <form action="{{ url('landlord-update/'.$landlords->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

      <div class="modal-body">
        
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $landlords->name }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Company Name:</label>
                <input type="text" name="company_name" class="form-control" value="{{ $landlords->company_name }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" name="email" class="form-control" value="{{ $landlords->email }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ $landlords->phone }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Date of Birth:</label>
                <input type="text" name="date_of_birth" class="form-control" value="{{ $landlords->date_of_birth }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">County.:</label>
                <input type="text" name="county" class="form-control" value="{{ $landlords->county }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ $landlords->address }}">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Description:</label>
                <textarea name="description" class="form-control">{{ $landlords->description }}</textarea>
              </div>
      </div>
      <div class="modal-footer">
        <a href="{{ url('landlord-register') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>  
                </div>
            </div>
        </div>
</div>

@endsection
