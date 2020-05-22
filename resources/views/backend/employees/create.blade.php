@extends('backend.dashboard' , ['title' => 'Create Employee'])
@section('content')
    <div class="section-body">
        <h2 class="section-title tab-page">Employee</h2>
        <p class="section-lead">You can create all employee information.</p>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee <code>Information</code></h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('employees.store' )}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="2" name="user_type_id">

                                        <div class="form-group"><label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                        </div>
                                        <div class="form-group"><label>Email</label>
                                            <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                        </div>
                                        <div class="form-group"><label>Pin code</label>
                                            <input type="number" name="pin_code" class="form-control" value="{{old('pin_code')}}">
                                        </div>
                                        <button type="submit" class="btn btn-success save">save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection