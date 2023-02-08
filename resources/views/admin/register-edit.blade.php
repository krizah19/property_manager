@extends('layouts.master')


@section('title')
    Edit System Users | Green City RMS
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Roles For System User</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                    <form action="/role-register-update/{{ $users->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Name</label>
                            <Input type="text" name="name" value="{{ $users->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Assign Role</label>
                            <select name="usertype" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="agent">Agent</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/role-register" class="btn btn-danger">Cancel</a>
                    </form>
</div>
</div>
                
                </div>
            </div>
        </div>
</div>
@endsection

@section('scripts')

@endsection
