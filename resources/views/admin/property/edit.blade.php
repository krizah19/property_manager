@extends('layouts.master')


@section('title')
   Edit Property 
@endsection


@section('content')

<div class="row">
          <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Property</h4>
                
    <form action="{{ url('property-update/'.$properties->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

      <div class="modal-body">
        
      <div class="form-group">
                <label for="recipient-name" class="col-form-label">Property Name:</label>
                <input type="text" name="property_name" class="form-control" value="{{ $properties->property_name }}">
              </div>
              <lable>Cover photo</label>
              <div class="input-group">
                <div class ="custom-file">
                <label class="custom-file-label">Choose file</label>
                <input type="file" name="photo" class="custom-file-input" value="{{ $properties->photo }}">
                </div>
               </div>
               <div class="form-group">
               <label for="recipient-name" class="col-form-label">Type:</label>
                <select name="type" class="form-control" required>
                                <option value="">--Select type--</option>
                                @foreach($house_type as $house_item)
                                    <option value="{{ $house_item->id }}">{{ $house_item->name }}</option>
                                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Number of units:</label>
                <input type="text" name="number_of_units" class="form-control" value="{{ $properties->number_of_units }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Owner:</label>
                <select name="owner" class="form-control" required>
                                <option value="">--Select Owner--</option>
                                @foreach($landlords as $landlord_item)
                                    <option value="{{ $landlord_item->id }}">{{ $landlord_item->name }}</option>
                                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Land Reference(L.R No.):</label>
                <input type="text" name="operating_account" class="form-control" value="{{ $properties->operating_account }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Lease term:</label>
                <input type="text" name="lease_term" class="form-control" value="{{ $properties->lease_term }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Country.:</label>
                <input type="text" name="country" class="form-control" value="{{ $properties->country }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">City:</label>
                <input type="text" name="city" class="form-control" value="{{ $properties->city }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ $properties->address }}">
              </div>

      </div>
      <div class="modal-footer">
        <a href="{{ url('property-register') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>  
                </div>
            </div>
        </div>
</div>

@endsection
