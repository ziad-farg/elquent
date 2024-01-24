<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Include the header partial -->
    @include('partical.header')
</head>

<body>
    <!-- Yield the content section -->
    @yield('content')

    <!-- Include the footer partial -->
    @include('partical.footer')
</body>

</html>
