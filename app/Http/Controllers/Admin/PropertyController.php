<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\Landlords;
use App\Models\Houses;
use PDF;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $landlords = Landlords::all();
        $properties = Properties::all();
        $house_type = Houses::all();
        return view('admin.property-register')
            ->with('landlords',$landlords)
            ->with('properties',$properties)
            ->with('house_type',$house_type);
    }
    public function store(Request $request)
    {
        $properties = new Properties();
        
        $properties->property_name = $request->input('property_name');
        
        if ($request->hasfile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/properties/', $filename);
            $properties->photo = $filename;
        } else {
            return $request;
            $properties->photo = '';
        }
        
        $properties->type = $request->input('type');
        $properties->number_of_units = $request->input('number_of_units');
        $properties->owner = $request->input('owner');
        $properties->operating_account = $request->input('operating_account');
        $properties->lease_term = $request->input('lease_term');
        $properties->country = $request->input('country');
        $properties->city = $request->input('city');
        $properties->address = $request->input('address');

        $properties->save();
        return redirect('/property-register')->with('status','Property Data Successfully Added');
    }

    public function edit($id)
    {
        $properties = Properties::find($id);
        $landlords = Landlords::all();
        $house_type = Houses::all();
        return view('admin.property.edit')
            ->with('properties',$properties)
            ->with('landlords',$landlords)
            ->with('house_type',$house_type);
    }
    public function update(Request $request, $id)
    {
        $properties = Properties::findorFail($id);

        $properties->property_name = $request->input('property_name');
        
        if ($request->hasfile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/properties/', $filename);
            $properties->photo = $filename;
        } else {
            return $request;
            $properties->photo = '';
        }

        $properties->type = $request->input('type');
        $properties->number_of_units = $request->input('number_of_units');
        $properties->owner = $request->input('owner');
        $properties->operating_account = $request->input('operating_account');
        $properties->lease_term = $request->input('lease_term');
        $properties->country = $request->input('country');
        $properties->city = $request->input('city');
        $properties->address = $request->input('address');

        $properties->update();
        return redirect('property-register')->with('status','Property Data Successfully Updated');
    }
    public function delete($id)
    {
        $properties = Properties::findorFail($id);
        $properties->delete();

        return redirect('property-register')->with('status','Property Data Successfully Deleted');
    }

    public function export_pdf()
    {
      // Fetch all landlords from database
      $properties = Properties::get();
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('pdf.properties', compact('properties'));
      // If you want to store the generated pdf to the server then you can use the store function
      Storage::put('public/pdf/properties.pdf', $pdf->output());
      // Finally, you can download the file using download function
      return $pdf->setPaper('a4', 'landsacpe')->download('properties.pdf');
    }
}
