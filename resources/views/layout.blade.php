<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

   @include('includes.head')
    <body>
        <header>
            @include('includes.header')
        </header>   
        <div id="main">
            @yield('content')
        </div>
        <footer>
            @include('includes.footer')
            @include('scripts')
        </footer>
        
    </body>
</html>