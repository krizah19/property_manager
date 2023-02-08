<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Landlords;
use PDF;
use Illuminate\Support\Facades\Storage;

class LandlordController extends Controller
{
    public function index()
    {
        $landlords = Landlords::all();
        return view('admin.landlord-register')
            ->with('landlords',$landlords);
    }
    public function store(Request $request)
    {
        $landlords = new Landlords;
        
        $landlords->name = $request->input('name');
        $landlords->company_name = $request->input('company_name');
        $landlords->email = $request->input('email');
        $landlords->phone = $request->input('phone');
        $landlords->date_of_birth = $request->input('date_of_birth');
        $landlords->county = $request->input('county');
        $landlords->address = $request->input('address');
        $landlords->description = $request->input('description');
        
        $landlords->save();
        return redirect('/landlord-register')->with('status','Sucessfully Added New Landlord');
    }

    public function edit($id)
    {
        $landlords = Landlords::findorFail($id);
        return view('admin.landlord.edit')
            ->with('landlords',$landlords);
    }
    public function update(Request $request, $id)
    {
        $landlords = Landlords::findorFail($id);

        $landlords->name = $request->input('name');
        $landlords->company_name = $request->input('company_name');
        $landlords->email = $request->input('email');
        $landlords->phone = $request->input('phone');
        $landlords->date_of_birth = $request->input('date_of_birth');
        $landlords->county = $request->input('county');
        $landlords->address = $request->input('address');
        $landlords->description = $request->input('description');

        $landlords->update();
        return redirect('landlord-register')->with('status','Landlord Data Successfully Updated');
    }
    public function delete($id)
    {
        $landlords = Landlords::findorFail($id);
        $landlords->delete();

        return redirect('landlord-register')->with('status','Landlord Data Successfully Deleted');
    }
    public function export_pdf()
    {
      // Fetch all landlords from database
      $landlords = Landlords::get();
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('pdf.landlords', compact('landlords'));
      // If you want to store the generated pdf to the server then you can use the store function
      Storage::put('public/pdf/landlords.pdf', $pdf->output());
      // Finally, you can download the file using download function
      return $pdf->download('landlords.pdf');
    }
}
