@extends('layouts.master')


@section('title')
   Edit Unit 
@endsection


@section('content')

<div class="row">
          <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Unit</h4>
                
    <form action="{{ url('unit-update/'.$units->id) }}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

      <div class="modal-body">
        
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Property:</label>
                <select name="property" class="form-control" required>
                                <option value="">--Select Property--</option>
                                @foreach($properties as $property_item)
                                    <option value="{{ $property_item->id }}">{{ $property_item->property_name }}</option>
                                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Unit:</label>
                <input type="text" name="unit_number" class="form-control" value="{{ $units->unit_number }}">
              </div>
              <lable>Cover photo</label>
              <div class="input-group">
                <div class ="custom-file">
                <label class="custom-file-label">Choose file</label>
                <input type="file" name="photo" class="custom-file-input" value="{{ $units->photo }}">
                </div>
               </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Status:</label>
                        <select name="status" class="form-control" value="{{ $units->status }}">
                              <option value="occupied">Occupied</option>
                              <option value="listed">Listed</option>
                              <option value="unlisted">Unlisted</option>
                        </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Area (sq. feet):</label>
                <input type="text" name="size" class="form-control" value="{{ $units->size }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Rooms:</label>
                <input type="text" name="rooms" class="form-control" value="{{ $units->rooms }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Bathroom:</label>
                <input type="text" name="bathroom" class="form-control" value="{{ $units->bathroom }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Features:</label>
                <textarea name="features" class="form-control">{{ $units->features }}</textarea>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Market rent:</label>
                <input type="text" name="market_rent" class="form-control" value="{{ $units->market_rent }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Rental amount:</label>
                <input type="text" name="rental_amount" class="form-control" value="{{ $units->rental_amount }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Deposit amount:</label>
                <input type="text" name="deposit_amount" class="form-control" value="{{ $units->deposit_amount }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Description:</label>
                <textarea name="description" class="form-control">{{ $units->description }}</textarea>
              </div>

      </div>
      <div class="modal-footer">
        <a href="{{ url('unit-register') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>  
                </div>
            </div>
        </div>
</div>

@endsection
