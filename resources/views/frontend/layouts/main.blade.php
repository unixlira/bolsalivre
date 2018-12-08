<!doctype html>
<html lang="{{ app()->getLocale() }}">

@php 
    $contact = App\Contact::find(1);
    $social = App\Social::find(1);
@endphp
  
<head>
    @section('head')
        @include('frontend.includes.head')
    @show

        <title>{{ config('app.name', ' $titulo') }} @yield('title')</title>
<head>


<body id="@yield('id_body')" class="@yield('class_body')">
    @section('header')
        @include('frontend.includes.header')
    @show

    @yield('content')
    
    @include('frontend.includes.footer')
    @include('frontend.includes.scripts_footer')
</body>
</html>
    