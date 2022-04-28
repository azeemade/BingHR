<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <div class="grid grid-cols-12 gap-0">
        <div>
            @include('includes.sidemenu')
        </div>
        <div class="col-span-2">
            @include('includes.menulists')
        </div>
        <div class="col-span-9 bg-sky-50">
            @include('includes.navbar')
            @yield('content')
            @include('includes.footer')
        </div>
    </div>
</body>
</html>