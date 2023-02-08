<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\Properties;
use PDF;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    public function index()
    {
        $properties = Properties::all();
        $units = Units::all();
        return view('admin.unit-register')
            ->with('properties',$properties)
            ->with('units',$units);
    }
    public function store(Request $request)
    {
        $units = new Units;
        
        $units->property = $request->input('property');
        $units->unit_number = $request->input('unit_number');
        
        if ($request->hasfile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/units/', $filename);
            $units->photo = $filename;
        } else {
            return $request;
            $units->photo = '';
        }

        $units->status = $request->input('status');
        $units->size = $request->input('size');
        $units->rooms = $request->input('rooms');
        $units->bathroom = $request->input('bathroom');
        $units->features = $request->input('features');
        $units->market_rent = $request->input('market_rent');
        $units->rental_amount = $request->input('rental_amount');
        $units->deposit_amount = $request->input('deposit_amount');
        $units->description = $request->input('description');
        
        $units->save();
        return redirect('/unit-register')->with('status','Sucessfully Added New Unit');
    }

    public function edit($id)
    {
        $units = Units::find($id);
        $properties = Properties::all();
        return view('admin.unit.edit')
            ->with('units',$units)
            ->with('properties',$properties);
    }
    public function update(Request $request, $id)
    {
        $units = Units::findorFail($id);

        $units->property = $request->input('property');
        $units->unit_number = $request->input('unit_number');

        if ($request->hasfile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/units/', $filename);
            $units->photo = $filename;
        } else {
            return $request;
            $units->photo = '';
        }

        $units->status = $request->input('status');
        $units->size = $request->input('size');
        $units->rooms = $request->input('rooms');
        $units->bathroom = $request->input('bathroom');
        $units->features = $request->input('features');
        $units->market_rent = $request->input('market_rent');
        $units->rental_amount = $request->input('rental_amount');
        $units->deposit_amount = $request->input('deposit_amount');
        $units->description = $request->input('description');

        $units->update();
        return redirect('unit-register')->with('status','Unit Data Successfully Updated');
    }
    public function delete($id)
    {
        $units = Units::findorFail($id);
        $units->delete();

        return redirect('unit-register')->with('status','Unit Data Successfully Deleted');
    }
    public function export_pdf()
    {
      // Fetch all units from database
      $units = Units::get();
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('pdf.units', compact('units'));
      // If you want to store the generated pdf to the server then you can use the store function
      Storage::put('public/pdf/units.pdf', $pdf->output());
      // Finally, you can download the file using download function
      return $pdf->download('units.pdf');
    }
}
