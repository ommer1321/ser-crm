@extends('layouts.app')

@section('css')
    {{-- <link href="{{ asset('assets/libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection
{{-- 
@role('admin')
admin
@endrole  

@role('teacher')
teacher
@endrole  


@role('student')
student
@endrole   --}}
@section('content')
    @include('includes.alerts')
    @include('includes.errors')

@endsection
@section('js')
    <script src="{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/lightbox.init.js') }}"></script>
@endsection
