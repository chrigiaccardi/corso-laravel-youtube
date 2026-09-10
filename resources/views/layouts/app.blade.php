<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head', ['pageTitle' => $pageTitle, 'metaTitle' => $metaTitle])

<body>
    @include('partials.menu')
    <h1>{{$pageTitle}}</h1>
    <div class="">
        @yield('content')
    </div>

</body>

</html>