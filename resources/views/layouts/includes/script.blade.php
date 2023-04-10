  <!-- JAVASCRIPT -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
  <script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/metismenujs/metismenujs.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('/assets/js/app.js') }}"></script>

  @yield("js")
  
  @yield("script")
  
  @livewireScripts
