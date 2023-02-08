<style>
table, th, td {
  border: 1px solid;
}
@page {
    size: a4 landscape;
  }
</style>
                      <h1>Landlord List</h1>
                      <table class="table">
                    <thead class=" text-primary">
                      <th class="w-10p">Id</th>
                      <th class="w-10p">Name</th>
                      <th class="w-10p">Company</th>
                      <th class="w-10p">Email</th>
                      <th class="w-10p">Phone</th>
                      <th class="w-10p">DOB</th>
                      <th class="w-10p">County</th>
                      <th class="w-10p">Address</th>
                      <th class="w-10p">Description</th>
                    </thead>
                    <tbody>
                      @foreach ($landlords as $data)
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->company_name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->date_of_birth }}</td>
                        <td>{{ $data->county }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->description }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>