<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head', ['pageTitle' => $pageTitle, 'metaTitle' => $metaTitle])

<body>
    @include('partials.menu')
    <div class="container mt-5">
        <h1>{{$pageTitle}}</h1>
        @yield('content')
    </div>

</body>

</html>