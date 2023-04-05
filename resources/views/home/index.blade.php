@extends('layouts.app')

@section('css')
    <link href="{{asset('assets/libs/fullcalendar/main.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">


         
        </div>
    </div>
@endsection
@section('js')
    <!-- plugin js -->
    <script src="{{ asset('assets/libs/fullcalendar/main.min.js')}}"></script>

    <!-- Calendar init -->
    <script src="{{ asset('assets/js/pages/calendar.init.js')}}"></script>
@endsection
