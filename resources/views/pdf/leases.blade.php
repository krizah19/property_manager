<style>
table, th, td {
  border: 1px solid;
}
@page {
    size: a4 landscape;
  }
</style>

                      <h1>Applications/Leases List</h1>
                    
                     
                      <table class="table">
                    <thead class=" text-primary">
                      <th class="w-10p">Id</th>
                      <th class="w-10p">Tenant Name</th>
                      <th class="w-10p">Status</th>
                      <th class="w-10p">Property</th>
                      <th class="w-10p">Unit No.</th>
                      <th class="w-10p">Lease Type</th>
                      <th class="w-10p">Occupants</th>
                      <th class="w-10p">Lease period from</th>
                      <th class="w-10p">to</th>
                      <th class="w-10p">Charges</th>
                      <th class="w-10p">Next due date</th>
                      <th class="w-10p">Rent</th>
                      <th class="w-10p">Deposit</th>
                      <th class="w-10p">Deposit date</th>
                      <th class="w-10p">Emergency Contact</th>
                      <th class="w-10p">Co Signer</th>
                      <th class="w-10p">Notes</th>
                      <th class="w-10p">Applicant Agrees</th>
                    </thead>
                    <tbody>
                      @foreach ($leases as $data)
                      <tr>
                        <td>{{ $data->id }}</td>
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
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
               