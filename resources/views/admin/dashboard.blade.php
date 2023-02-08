@extends('layouts.master')


@section('title')
    Dashboard | RMS
@endsection

@section('content') 

<div class="container-fluid px-4">          
        <h4 class="card-title" style="padding-top: 25px">Dashboard</h4>
          
          <div class="row">

            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  Total Tenants
                  <h2>{{ $tenants }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ url('/tenant-register') }}">View List</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  Total Leases
                  <h2>{{ $leases }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ url('/lease-register') }}">View List</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  Total Landlords
                  <h2>{{ $landlords }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ url('/landlord-register') }}">View List</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  Total Properties
                  <h2>{{ $properties }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ url('/property-register') }}">View List</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  Total Units
                  <h2>{{ $units }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ url('/unit-register') }}">View List</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  Total Payments
                  <h2>{{ $payments }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ url('/payment-register') }}">View List</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  Total Users
                  <h2>{{ $users }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ url('/role-register') }}">View List</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  Total Admin
                  <h2>{{ $admins }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ url('/role-register') }}">View List</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>
      
          </div> 
      </div>

@endsection


@section('scripts')

@endsection