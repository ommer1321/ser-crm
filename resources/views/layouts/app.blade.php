<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @include('layouts.includes.style')


</head>

<body data-layout="horizontal" data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        @auth
            
        @include('layouts.includes.header') 
        @endauth
        <div class="hori-overlay"></div>



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          @include('layouts.includes.footer') 
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
  {{-- 
    hata:basic dosyalama isim kodlarını bozuyor ekleyınce
    @include('layouts.includes.right-bar') --}}
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>





        @include('layouts.includes.script')

    </body>

    </html>
