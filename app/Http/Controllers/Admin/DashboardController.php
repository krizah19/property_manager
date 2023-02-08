<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tenants;
use App\Models\Leases;
use App\Models\Landlords;
use App\Models\Properties;
use App\Models\Units;
use App\Models\Payments;

class DashboardController extends Controller
{
    public function index()
    {
        $tenants = Tenants::count();
        $leases = Leases::count();
        $landlords = Landlords::count();
        $properties = Properties::count();
        $units = Units::count();
        $payments = Payments::count();
        $users = User::where('usertype','agent')->count();
        $admins = User::where('usertype','admin')->count();
        return view('admin.dashboard', compact('tenants','leases','landlords','properties','units','payments','users','admins'));
    }
    
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id)
    {
        $users = User::findorFail($id);
        return view('admin.register-edit')->with('users',$users);
            }

    public function registerupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('/role-register')->with('status','Your data is Updated');
    }
    public function registerdelete($id)
    {
        $users = User::findorFail($id);
        $users->delete();

        return redirect('role-register')->with('status','Your Data is Deleted');
    }
}
