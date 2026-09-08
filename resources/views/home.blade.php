<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head', ['pageTitle' => 'Home', 'metaTitle' => 'Home del sito Laravel'])
<body>
   @include('partials.menu')

    <h1>Homepage</h1>
</body>
</html>