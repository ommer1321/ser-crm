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

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        {{-- Engagement --}}
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Sporcu Grafiği : <span class="text-muted"> 2023-07-01</span> </h4>
                         </div><!-- end card header -->
                        <div class="card-body">
                            <div id="line_chart_gradient" data-colors='["--bs-danger"]' class="apex-charts" dir="ltr"></div>                              
                        </div>
                    </div><!--end card-->
                </div><!--end col-->

                
            </div><!-- end row -->

            
        </div> <!-- container-fluid -->
    </div>

    
    @endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

    <!-- linecharts init -->
    <script src="{{asset('assets/js/pages/apexcharts-line.init.js')}}"></script>
@endsection
