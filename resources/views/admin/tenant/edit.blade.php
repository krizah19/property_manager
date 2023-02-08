@extends('layouts.master')


@section('title')
   Edit Tenant 
@endsection


@section('content')

<div class="row">
          <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Tenant</h4>
                
    <form action="{{ url('tenant-update/'.$tenants->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

      <div class="modal-body">
        
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $tenants->name }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" name="email" class="form-control" value="{{ $tenants->email }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ $tenants->phone }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Date of Birth:</label>
                <input type="text" name="date_of_birth" class="form-control" value="{{ $tenants->date_of_birth }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">ID NO.:</label>
                <input type="text" name="id_number" class="form-control" value="{{ $tenants->id_number }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Salary:</label>
                <input type="text" name="salary" class="form-control" value="{{ $tenants->salary }}">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Assets:</label>
                <textarea name="assets" class="form-control">{{ $tenants->assets }}</textarea>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Status:</label>
                        <select name="status" class="form-control" value="{{ $tenants->status }}">
                              <option value="applying">Applying</option>
                              <option value="current-tenant">Current Tenant</option>
                              <option value="previous-tenant">Previous Tenant</option>
                        </select>
              </div>
      </div>
      <div class="modal-footer">
        <a href="{{ url('tenant-register') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>  
                </div>
            </div>
        </div>
</div>

@endsection
