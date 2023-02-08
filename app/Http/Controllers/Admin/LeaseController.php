<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leases;
use App\Models\Tenants;
use App\Models\Properties;
use App\Models\Units;
use PDF;
use Illuminate\Support\Facades\Storage;

class LeaseController extends Controller
{
    public function index()
    {
        $tenants = Tenants::all();
        $properties = Properties::all();
        $units = Units::all();
        $leases = Leases::all();
        return view('admin.lease-register')
            ->with('tenants',$tenants)
            ->with('properties',$properties)
            ->with('units',$units)
            ->with('leases',$leases);
    }
    public function store(Request $request)
    {
        $leases = new Leases;
        
        $leases->tenants = $request->input('tenants');
        $leases->status = $request->input('status');
        $leases->properties = $request->input('properties');
        $leases->unit = $request->input('unit');
        $leases->type = $request->input('type');
        $leases->occupants = $request->input('occupants');
        $leases->start_date = $request->input('start_date');
        $leases->end_date = $request->input('end_date');
        $leases->recurring_charges = $request->input('recurring_charges');
        $leases->due_date = $request->input('due_date');
        $leases->rent = $request->input('rent');
        $leases->deposit = $request->input('deposit');
        $leases->deposit_date = $request->input('deposit_date');
        $leases->emergency_contact = $request->input('emergency_contact');
        $leases->co_signer = $request->input('co_signer');
        $leases->notes = $request->input('notes');
        $leases->agreement = $request->input('agreement');
        
        $leases->save();
        return redirect('/lease-register')->with('status','Sucessfully Added New Lease');
    }

    public function edit($id)
    {
        $leases = leases::findorFail($id);
        return view('admin.lease.edit')
            ->with('leases',$leases);
    }
    public function update(Request $request, $id)
    {
        $leases = leases::findorFail($id);

        $leases->tenants = $request->input('tenants');
        $leases->status = $request->input('status');
        $leases->properties = $request->input('properties');
        $leases->unit = $request->input('unit');
        $leases->type = $request->input('type');
        $leases->occupants = $request->input('occupants');
        $leases->start_date = $request->input('start_date');
        $leases->end_date = $request->input('end_date');
        $leases->recurring_charges = $request->input('recurring_charges');
        $leases->due_date = $request->input('due_date');
        $leases->rent = $request->input('rent');
        $leases->deposit = $request->input('deposit');
        $leases->deposit_date = $request->input('deposit_date');
        $leases->emergency_contact = $request->input('emergency_contact');
        $leases->co_signer = $request->input('co_signer');
        $leases->notes = $request->input('notes');
        $leases->agreement = $request->input('agreement');

        $leases->update();
        return redirect('lease-register')->with('status','Lease Data Successfully Updated');
    }
    public function delete($id)
    {
        $leases = Leases::findorFail($id);
        $leases->delete();

        return redirect('lease-register')->with('status','Lease Data Successfully Deleted');
    }
    public function export_pdf()
    {
      // Fetch all leases from database
      $leases = Leases::get();
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('pdf.leases', compact('leases'));
      // If you want to store the generated pdf to the server then you can use the store function
      Storage::put('public/pdf/leases.pdf', $pdf->output());
      // Finally, you can download the file using download function
      return $pdf->setPaper('A4', 'landsacpe')->download('leases.pdf');
    }
}
