@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container">


        {{-- İncludes --}}

        @include('includes.alerts')

        @include('includes.errors')

        {{-- İncludes --}}

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <!-- end col -->
                    @foreach ($myFriendships as $myFriend)
                        <div class="col-xl-3 col-sm-6">
                            <div class="card border">
                                <div class="card-body">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="d-flex align-items-center">

                                                    @if ($myFriend->profile_photo_path)
                                                        <div class="avatar align-self-center me-3">
                                                            <img src=" {{ asset($myFriend->profile_photo_path) }}"
                                                                title="{{ $myFriend->user_name }}"
                                                                alt="{{ $myFriend->user_name }}"
                                                                class=" rounded-circle avatar">
                                                        </div>
                                                    @else
                                                        <div class="avatar align-self-center me-3">
                                                            <div
                                                                class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                <i class="bx bx-user-circle text-primary"></i>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="flex-1">
                                                        <h5 class="font-size-15 mb-1">{{ $myFriend->name }}
                                                            {{ $myFriend->surname }}</h5>
                                                        <a href="javascript: void(0);"
                                                            class="badge bg-soft-success text-success font-size-11">{{ $myFriend->user_name }}</a>

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

                                                            <a class="dropdown-item"
                                                                href="{{ asset($myFriend->user_name) }}">


                                                                <div class="row">


                                                                    <div class="col-12">
                                                                        <button type="submit"
                                                                            class="btn avatar-title rounded bg-soft-primary text-primary ">
                                                                            <i
                                                                                class="bx bxs-user-detail font-size-20 mx-1"></i>Detaylar

                                                                        </button>


                                                                    </div>
                                                                </div>

                                                            </a>

                                                            <div class="dropdown-item">
                                                                <form
                                                                    action="{{ route('delete.friendship', $myFriend->user_name) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="row">


                                                                        <div class="col-12">
                                                                            <input type="hidden"
                                                                                value="{{ $myFriend->user_name }}">
                                                                            <button type="submit"
                                                                                class="btn avatar-title rounded bg-soft-danger text-danger ">
                                                                                <i
                                                                                    class="bx bx-user-x font-size-20 mx-1"></i>Çıkar

                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
