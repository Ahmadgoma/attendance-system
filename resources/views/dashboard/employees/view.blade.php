@extends('dashboard.dashboard' , ['title' => 'View Employee Attendance'])
@section('content')
    <div class="section-body">
        <h2 class="section-title tab-page">Employee Attendance</h2>
        <p class="section-lead">The tab component for view of content employee attendance.</p>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee Attendance <code>Information</code></h4>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="basic" role="tabpanel"
                                 aria-labelledby="home-tab3">
                                <div class="form-group"><label>Total Work Monthly</label>
                                    <div class="row">
                                    @forelse($result['sumMonthlyWork'] as $monthlyWork)
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h4>
                                                            {{ date("F", mktime(0, 0, 0, $monthlyWork->month, 1)) }}
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <p> {{$monthlyWork->sumHours}}<code> </code></p>
                                                    </div>
                                                </div>
                                            </div>
                                    @empty
                                    @endforelse
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="basic" role="tabpanel"
                                 aria-labelledby="home-tab3">
                                <div class="form-group"><label>Daily Work</label>
                                    <div class="row">
                                        @forelse($result['dailyWork'] as $dailyWork)
                                            <div class="col-2 col-md-2 col-lg-2">
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h4>
                                                            {{ date("F", mktime(0, 0, 0, $dailyWork->month, 1)) }}
                                                            -
                                                             {{ Carbon\Carbon::parse($dailyWork->date)->format('l')}}
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <p> Check In:{{ $dailyWork->check_in_time }}</p>
                                                        <code> Check out: {{ $dailyWork->check_out_time }}</code>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
