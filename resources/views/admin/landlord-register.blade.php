@extends('layouts.master')


@section('title')
    Landlords | Green City RMS
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Landlord</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    
      </div>
      
      <form action="/save-landlord" method="POST">
        {{ csrf_field() }}

      <div class="modal-body">
        
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" name="name" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Company Name:</label>
                <input type="text" name="company_name" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" name="email" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Date of Birth:</label>
                <input type="date" name="date_of_birth" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">County.:</label>
                <input type="text" name="county" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Address:</label>
                <input type="text" name="address" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Description:</label>
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
                <h4 class="card-title"> Landlords
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
                <a href="{{ URL::to('/landlords/pdf') }}">Export PDF</a>
                  <table id="datatable" class="table">
                    <thead class=" text-primary">
                      
                      <th class="w-10p">Name</th>
                      <th class="w-10p">Company</th>
                      <th class="w-10p">Email</th>
                      <th class="w-10p">Phone</th>
                      <th class="w-10p">DOB</th>
                      <th class="w-10p">County</th>
                      <th class="w-10p">Address</th>
                      <th class="w-10p">Description</th>
                      <th class="w-10p">EDIT</th>
                      <th class="w-10p">DELETE</th>
                    </thead>
                    <tbody>
                      @foreach ($landlords as $data)
                      <tr>
                        
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->company_name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->date_of_birth }}</td>
                        <td>{{ $data->county }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                            <a href="{{ url('landlord-edit/'.$data->id) }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                        <form action="{{ url('landlord-delete/'.$data->id) }}" method="POST">
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