<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="Lef For Life">
        <meta content="" name="LEF FOR LIFE, a non-profit organization, is dedicated to providing love, education, and food to underprivileged individuals.">
        <link rel="icon" type="image/x-icon" href="https://lefforlife.org/images/logo/1708353131.png">
        @stack('css')
       @include('website.include.style')
       
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->
        <div class="">
        @include('website.include.navbar')
        </div>

       @yield('body')


        @include('website.include.footer')
        

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary rounded-circle border-3 back-to-top"><i class="fa fa-arrow-up"></i></a>

        
        @include('website.include.script')
        @stack('js')
    </body>

</html>