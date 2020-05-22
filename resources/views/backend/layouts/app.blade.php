@include('backend.partials.header')

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>

    @include('backend.partials.navbar')
    {{--sidebar--}}
    @include('backend.partials.sidebar')

    <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        @component('backend.components.footer')
        @endcomponent

    </div>
</div>
@include('backend.partials.scripts')
@push('scripts')
    <script src="{{asset('public/admin/')}}/assets/js/page/index.js"></script>
@endpush

<!-- Page Specific JS File -->
</body>
</html>
