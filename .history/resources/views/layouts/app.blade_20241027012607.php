@include('layouts.header')
    <div class="d-flex flex-column min-vh-100">
        @include('layouts.sidebar')
            <div class="content-wrapper flex-grow-1">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>