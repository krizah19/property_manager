<style>
table, th, td {
  border: 1px solid;
}
</style>

<h1>Units List</h1>

<table class="table">
                    <thead class=" text-primary">
                      <th class="w-10p">Id</th>
                      <th class="w-10p">Property</th>
                      <th class="w-10p">Unit</th>
                      
                      <th class="w-10p">Status</th>
                      <th class="w-10p">Area (sq. feet)</th>
                      <th class="w-10p">Rooms</th>
                      <th class="w-10p">Bathroom</th>
                      <th class="w-10p">Features</th>
                      <th class="w-10p">Market rent</th>
                      <th class="w-10p">Rental amount</th>
                      <th class="w-10p">Deposit amount</th>
                      <th class="w-10p">Description</th>
                    </thead>
                    <tbody>
                      @foreach ($units as $data)
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->building->property_name }}</td>
                        <td>{{ $data->unit_number }}</td>
                
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->size }}</td>
                        <td>{{ $data->rooms }}</td>
                        <td>{{ $data->bathroom }}</td>
                        <td>{{ $data->features }}</td>
                        <td>{{ $data->market_rent }}</td>
                        <td>{{ $data->rental_amount }}</td>
                        <td>{{ $data->deposit_amount }}</td>
                        <td>{{ $data->description }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>