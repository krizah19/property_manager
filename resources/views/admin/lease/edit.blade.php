@extends('layouts.master')


@section('title')
   Edit Lease
@endsection


@section('content')

<div class="row">
          <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Lease</h4>
                
    <form action="{{ url('lease-update/'.$leases->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

      <div class="modal-body">
        
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Applicant Name:</label>
                <input type="text" name="tenants" class="form-control" value="{{ $leases->tenants }}">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Application Status:</label>
                <select name="status" class="form-control" value="{{ $leases->status }}">
                                <option value="application">Application</option>
                                <option value="lease">Lease</option>
                                <option value="historical_lease">Historical Lease</option>
                            </select>
              </div>
              
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Property:</label>
                <input type="text" name="properties" class="form-control" value="{{ $leases->properties }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Unit applied for:</label>
                <input type="text" name="unit" class="form-control" value="{{ $leases->unit }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Lease type:</label>
                <select name="type" class="form-control" value="{{ $leases->type }}">
                                <option value="fixed">Fixed</option>
                                <option value="rollover">Fixed with rollover</option>
                                <option value="at_will">At-will</option>
                            </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">No. of Occupants:</label>
                <input type="text" name="occupants" class="form-control" value="{{ $leases->occupants }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Lease period from:</label>
                <input type="date" name="start_date" class="form-control" value="{{ $leases->start_date }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">to:</label>
                <input type="date" name="end_date" class="form-control" value="{{ $leases->end_date }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recurring Charges Freq.:</label>
                <select name="recurring_charges" class="form-control" value="{{ $leases->recurring_charges }}">
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="teo_weeks">Every two weeks</option>
                                <option value="monthly">Monthly</option>
                                <option value="two_months">Every two months</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="six_months">Every six months</option>
                                <option value="yearly">Yearly</option>
                                <option value="once">One time</option>
                            </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Next due date:</label>
                <input type="date" name="due_date" class="form-control" value="{{ $leases->due_date }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Rental Amount:</label>
                <input type="text" name="rent" class="form-control" value="{{ $leases->rent }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Security Deposit:</label>
                <input type="text" name="deposit" class="form-control" value="{{ $leases->deposit }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Security deposit date:</label>
                <input type="date" name="deposit_date" class="form-control" value="{{ $leases->deposit_date }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Emergency Contact Info:</label>
                <input type="tel" name="emergency_contact" class="form-control" value="{{ $leases->emergency_contact }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Co Signer Info:</label>
                <input type="text" name="co_signer" class="form-control" value="{{ $leases->co_signer }}">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Notes:</label>
                <textarea name="notes" class="form-control">{{ $leases->notes }}</textarea>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Applicant Agrees:</label>
                <select name="agreement" class="form-control" value="{{ $leases->agreement }}">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
              </div>        

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
