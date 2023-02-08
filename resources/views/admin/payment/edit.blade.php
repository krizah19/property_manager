@extends('layouts.master')


@section('title')
   Edit Payment 
@endsection


@section('content')

<div class="row">
          <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Payment</h4>
                
    <form action="{{ url('payment-update/'.$payments->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

      <div class="modal-body">

      <div class="form-group">
                <label for="recipient-name" class="col-form-label">Issue Date:</label>
                <input type="date" name="pay_date" class="form-control" value="{{ $payments->pay_date }}">
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
                <input type="text" name="invoice_number" class="form-control" value="{{ $payments->invoice_number }}">
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
                <select name="pay_for" class="form-control" required>
                                <option value="">--Select Payment--</option>
                                @foreach($payment_type as $pay_item)
                                    <option value="{{ $pay_item->id }}">{{ $pay_item->name }}</option>
                                @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Sum Kes.:</label>
                <input type="text" name="payment_amount" class="form-control" value="{{ $payments->payment_amount }}">
              </div>
      
      </div>
      <div class="modal-footer">
        <a href="{{ url('payment-register') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>  
                </div>
            </div>
        </div>
</div>

@endsection
