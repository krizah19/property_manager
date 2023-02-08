<style>
table, th, td {
  border: 1px solid;
}
</style>

<h1>Property List</h1>

<table id="datatable" class="table">
                    <thead class=" text-primary">
                      <th class="w-10p">Id</th>
                      <th class="w-10p">Property Name</th>
                      <th class="w-10p">Type</th>
                      <th class="w-10p">No. of Units</th>
                      <th class="w-10p">Landlord</th>
                      <th class="w-10p">Operating account</th>
                      <th class="w-10p">Lease term</th>
                      <th class="w-10p">Country</th>
                      <th class="w-10p">City</th>
                      <th class="w-10p">Address</th>
                    </thead>
                    <tbody>
                      @foreach ($properties as $data)
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->property_name }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->number_of_units }}</td>
                        <td>{{ $data->landlord->name }}</td>
                        <td>{{ $data->operating_account }}</td>
                        <td>{{ $data->lease_term }}</td>
                        <td>{{ $data->country }}</td>
                        <td>{{ $data->city }}</td>
                        <td>{{ $data->address }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>