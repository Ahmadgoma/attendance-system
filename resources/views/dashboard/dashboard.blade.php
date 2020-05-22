@include('dashboard.partials.header')

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>

    @include('dashboard.partials.navbar')
    {{--sidebar--}}
    @include('dashboard.partials.sidebar')

    <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        @component('dashboard.components.footer')
        @endcomponent

    </div>
</div>
@include('dashboard.partials.scripts')
@push('scripts')
    <script src="{{asset('assets/admin/')}}/js/page/index.js"></script>
@endpush

<!-- Page Specific JS File -->
</body>
</html>
