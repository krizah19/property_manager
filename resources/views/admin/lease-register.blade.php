@extends('layouts.master')


@section('title')
    
Leases | Green City RMS
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Lease</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    
      </div>
      
      <form action="/save-lease" method="POST">
        {{ csrf_field() }}

      <div class="modal-body">
        
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Applicant Name:</label>
                <select name="tenants" class="form-control" required>
                                <option value="">--Select Tenant--</option>
                                @foreach($tenants as $tenant_item)
                                    <option value="{{ $tenant_item->id }}">{{ $tenant_item->name }}</option>
                                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Application Status:</label>
                <select name="status" class="form-control">
                                <option value="application">Application</option>
                                <option value="lease">Lease</option>
                                <option value="historical_lease">Historical Lease</option>
                            </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Property:</label>
                <select name="properties" class="form-control" required>
                                <option value="">--Select Property--</option>
                                @foreach($properties as $property_item)
                                    <option value="{{ $property_item->id }}">{{ $property_item->property_name }}</option>
                                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Unit applied for:</label>
                <select name="unit" class="form-control" required>
                                <option value="">--Select Unit--</option>
                                @foreach($units as $unit_item)
                                    <option value="{{ $unit_item->id }}">{{ $unit_item->unit_number }}</option>
                                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-label">Lease type:</label>
                <select name="type" class="form-control">
                                <option value="fixed">Fixed</option>
                                <option value="rollover">Fixed with rollover</option>
                                <option value="at_will">At-will</option>
                            </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-label">No. of Occupants:</label>
                <input type="text" name="occupants" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Lease period from:</label>
                <input type="date" name="start_date" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">to:</label>
                <input type="date" name="end_date" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recurring Charges Freq.:</label>
                <select name="recurring_charges" class="form-control">
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
                <input type="date" name="due_date" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Rental Amount:</label>
                <input type="text" name="rent" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Security Deposit:</label>
                <input type="text" name="deposit" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Security deposit date:</label>
                <input type="date" name="deposit_date" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Emergency Contact:</label>
                <input type="tel" name="emergency_contact" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Co Signer Info:</label>
                <input type="text" name="co_signer" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Notes:</label>
                <textarea name="notes" class="form-control" id="message-text"></textarea>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Applicant Agrees:</label>
                <select name="agreement" class="form-control">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
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
                <h4 class="card-title"> Applications/Leases
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
                <a href="{{ URL::to('/leases/pdf') }}">Export PDF</a>
                  <table id="datatable" class="table">
                    <thead class=" text-primary">
                      
                      <th class="w-10p">Applicant Name</th>
                      <th class="w-10p">Status</th>
                      <th class="w-10p">Property</th>
                      <th class="w-10p">Unit</th>
                      <th class="w-10p">Type</th>
                      <th class="w-10p">No. of Occupants</th>
                      <th class="w-10p">Lease from</th>
                      <th class="w-10p">to</th>
                      <th class="w-10p">Recurring Charges</th>
                      <th class="w-10p">Due date</th>
                      <th class="w-10p">Rent</th>
                      <th class="w-10p">Deposit</th>
                      <th class="w-10p">Deposit date</th>
                      <th class="w-10p">Emergency Contact</th>
                      <th class="w-10p">Co Signer</th>
                      <th class="w-10p">Notes</th>
                      <th class="w-10p">Applicant Agrees</th>
          
                      <th class="w-10p">EDIT</th>
                      <th class="w-10p">DELETE</th>
                    </thead>
                    <tbody>
                      @foreach ($leases as $data)
                      <tr>
                        
                        <td>{{ $data->tenant->name }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->property->property_name }}</td> 
                        <td>{{ $data->house->unit_number }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->occupants }}</td>
                        <td>{{ $data->start_date }}</td>
                        <td>{{ $data->end_date }}</td>
                        <td>{{ $data->recurring_charges }}</td>
                        <td>{{ $data->due_date }}</td>
                        <td>{{ $data->rent }}</td>
                        <td>{{ $data->deposit }}</td>
                        <td>{{ $data->deposit_date }}</td>
                        <td>{{ $data->emergency_contact }}</td>
                        <td>{{ $data->co_signer }}</td>
                        <td>{{ $data->notes }}</td>
                        <td>{{ $data->agreement }}</td>
                        
                        <td>
                            <a href="{{ url('lease-edit/'.$data->id) }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                          <form action="{{ url('lease-delete/'.$data->id) }}" method="POST">
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