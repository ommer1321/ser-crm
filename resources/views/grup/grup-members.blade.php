@extends('layouts.app')

@section('title')
    Gruplar
@endsection

@section('css')
    <!-- Plugins css -->

    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- plugin css -->
@endsection

@section('content')
    <div class="row">
        <div class="col-xxl-3 col-lg-4">
            <div class="card">
                <div class="card-body p-0">
                    <div class="user-profile-img">
                        <img src="{{ asset('assets/images/pattern-bg.jpg') }}"
                            class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                        <div class="overlay-content rounded-top">
                            <div>
                                <div class="user-nav p-3">
                                    <div class="d-flex justify-content-end">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal font-size-20 text-white"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Üye Sınırını Arttır</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Something else
                                                        here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end user-profile-img -->

                    <div class="mt-n5 position-relative">




                        <div class="text-center d-flex justify-content-center">

                            @if ($grup->logo_path)
                                <img src="{{ asset($grup->logo_path) }}" alt=""
                                    class="avatar-xl rounded-circle img-thumbnail">
                            @else
                                <div class="avatar-xl">
                                    <span class="avatar-title rounded-circle avatar-xl  fs-1 rounded-circle img-thumbnail">
                                        {{ $grup->first_letter }}
                                    </span>
                                </div>
                            @endif




                        </div>


                        <div class="mt-3 text-center ">
                            <h5 class="mb-1">{{ $grup->name }}</h5>
                            <div>
                                <a href="#" class="badge badge-soft-success m-1">{{ $grup->branch }}</a>
                            </div>


                        </div>
                    </div>

                    <div class="p-3 mt-3 border-bottom">
                        <div class="row text-center">
                            <div class="col-6 border-end">
                                <div class="p-1">
                                    <h5 class="mb-1 text-danger">Max {{ $grup->limit }}</h5>
                                    <p class="text-muted mb-0">Üye Sınırı</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-1">
                                    <h5 class="mb-1">{{ $grup->members_count }}</h5>
                                    <p class="text-muted mb-0">Üyeler</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mt-2">
                        <p class="text-muted mb-1">Eğitmen Adı : </p>
                        <h5 class="  font-size-16">{{ $grup->teacher->name }} {{ $grup->teacher->surname }}</h5>

                        <div class="mt-4">
                            <p class="text-muted mb-1">Kullanıcı Adı</p>
                            <h5 class="font-size-14 text-truncate">{{ $grup->teacher->user_name }}</h5>
                        </div>

                        <div class="mt-4">
                            <p class="text-muted mb-1">Telefon :</p>
                            <h5 class="font-size-14 text-truncate">{{ $grup->teacher->phone }}</h5>
                        </div>

                        <div class="mt-4">
                            <p class="text-muted mb-1">E-mail :</p>
                            <h5 class="font-size-14 text-truncate">{{ $grup->teacher->email }}</h5>
                        </div>

                        <div class="mt-4">
                            <p class="text-muted mb-1">Grup Açıklaması :</p>
                            <h5 class="font-size-14 ">{{ $grup->details }}</h5>
                        </div>
                    </div>

                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- end col -->

        <div class="col-xxl-9 col-lg-8">

            {{-- İncludes --}}

            @include('includes.alerts')

            @include('includes.errors')

            {{-- İncludes --}}



            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                Üye Ekle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($myFriends)
                            @else
                            <div class="alert alert-primary alert-outline alert-dismissible fade show" role="alert">
                                <i class="uil-minus-circle
                                text-primary font-size-16 me-2"></i>
                                Ekleyecek Arkadaşınız Kalmadı
                            </div>
                            @endif
                            @foreach ($myFriends as $myFriend)
                                <ul class="list-unstyled chat-list">

                                    <li class="">
                                        <a href="#">
                                            <div class="d-flex align-items-start">

                                                <div class="avatar align-self-center me-3">




                                                    @if ($myFriend->profile_photo_path)
                                                        <div
                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                            <img src="{{ asset($myFriend->profile_photo_path) }}"
                                                                class="rounded-circle avatar-sm" alt="">


                                                        </div>
                                                    @else
                                                        <div class="avatar">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-primary font-size-16">
                                                                <div
                                                                    class="rounded-circle avatar-sm    avatar-title  bg-soft-primary  font-size-26">
                                                                    <i class="bx bx-user-circle text-primary"></i>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>

                                              
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-16 mb-1">
                                                        {{ $myFriend->user_name }}
                                                    </h5>
                                                    <small class=" text-truncate" style="opacity: 0.8">
                                                        {{ $myFriend->name }} {{ $myFriend->surname }}</small>
                                                </div>


                                                <div class="unread-message">


                                                    <form
                                                    action="{{ route('add.members.grup') }}"
                                                    method="post">
                                                    @csrf

                                                    <input name="grup"
                                                        value="{{ $grup->grup_id }}"
                                                        type="hidden">
                                                    <input name="user"
                                                        value="{{ $myFriend->user_id }}"
                                                        type="hidden">




                                                    <button type="submit" class="btn btn-success  btn-sm chat-send"><b><span
                                                                class="d-none d-sm-inline-block me-2">Ekle</span>
                                                        </b><i
                                                            class=" bx bx-user-plus
                                                            float-end font-size-18"></i></button>
                                                        </form>

                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                        <!-- end modalbody -->
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button> --}}
                            <button type="button" class="btn btn-primary">Tamam</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->











            <div class="card">
                <div class="card-body">






                    <div class="card border shadow-none">
                        <div class="card-header d-flex align-items-center">

                            <div class="flex-grow-1">
                                <div class="card-title d-inline"><b>Grup Üyeleri</b></div>

                                <!-- Scrollable modal -->
                                <button style="float: right" type="button"
                                    class="btn btn-primary btn-rounded btn-sm font-size-16 " data-bs-toggle="modal"
                                    data-bs-target="#exampleModalScrollable">Kullanıcı Ekle <i
                                        class="uil-user-plus text-white font-size-16"></i></button>


                            </div>

                        </div>












                        <div class="card-body">

                            <div class="row">
                                <div class="tab-pane show active" id="request-box">
                                    <div class="chat-message-list" data-simplebar="init">
                                        <div class="simplebar-wrapper" style="margin: 0px;">
                                            <div class="simplebar-height-auto-observer-wrapper">
                                                <div class="simplebar-height-auto-observer"></div>
                                            </div>
                                            <div class="simplebar-mask">
                                                <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                                                    <div class="simplebar-content-wrapper"
                                                        style="height: 100%; overflow: hidden scroll;">
                                                        <div class="simplebar-content" style="padding: 0px;">
                                                            <div class="">
                                                                <div>


                                                                    <ul class="list-unstyled chat-list">

                                                            
                                                                        @foreach ($users as $user)
                                                                            <li class="">
                                                                                <a href="#">
                                                                                    <div class="d-flex align-items-start">

                                                                                        <div
                                                                                            class="avatar align-self-center me-3">




                                                                                            @if ($user->user->profile_photo_path)
                                                                                                <div
                                                                                                    class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                                                    <img src="{{ asset($user->user->profile_photo_path) }}"
                                                                                                        class="rounded-circle avatar-sm"
                                                                                                        alt="">


                                                                                                </div>
                                                                                            @else
                                                                                                <div class="avatar">
                                                                                                    <span
                                                                                                        class="avatar-title rounded-circle bg-soft-primary font-size-16">
                                                                                                        <div
                                                                                                            class="rounded-circle avatar-sm    avatar-title  bg-soft-primary  font-size-26">
                                                                                                            <i
                                                                                                                class="bx bx-user-circle text-primary"></i>
                                                                                                        </div>
                                                                                                    </span>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>


                                                                                        <div
                                                                                            class="flex-grow-1 overflow-hidden">
                                                                                            <h5
                                                                                                class="text-truncate font-size-16 mb-1">
                                                                                                {{ $user->user->user_name }}
                                                                                            </h5>
                                                                                            <small
                                                                                                class=" text-truncate  mb-0 "
                                                                                                style="opacity: 0.8">{{ $user->user->name }}
                                                                                                {{ $user->user->surname }}</small>
                                                                                        </div>
                                                                                        <div class="flex-shrink-0">
                                                                                            {{--  --}}



                                                                                            {{--  --}}
                                                                                        </div>

                                                                                        <div class="unread-message">



                                                                                            <form
                                                                                                action="{{ route('delete.members.grup') }}"
                                                                                                method="post">
                                                                                                @csrf

                                                                                                <input name="grup"
                                                                                                    value="{{ $grup->grup_id }}"
                                                                                                    type="hidden">
                                                                                                <input name="user"
                                                                                                    value="{{ $user->user->user_id }}"
                                                                                                    type="hidden">

                                                                                                <button type="submit"
                                                                                                    class="btn btn-danger  btn-sm chat-send"><b><span
                                                                                                            class="d-none d-sm-inline-block me-2">Çıkar</span>
                                                                                                    </b><i
                                                                                                        class="bx bx-user-x  float-end font-size-18"></i></button>

                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <!-- end li -->
                                                                        @endforeach

                                                                        @if (!count($users) > 0)
                                                                            <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                                                role="alert">
                                                                                <i
                                                                                    class="uil-minus-circle
                                                                                text-primary font-size-16 me-2"></i>
                                                                                Üye Yok
                                                                            </div>
                                                                        @endif


                                                                    </ul>
                                                                    <!-- end ul -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="simplebar-placeholder" style="width: auto; height: 704px;">
                                            </div>
                                        </div>
                                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                            <div class="simplebar-scrollbar"
                                                style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                        </div>
                                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                            <div class="simplebar-scrollbar"
                                                style="height: 212px; transform: translate3d(0px, 175px, 0px); display: block;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- end form -->
                    </div>


                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    @endsection

    @section('js')
        <!-- plugins -->
        <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }} "></script>
        <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
        <!-- init js -->


        <!-- dropzone plugin -->
        <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/user-settings.init.js') }}"></script>
        <!-- init js -->
        <script src="{{ asset('assets/js/pages/project-create.init.js') }} "></script>

        <!-- Plugins js -->

        <script src="{{ asset('assets/js/app.js') }} "></script>
    @endsection
