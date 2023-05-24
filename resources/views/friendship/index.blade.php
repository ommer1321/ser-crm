@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">




        {{-- İncludes --}}

        @include('includes.alerts')

        @include('includes.errors')

        {{-- İncludes --}}


        <div class="card">
            <div class="card-header">

                <div class="row mb-3">
                 
                     <div class="col-lg-4 col-sm-6">
                        <form action="" method="get">
                        <div class="search-box mb-2 me-2">
                            <div class="position-relative">
                                <input type="text" name="search" class="form-control bg-light border-light rounded"
                                    placeholder="Search...">
                                <i class="bx bx-search icon-sm search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-6">
                        <div class="mt-4 mt-sm-0 d-flex align-items-center justify-content-sm-end">
                            <div class="mb-2 me-2">

                                <button class="btn btn-secondary" type="submit" >
                                    <i class="bx bx-search  "></i>
                                </button>
                            </form>


                            </div>

                            <div class="dropdown mb-0">
                                <a class="btn btn-link text-muted dropdown-toggle p-1 mt-n2" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true">
                                    <i class="mdi mdi-dots-vertical font-size-20"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Arkadaşlarım</a>
                                    <a class="dropdown-item" href="#">İstek Kutum</a>

                                </div>
                            </div>


                        </div>
                    </div>
           
                </div>

                    <div class="row">
                        <div class="col-10 col-sm-6">
                            <h5 class="card-title mb-0">Arkadaş Ekle</h5>

                        </div>

                  
                    </div>

            </div>

            <div class="card-body pt-1">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td><img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar"
                                            alt=""></td>

                                    <td>
                                        <div>
                                            <a href="javascript: void(0);"
                                                class="badge bg-soft-primary text-primary font-size-14">{{ $user->user_name }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                class="text-dark">{{ $user->name }} {{ $user->surname }}</a></h5>
                                    </td>

                                    <td>


                                        <form action="{{ route('add.friendship') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $user->user_id }}" name="user">
                                        <button  type="submit" class="btn  badge bg-soft-primary text-primary font-size-15">
                                            <i class=" uil-user-plus font-size-20  mx-1 "></i> 
                                            
                                            
                                        </button>
                                    </form>
                                   
                                        {{-- <div class="  badge bg-soft-primary text-primary font-size-15">
                                            <i class=" uil-user-plus font-size-20  mx-1 "></i>
                                            <input class="form-check-input" type="checkbox" name="user[]"
                                                value="{{ $user->user_id }}" id="formCheck1">

                                        </div> --}}


                                    </td>
                                </tr>


                                {{--                            
                <tr>
                    <td>
                        <div class="avatar-sm">
                            <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                T
                            </span>
                        </div>
                    </td>
                    <td>
                        <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Tony
                                Brafford</a></h5>
                    </td>
                    <td>
                        <div>
                            <a href="javascript: void(0);"
                                class="badge bg-soft-primary text-primary font-size-11">Backend</a>
                        </div>
                    </td>
                    <td>
                        <div class="  badge bg-soft-primary text-primary font-size-15">
                            <i class=" uil-user-plus font-size-20  mx-1 "></i>
                            <input class="form-check-input" type="checkbox" id="formCheck1">

                        </div>

                    </td>
                </tr> --}}
                            @endforeach
                </div>
            </div>
            </tbody>

       
            </table>
        </div>
    </div>
    </div>
    {{--  --}}






    </div>
@endsection
@section('js')
@endsection
