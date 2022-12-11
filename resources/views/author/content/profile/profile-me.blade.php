@extends('layout.app')
@section('title', 'Tambah Pasien')
@section('title-page')
    <div class="page-title">
        <h4>Profile</h4>
        <h6>User Profile</h6>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <div class="row align-items-center">
                        <div class="avatar avatar-xl col-auto">
                            <img src="/dist/assets/images/1.jpg" alt="Face 1">
                        </div>
                        <div class="col-auto"><a href="#" class="btn btn-primary">
                                Change avatar
                            </a></div>
                        <div class="col-auto"><a href="#" class="btn btn-outline-danger">
                                Delete avatar
                            </a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" value="{{ $data_user->name }}" class="form-control" placeholder="name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Castilo">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{ $data_user->email }}" class="form-control" name="email"
                                placeholder="email">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="+62">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="username">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" class="">
                            <span class="fas toggle-password fa-eye-slash"></span>

                        </div>
                    </div>
                    <div class="col-12">
                        <a href="javascript:void(0);" class="btn btn-primary me-2">Submit</a>
                        <a href="javascript:void(0);" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
