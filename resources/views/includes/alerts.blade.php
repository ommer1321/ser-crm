
{{-- Alert --}}

@if (session('success'))
 
        <div class="card-body">
       
                <div class="alert alert-success alert-top-border alert-dismissible fade show" role="alert">
                    <i class="uil uil-check font-size-16 text-success me-2"></i>
                  {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             
    
        </div>
@endif





@if (session('failed'))
 
        <div class="card-body">
       
            <div class="alert alert-danger alert-top-border alert-dismissible fade show" role="alert">
                <i class="uil uil-exclamation-octagon font-size-16 text-danger me-2"></i>
                    {{session('failed')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             
    
        </div>
@endif

{{-- Alert --}}
