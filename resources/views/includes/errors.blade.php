
{{-- Errors --}}

@if ($errors->any())
   
<div class="alert alert-danger alert-top-border alert-dismissible fade show" role="alert">
    <i class="uil uil-exclamation-octagon font-size-16 text-danger me-2"></i>
    <hr>
    @foreach ($errors->all() as $error )
    <small class="d-block">{{$error}}</small>  
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>                

  
@endif  

{{-- Errors --}}
