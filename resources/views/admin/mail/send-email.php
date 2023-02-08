@extends('layouts.master')


@section('title')
   Send Email 
@endsection


@section('content')

<div class="row">
          <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Send an email</h4>
                
    <form>

      <div class="modal-body">
        
    <div class="form-group">
       <h4>Email Template Email has been sent to client</h4>
    </div>
      <div class="modal-footer">
        <a href="{{ url('lease-register') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>  
                </div>
            </div>
        </div>
</div>

@endsection
