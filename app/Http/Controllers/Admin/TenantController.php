<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenants;
use PDF;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenants::all();
        return view('admin.tenant-register')
            ->with('tenants',$tenants);
    }
    public function store(Request $request)
    {
        $tenants = new Tenants;
        
        $tenants->name = $request->input('name');
        $tenants->email = $request->input('email');
        $tenants->phone = $request->input('phone');
        $tenants->date_of_birth = $request->input('date_of_birth');
        $tenants->id_number = $request->input('id_number');
        $tenants->salary = $request->input('salary');
        $tenants->assets = $request->input('assets');
        $tenants->status = $request->input('status');

        $tenants->save();
        return redirect('/tenant-register')->with('status','Sucessfully Added New Tenant');
    }

    public function edit($id)
    {
        $tenants = Tenants::findorFail($id);
        return view('admin.tenant.edit')
            ->with('tenants',$tenants);
    }
    public function update(Request $request, $id)
    {
        $tenants = Tenants::findorFail($id);

        $tenants->name = $request->input('name');
        $tenants->email = $request->input('email');
        $tenants->phone = $request->input('phone');
        $tenants->date_of_birth = $request->input('date_of_birth');
        $tenants->id_number = $request->input('id_number');
        $tenants->salary = $request->input('salary');
        $tenants->assets = $request->input('assets');
        $tenants->status = $request->input('status');

        $tenants->update();
        return redirect('tenant-register')->with('status','Tenant Data Successfully Updated');
    }
    public function delete($id)
    {
        $tenants = Tenants::findorFail($id);
        $tenants->delete();

        return redirect('tenant-register')->with('status','Tenant Data Successfully Deleted');
    }

    public function export_pdf()
    {
      // Fetch all landlords from database
      $tenants = Tenants::get();
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('pdf.tenants', compact('tenants'));
      // If you want to store the generated pdf to the server then you can use the store function
      Storage::put('public/pdf/tenants.pdf', $pdf->output());
      // Finally, you can download the file using download function
      return $pdf->setPaper('a4', 'landsacpe')->download('tenants.pdf');
    }
}
