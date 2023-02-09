@extends('layouts.master')


@section('title')
    Units | Green City RMS
@endsection



@section('content')

<style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 50%; /*Width for default modal */
        }
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Unit</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    
      </div>
      
      <form action="/save-unit" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

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
                <label for="recipient-name" class="col-form-label">Unit No.:</label>
                <input type="text" name="unit_number" class="form-control" id="recipient-name">
              </div>
              <lable>Cover photo</label>
              <div class="input-group">
                <div class ="custom-file">
                <label class="custom-file-label">Choose file</label>
                <input type="file" name="photo" class="custom-file-input">
                </div>
               </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Status:</label>
                        <select name="status" class="form-control">
                              <option value="occupied">Occupied</option>
                              <option value="listed">Listed</option>
                              <option value="unlisted">Unlisted</option>
                        </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Area (sq. feet):</label>
                <input type="text" name="size" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Rooms:</label>
                <input type="text" name="rooms" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Bathroom:</label>
                <input type="text" name="bathroom" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Features:</label>
                <textarea name="features" class="form-control" id="message-text"></textarea>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Market rent:</label>
                <input type="text" name="market_rent" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Rental amount:</label>
                <input type="text" name="rental_amount" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Deposit amount:</label>
                <input type="text" name="deposit_amount" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Description:</label>
                <textarea name="description" class="form-control" id="message-text"></textarea>
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
                <h4 class="card-title"> Units
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
                <a href="{{ URL::to('/units/pdf') }}">Export PDF</a>
                  <table id="datatable" class="table">
                    <thead class=" text-primary">
                      
                      <th class="w-10p">Property</th>
                      <th class="w-10p">Unit</th>
                      <th class="w-10p">Cover Photo</th>
                      <th class="w-10p">Status</th>
                      <th class="w-10p">Area (sq. feet)</th>
                      <th class="w-10p">Rooms</th>
                      <th class="w-10p">Bathroom</th>
                      <th class="w-10p">Features</th>
                      <th class="w-10p">Market rent</th>
                      <th class="w-10p">Rental amount</th>
                      <th class="w-10p">Deposit amount</th>
                      <th class="w-10p">Description</th>
                      <th class="w-10p">EDIT</th>
                      <th class="w-10p">DELETE</th>
                    </thead>
                    <tbody>
                      @foreach ($units as $data)
                      <tr>
                        
                        <td>{{ $data->building->property_name }}</td>
                        <td>{{ $data->unit_number }}</td>
                        <td> <img src="{{ asset('uploads/units/' .$data->photo) }}" width="200px;" height="75px;" alt="photo;"> </td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->size }}</td>
                        <td>{{ $data->rooms }}</td>
                        <td>{{ $data->bathroom }}</td>
                        <td>{{ $data->features }}</td>
                        <td>{{ $data->market_rent }}</td>
                        <td>{{ $data->rental_amount }}</td>
                        <td>{{ $data->deposit_amount }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                            <a href="{{ url('unit-edit/'.$data->id) }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                        <form action="{{ url('unit-delete/'.$data->id) }}" method="POST">
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