<!DOCTYPE html>
<html lang="en">

<head>
    @include('Guest.layouts.header')
</head>

<body>
    @include('Guest.layouts.navbar')
    @yield('content')
    @include('Guest.layouts.footer')
</body>

</html>