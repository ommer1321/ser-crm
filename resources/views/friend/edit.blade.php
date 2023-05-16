@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card border">
                            <div class="card-body">
                                <div class="">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar align-self-center me-3">
                                                    <div class="avatar-title rounded bg-soft-info text-info font-size-24">
                                                        <i class="bx bx-user-circle"></i>
                                                    </div>
                                                </div>

                                                <div class="flex-1">
                                                    <h5 class="font-size-15 mb-1">Preston Mayer</h5>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-success text-success font-size-11">Backend</a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">

                                            <div class="d-flex flex-row-reverse">
                                                <div class="dropdown float-end">
                                                    <a class="text-muted dropdown-toggle font-size-16" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded font-size-20"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">

                                                        <a class="dropdown-item" href="#">


                                                            <div class="row">
                                                                <div class="col-5">

                                                                    <div
                                                                        class="avatar-title rounded bg-soft-primary text-primary ">
                                                                        <i class="bx bxs-user-detail font-size-20"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class=" text-primary ">
                                                                        Detaylar
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <div class="row">
                                                                <div class="col-5">

                                                                    <div
                                                                        class="avatar-title rounded bg-soft-danger text-danger ">
                                                                        <i class="bx bx-user-x font-size-20"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class=" text-danger ">
                                                                        Çıkar
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->



                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card border">
                            <div class="card-body">
                                <div class="">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar align-self-center me-3">
                                                    <img src="{{asset('assets/images/users/avatar-9.jpg')}}" alt=""
                                                        class="avatar rounded">
                                                </div>

                                                <div class="flex-1">
                                                    <h5 class="font-size-15 mb-1">Preston Mayer</h5>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-primary text-primary font-size-11">Backend</a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">

                                            <div class="d-flex flex-row-reverse">
                                                <div class="dropdown float-end">
                                                    <a class="text-muted dropdown-toggle font-size-16" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded font-size-20"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">

                                                        <a class="dropdown-item" href="#">


                                                            <div class="row">
                                                                <div class="col-5">

                                                                    <div
                                                                        class="avatar-title rounded bg-soft-success text-success ">
                                                                        <i class="bx bxs-user-detail font-size-20"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class=" text-success ">
                                                                        Detaylar
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <div class="row">
                                                                <div class="col-5">

                                                                    <div
                                                                        class="avatar-title rounded bg-soft-danger text-danger ">
                                                                        <i class="bx bx-user-x font-size-20"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class=" text-danger ">
                                                                        Çıkar
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->



                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card border">
                            <div class="card-body">
                                <div class="">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar align-self-center me-3">
                                                    <img src=" {{asset('assets/images/users/avatar-9.jpg')}}" alt=""
                                                        class=" rounded-circle avatar">
                                                </div>

                                                <div class="flex-1">
                                                    <h5 class="font-size-15 mb-1">Preston Mayer</h5>
                                                    <a href="" class="font-size-13 text-muted"><u>Con View</u></a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">

                                            <div class="d-flex flex-row-reverse">
                                                <div class="dropdown float-end">
                                                    <a class="text-muted dropdown-toggle font-size-16" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded font-size-20"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">

                                                        <a class="dropdown-item" href="#">


                                                            <div class="row">
                                                                <div class="col-5">

                                                                    <div
                                                                        class="avatar-title rounded bg-soft-success text-success ">
                                                                        <i class="bx bxs-user-detail font-size-20"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class=" text-success ">
                                                                        Detaylar
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <div class="row">
                                                                <div class="col-5">

                                                                    <div
                                                                        class="avatar-title rounded bg-soft-danger text-danger ">
                                                                        <i class="bx bx-user-x font-size-20"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class=" text-danger ">
                                                                        Çıkar
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->


                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card border">
                            <div class="card-body">
                                <div class="">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar align-self-center me-3">
                                                    <img src="{{asset('assets/images/users/avatar-9.jpg')}}" alt=""
                                                        class="avatar rounded">
                                                </div>

                                                <div class="flex-1">
                                                    <h5 class="font-size-15 mb-1">Preston Mayer</h5>
                                                    <a href="" class="font-size-13 text-muted"><u>Con View</u></a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">

                                            <div class="d-flex flex-row-reverse">
                                                <div class="dropdown float-end">
                                                    <a class="text-muted dropdown-toggle font-size-16" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded font-size-20"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">

                                                        <a class="dropdown-item" href="#">


                                                            <div class="row">
                                                                <div class="col-5">

                                                                    <div
                                                                        class="avatar-title rounded bg-soft-success text-success ">
                                                                        <i class="bx bxs-user-detail font-size-20"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class=" text-success ">
                                                                        Detaylar
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <div class="row">
                                                                <div class="col-5">

                                                                    <div
                                                                        class="avatar-title rounded bg-soft-danger text-danger ">
                                                                        <i class="bx bx-user-x font-size-20"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class=" text-danger ">
                                                                        Çıkar
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->






                </div>
            </div>


        </div>































    </div>
@endsection
@section('js')
    <!-- plugin js -->
    <script src="{{ asset('assets/libs/fullcalendar/main.min.js') }}"></script>

    <!-- Calendar init -->
    <script src="{{ asset('assets/js/pages/calendar.init.js') }}"></script>
@endsection
