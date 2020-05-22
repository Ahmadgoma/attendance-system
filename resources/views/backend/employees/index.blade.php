@push('style')
    <link rel="stylesheet"
          href="{{asset('public/assets/admin/')}}/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
          href="{{asset('public/assets/admin/')}}/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/admin/')}}/css/bootstrap-tagsinput.css">
@endpush
@extends('backend.dashboard' , ['title' => 'Employees'])
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Employees</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        <div class="card-header">
                            <h4>All employees</h4>
                            <a href="{{route('employees.create')}}"
                               class="btn btn-sm btn-success">Create a new employee</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            ID
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Pin code</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($employees as $employee)
                                        <tr>
                                            <td>{{$employee->id}}</td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->pin_code}}</td>
                                            <td>{{$employee->created_at}}</td>
                                            <td>
                                                <a href="{{route('employees.attendance', $employee->id )}}"
                                                   class="btn btn-sm btn-success">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('public/assets/admin')}}/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/assets/admin')}}/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/assets/admin')}}/js/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
@endpush
