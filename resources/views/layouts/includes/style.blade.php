   <!-- App favicon -->

  
   <link rel="shortcut icon" href="{{(asset('/assets/images/favicon.ico'))}}">

   <!-- Bootstrap Css -->
   <link href="{{(asset('/assets/css/bootstrap.min.css'))}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
   
   <link href="{{(asset('/assets/css/icons.min.css'))}}" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{(asset('/assets/css/app.min.css'))}}" id="app-style" rel="stylesheet" type="text/css" /> <!-- Icons Css -->
  
   @yield('css')
   
   @yield('style')
   
   <!-- Scripts -->

   {{-- hata:kritik @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

   <!-- Styles -->
   @livewireStyles
  