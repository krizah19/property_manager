<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payments;
use App\Models\Tenants;
use App\Models\User;
use App\Models\Bills;

use PDF;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $users = User::all();
        $tenants = Tenants::all();
        $payments = Payments::all();
        $payment_type = Bills::all();
        return view('admin.payment-register')
            ->with('users',$users)
            ->with('tenants',$tenants)
            ->with('payments',$payments)
            ->with('payment_type',$payment_type);
    }
    public function store(Request $request)
    {
        $payments = new Payments;
        
        $payments->pay_date = $request->input('pay_date');
        $payments->author = $request->input('author');
        $payments->invoice_number = $request->input('invoice_number');
        $payments->tenants = $request->input('tenants');
        $payments->pay_for = $request->input('pay_for');
        $payments->payment_amount = $request->input('payment_amount');
        
        $payments->save();
        return redirect('/payment-register')->with('status','Sucessfully Added New Payment');
    }

    public function edit($id)
    {
        $payments = Payments::find($id); 
        $tenants = Tenants::all();
        $users = User::all();
        $payment_type = Bills::all();
        return view('admin.payment.edit')
            ->with('payments',$payments)
            ->with('tenants',$tenants)
            ->with('users',$users)
            ->with('payment_type',$payment_type);
    }
    public function update(Request $request, $id)
    {
        $payments = Payments::findorFail($id);

        $payments->pay_date = $request->input('pay_date');
        $payments->author = $request->input('author');
        $payments->invoice_number = $request->input('invoice_number');
        $payments->tenants = $request->input('tenants');
        $payments->pay_for = $request->input('pay_for');
        $payments->payment_amount = $request->input('payment_amount');
        

        $payments->update();
        return redirect('payment-register')->with('status','Payment Data Successfully Updated');
    }

    public function delete($id)
    {
        $payments = Payments::findorFail($id);
        $payments->delete();

        return redirect('payment-register')->with('status','Payment Data Successfully Deleted');
    }
    public function export_pdf()
    {
      // Fetch all payments from database
      $payments = Payments::get();
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('pdf.payments', compact('payments'));
      // If you want to store the generated pdf to the server then you can use the store function
      Storage::put('public/pdf/payments.pdf', $pdf->output());
      // Finally, you can download the file using download function
      return $pdf->download('payments.pdf');
    }
}
