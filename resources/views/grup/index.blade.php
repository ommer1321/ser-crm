@extends('layouts.app')

@section('title')
    Gruplar
@endsection

@section('css')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
                 {{-- İncludes --}}

        @include('includes.alerts')

        @include('includes.errors')

        {{-- İncludes --}}

            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <a href="{{ route('create.grup') }}" class="btn btn-light">
                            <i class="uil uil-plus me-1"></i>Grup Oluştur
                        </a>
                    </div>
                </div><!-- end col -->
                <div class="col-md-9">
                    <div class="d-flex flex-wrap align-items-start justify-content-md-end gap-2 mb-3">
                        <div class="search-box ">
                            <div class="position-relative">
                                <input type="text" class="form-control bg-light border-light rounded"
                                    placeholder="Search...">
                                <i class="uil uil-search search-icon"></i>
                            </div>
                        </div><!-- end serch box -->

                        <div>
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link" href="projects-list.html" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="" data-bs-original-title="List"
                                        aria-label="List"><i class="uil uil-list-ul"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="projects-grid.html" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="" data-bs-original-title="Grid"
                                        aria-label="Grid"><i class="uil uil-apps"></i></a>
                                </li>
                            </ul><!-- end ul -->
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-link text-dark dropdown-toggle shadow-none" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="uil uil-ellipsis-h"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('create.grup') }}">Grup Oluştur</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div><!-- end dropdown -->
                    </div>

                </div><!-- end col -->
            </div>

            <div class="mt-2">
                <hr>
            </div>

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane active" id="grid-all" role="tabpanel">
                    <div class="row">

                        @foreach ($grups as $grup)
                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body pb-3">
                                        <div class="d-flex align-items-start mb-3">


                                            <div class="flex-grow-1">
                                                <div class="avatar">

                                                    @if ($grup->logo_path == null)
                                                        <span
                                                            class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                            {{ $grup->first_letter }}
                                                        </span>
                                                    @else
                                                        <img src="{{ asset($grup->logo_path) }} " alt="" class=" rounded-circle avatar">
                                                    @endif

                                                </div>
                                            </div>



                                            <div class="flex-shrink-0">
                                                <div class="dropdown">
                                                    <a class="text-body dropdown-toggle font-size-16" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal icon-xs">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('settings.grup',$grup->grup_id )}}">Ayarlar</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Göster</a></li>

                                                    </ul>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="pt-2">
                                            <h5 class="font-size-15 mb-1 text-truncate"><a href="projects-overview.html"
                                                    class="text-dark text-truncate">{{ $grup->name }}</a></h5>
                                            <p class="text-muted mb-4 text-truncate">{{ $grup->details }}
                                            </p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <span class="badge badge-soft-warning font-size-12">{{ $grup->branch }}</span>
                                            @if ($grup->members_count > 0)
                                            <p class="text-muted font-size-13 mb-1">Üyeler : {{$grup->members_count}} Kişi</p>

                                            @else
                                            <p class="text-muted font-size-13 mb-1"> Üye Bulunmamakta</p>
 
                                            @endif
                                            {{-- ilişkili üyeler çekilecek ve ilişkili üyelerin countu alınacak --}}
                                        </div>

                                        {{-- 
                                    <div class=" m-1 mb-2" style="height: 6px;">
                                
                                        
                                        <div class="progress-bar" role="progressbar" style="width: 85%"
                                            aria-valuenow="52" aria-valuemin="0" aria-valuemax="52">
                                        </div>
                                    </div> --}}

                                        @php
                                            //   hata:basic
                                            $profile_foto_gecici_variable = '';
                                        @endphp

                                        @if ($grup->members_count > 0)
                                            <div class="pt-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    {{-- <span class="badge badge-soft-danger font-size-12"><i
                                                    class="mdi mdi-clock-outline font-size-14 me-1 align-middle"></i> 3
                                                days left</span> --}}
                                                    <div class="avatar-group align-items-center">
                                                        @foreach ($grup->members as $member)
                                                            @if ($profile_foto_gecici_variable == null)
                                                                <div class="avatar-group-item">
                                                                    <a href="javascript: void(0);" class="d-block"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="{{ $member->user->name }}">
                                                                        <div class="avatar-sm">
                                                                            <span
                                                                                class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                                                {{ $member->user->first_letter }}
                                                                            </span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="avatar-group-item">
                                                                    <a href="javascript: void(0);{{ $member->id }}"
                                                                        class="d-block" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title=""
                                                                        data-bs-original-title="Megan Seaton">
                                                                        <img src="{{ asset('assets/images/users/avatar-4.jpg') }}"
                                                                            alt=""
                                                                            class="rounded-circle avatar-sm">
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach



                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                         
                                        <div class="badge bg-danger mt-4 mb-2" >
                                        Bu Grupta Öğrenci Henüz Yok
                                        </div>
                                        
                                        @endif

                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        @endforeach


                        {{--  Create Grup --}}

                        <div class="col-xl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body pb-3">
                                    <div class="d-flex align-items-center justify-content-center m-3">

                                        <div class="avatar-group ">

                                            <div class="avatar-group-item">
                                                <a href="{{ route('create.grup') }}"
                                                    class=" d-flex align-items-center justify-content-center"
                                                    title="">
                                                    <div class="avatar-md ">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary bg-opacity-50 text-white ">
                                                            <span class="fs-1">+</span>
                                                        </span>
                                                    </div>
                                                </a>



                                                <p class="text-muted mt-2 text-truncate fs-5 d-block">Yeni Grup Oluştur
                                                </p>


                                            </div>
                                        </div>


                                    </div>




                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        {{--  Create Grup --}}

                    </div><!-- end row -->

                    <div class="row g-0">
                        <div class="col-sm-6">
                            <div>
                                <p class="mb-sm-0">Showing 1 to 8 of 24 entries</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-sm-end">
                                <ul class="pagination pagination-rounded mb-sm-0">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                    </li>
                                </ul><!-- end ul -->
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>
                <!-- end tab pane -->


                <!-- end tab pane -->
            </div>
            <!-- end tab content -->

        </div>
    </div>
@endsection

@section('js')
@endsection
