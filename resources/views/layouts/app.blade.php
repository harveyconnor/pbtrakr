<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('partials.head')
<body>
<div id="app">
    @include('partials.nav')
    <div class="wrapper">
        <div class="container">
            @yield('content')
            <!-- Footer -->
            <footer class="footer text-right">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            {{ date("Y") }} &copy; PBTrakr.com
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div> <!-- container -->
    </div> <!-- End wrapper -->
</div>
@include('partials.footer')
</body>
</html>