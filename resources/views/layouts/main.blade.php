<!doctype html>
<html lang="en">
 @include('includes.head')
    <body>

      @include('includes.preload')
    
        <main>

    @include('includes.nav')

    @yield('content')



      </main>

@include('includes.footer')
<!-- JAVASCRIPT FILES -->
 @include('includes.footerJs')

</body>
</html>