@extends('layouts.master')


@section('title')
    Properties | Green City RMS
@endsection



@section('content')

<style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 50%; /* New width for default modal */
        }
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Property</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    
      </div>
      
      <form action="/save-property" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

      <div class="modal-body">
        
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Property Name:</label>
                <input type="text" name="property_name" class="form-control" id="recipient-name">
              </div>
              <lable>Cover photo</label>
              <div class="input-group">
                <div class ="custom-file">
                <label class="custom-file-label">Choose file</label>
                <input type="file" name="photo" class="custom-file-input">
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
                <input type="text" name="number_of_units" class="form-control" id="recipient-name">
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
                <label for="recipient-name" class="col-form-label">Land Reference (L.R. No.):</label>
                <input type="text" name="operating_account" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Lease term:</label>
                <input type="text" name="lease_term" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Country.:</label>
                <input type="text" name="country" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">City:</label>
                <input type="text" name="city" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Address:</label>
                <input type="text" name="address" class="form-control" id="recipient-name">
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Properties
                  <button type="button" class="btn btn-primary small float-right" data-toggle="modal" data-target="#exampleModal">New Entry</button>
                </h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <style>
                .w-10p{
                  width:10% !important;
                }
              </style>
              <div class="card-body">
                <div class="table-responsive">
                <a href="{{ URL::to('/properties/pdf') }}">Export PDF</a>
                  <table id="datatable" class="table">
                    <thead class=" text-primary">
                      
                      <th class="w-10p">Property Name</th>
                      <th class="w-10p">Cover photo</th>
                      <th class="w-10p">Type</th>
                      <th class="w-10p">Units</th>
                      <th class="w-10p">Landlord</th>
                      <th class="w-10p">L.R. No.</th>
                      <th class="w-10p">Lease term</th>
                      <th class="w-10p">Country</th>
                      <th class="w-10p">City</th>
                      <th class="w-10p">Address</th>
                      <th class="w-10p">EDIT</th>
                      <th class="w-10p">DELETE</th>
                    </thead>
                    <tbody>
                      @foreach ($properties as $data)
                      <tr>
                        
                        <td>{{ $data->property_name }}</td>
                        <td> <img src="{{ asset('uploads/properties/' .$data->photo) }}" width="120px;" height="70px;" alt="photo;"> </td>
                        <td>{{ $data->house->name }}</td>
                        <td>{{ $data->number_of_units }}</td>
                        <td>{{ $data->landlord->name }}</td>
                        <td>{{ $data->operating_account }}</td>
                        <td>{{ $data->lease_term }}</td>
                        <td>{{ $data->country }}</td>
                        <td>{{ $data->city }}</td>
                        <td>{{ $data->address }}</td>
                        <td>
                            <a href="{{ url('property-edit/'.$data->id) }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                        <form action="{{ url('property-delete/'.$data->id) }}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger">DELETE</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        
</div>


@endsection


@section('scripts')

<script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>

@endsection