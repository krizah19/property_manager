<style>
table, th, td {
  border: 1px solid;
}
</style>

<h1>Tenant List</h1>
<table class="table">
                    <thead class=" text-primary">
                      <th class="w-10p">Id</th>
                      <th class="w-10p">Name</th>
                      <th class="w-10p">Email</th>
                      <th class="w-10p">Phone</th>
                      <th class="w-10p">DOB</th>
                      <th class="w-10p">ID No.</th>
                      <th class="w-10p">Salary</th>
                      <th class="w-10p">Assets</th>
                      <th class="w-10p">Status</th>
                    </thead>
                    <tbody>
                      @foreach ($tenants as $data)
                      <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->date_of_birth }}</td>
                        <td>{{ $data->id_number }}</td>
                        <td>{{ $data->salary }}</td>
                        <td>{{ $data->assets }}</td>
                        <td>{{ $data->status }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>