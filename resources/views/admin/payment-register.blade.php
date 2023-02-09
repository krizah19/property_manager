@extends('layouts.master')


@section('title')
    Payments | Green City RMS
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
        <h5 class="modal-title" id="exampleModalLabel">Make New Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    
      </div>
      
      <form action="/save-payment" method="POST">
        {{ csrf_field() }}

      <div class="modal-body">
              
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Issue Date:</label>
                <input type="date" name="pay_date" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Author:</label>
                <select name="author" class="form-control" required>
                                <option value="">--Select Author--</option>
                                @foreach($users as $user_item)
                                    <option value="{{ $user_item->id }}">{{ $user_item->name }}</option>
                                @endforeach
                </select>
            </div>
             
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Invoice No.:</label>
                <input type="text" name="invoice_number" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Client Name:</label>
                <select name="tenants" class="form-control" required>
                                <option value="">--Select Client--</option>
                                @foreach($tenants as $tenant_item)
                                    <option value="{{ $tenant_item->id }}">{{ $tenant_item->name }}</option>
                                @endforeach
                </select>
            </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Payment for:</label>
                <select name="pay_for" class="form-control"required>
                                <option value="">--Select Payment--</option>
                                @foreach($payment_type as $pay_item)
                                    <option value="{{ $pay_item->id }}">{{ $pay_item->name }}</option>
                                @endforeach
                </select>
            </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Sum Kes.:</label>
                <input type="text" name="payment_amount" class="form-control" id="recipient-name">
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
                <h4 class="card-title">List of Payments
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
                <a href="{{ URL::to('/payments/pdf') }}">Export PDF</a>
                  <table id="datatable" class="table">
                    <thead class=" text-primary">
                      
                      <th class="w-10p">Issue Date</th>
                      <th class="w-10p">Author</th>
                      <th class="w-10p">Invoice No.</th>
                      <th class="w-10p">Client</th>
                      <th class="w-10p">Payment for</th>
                      <th class="w-10p">Amount paid</th>
                      <th class="w-10p">Edit</th>
                      <th class="w-10p">Delete</th>
                    </thead>
                    <tbody>
                      @foreach ($payments as $data)
                      <tr>
                      
                        <td>{{ $data->pay_date }}</td>
                        <td>{{ $data->admin->name }}</td>
                        <td>{{ $data->invoice_number }}</td>  
                        <td>{{ $data->resident->name }}</td>
                        <td>{{ $data->bill->name }}</td>
                        <td>{{ $data->payment_amount }}</td>
                        
                        <td>
                            <a href="{{ url('payment-edit/'.$data->id) }}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                        <form action="{{ url('payment-delete/'.$data->id) }}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger">Delete</button>
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