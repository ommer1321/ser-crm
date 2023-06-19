@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">




        {{-- İncludes --}}

        @include('includes.alerts')

        @include('includes.errors')

        {{-- İncludes --}}




        <div class="chat-leftsidebar card">
            <div class="p-4 pb-0 rounded-top">
                <div class="d-flex border-bottom pb-3 align-items-start">
                    <div class="flex-grow-1">
                        <img src="assets/images/logo-sm.svg" class="avatar-sm h-auto" alt="">
                    </div>

                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 align-items-start">
                            <div class="dropdown chat-noti-dropdown">
                                <button class="btn dropdown-toggle py-0 shadow-none" type="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="uil uil-search"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                    <form class="px-2">
                                        <div>
                                            <input type="text" class="form-control bg-light rounded"
                                                placeholder="Search...">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="dropdown chat-noti-dropdown">
                                <button class="btn dropdown-toggle py-0" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="uil uil-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Contact</a>
                                    <a class="dropdown-item" href="#">Setting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chat-leftsidebar-nav mt-4 pt-2">
                    <ul class="nav nav-pills nav-justified bg-light nav-justified">
                        <li class="nav-item">
                            <a href="#request-box" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                <i class="uil uil-users-alt font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block">İstek Kutusu</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#groups" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="uil-history font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block">Geçmiş</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>


            <div>
                <div class="tab-content">
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
                                                <div class="p-4">
                                                    <div>
                                                        <h5 class="font-size-14 mb-3">İstekler</h5>

                                                        <ul class="list-unstyled chat-list">


                                                            @foreach ($users as $user)
                                                                <li class="">
                                                                    <a href="#">
                                                                        <div class="d-flex align-items-start">



                                                                            <div class="avatar align-self-center me-3">
                                                                                <div
                                                                                    class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                                    <img src="{{ asset($user->profile_photo_path) }}"
                                                                                        class="rounded-circle avatar-sm"
                                                                                        alt="">


                                                                                </div>
                                                                            </div>


                                                                            <div class="flex-grow-1 overflow-hidden">
                                                                                <h5 class="text-truncate font-size-16 mb-1">
                                                                                    {{ $user->user_name }}</h5>
                                                                                <small class=" text-truncate  mb-0 "
                                                                                    style="opacity: 0.8">{{ $user->name }}
                                                                                    {{ $user->surname }}</small>
                                                                            </div>
                                                                            <div class="flex-shrink-0">
                                                                                <div class="font-size-11">02 min</div>
                                                                            </div>

                                                                            <div class="unread-message">

                                                                                <form
                                                                                    action="{{ route('request-box-check.friendship') }}"
                                                                                    method="post">
                                                                                    @csrf


                                                                                    <input type="hidden" name="user"
                                                                                        value="{{ $user->user_name }}">
                                                                                    <button type="submit"
                                                                                        name="friend_status"
                                                                                        class="btn btn-success  btn-sm chat-send"
                                                                                        value="ok"><b><span
                                                                                                class="d-none d-sm-inline-block me-2">Onayla</span>
                                                                                        </b><i
                                                                                            class="bx bx-user-check float-end font-size-18"></i></button>
                                                                                    <button type="submit"
                                                                                        name="friend_status"
                                                                                        class="btn btn-danger  btn-sm chat-send"
                                                                                        value="no"><b><span
                                                                                                class="d-none d-sm-inline-block me-2">Reddet</span>
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
                                                                    Arkadaşlık İsteği Bulunmamaktadır.
                                                                </div>
                                                            @endif











                                                            {{-- <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    
                                                     <div class="avatar align-self-center me-3">
                                            <div class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                <i class="bx bx-user-circle text-primary"></i>
                                            </div>
                                        </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-16 mb-1">ommer1453</h5>
                                                        <small class=" text-truncate  mb-0 " style="opacity: 0.8">Ömer Faruk Çetin</small>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                       
                                                            <button type="submit" class="btn btn-success  btn-sm chat-send"><b><span class="d-none d-sm-inline-block me-2">Onayla</span> </b><i class="bx bx-user-check float-end font-size-18"></i></button>
                                                            <button type="submit" class="btn btn-danger  btn-sm chat-send"><b><span class="d-none d-sm-inline-block me-2">Reddet</span> </b><i class="bx bx-user-x  float-end font-size-18"></i></button>

                                                    </div>
                                                </div>
                                            </a>
                                        </li> --}}
                                                            <!-- end li -->




                                                        </ul>
                                                        <!-- end ul -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 704px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar"
                                    style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                    style="height: 212px; transform: translate3d(0px, 175px, 0px); display: block;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="groups">
                        <div class="chat-message-list" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <div class="p-4">
                                                    <div>


                                                        <ul class="list-unstyled chat-list">

                                                            @foreach ($allRequestes as $item)
                                                                <li>
                                                                    <a href="#">
                                                                        <div class="d-flex align-items-start">
                                                                            <div
                                                                                class="flex-shrink-0 user-img online align-self-center me-3">
                                                                                <div class="avatar-sm align-self-center">
                                                                                    <span
                                                                                        class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                                        {{ $item->takenRequestHistory->first_letter }}
                                                                                    </span>
                                                                                </div>

                                                                            </div>
                                                                            @if ($item->status == 'rejected')
                                                                                <div class="flex-grow-1 overflow-hidden">
                                                                                    <h5
                                                                                        class="text-truncate font-size-14 mb-1">
                                                                                        {{ $item->takenRequestHistory->user_name }}
                                                                                    </h5>
                                                                                    <p class="text-truncate mb-0"><span
                                                                                            class="badge bg-danger rounded-pill"
                                                                                            style="z-index: 10000; ">{{ $item->takenRequestHistory->name }}
                                                                                            {{ $item->takenRequestHistory->surname }}&apos;ın
                                                                                            İsteğini reddettiniz </span>
                                                                                    </p>
                                                                                    <span class="font-size-11 "
                                                                                        style="float: right;"> <i
                                                                                            class="bx bx-time font-size-12"></i>
                                                                                        {{ $item->event_time }}</span>
                                                                                </div>

                                                                                {{-- <div class="unread-message ">
                                                                            <span class="badge bg-danger rounded-pill font-size-17 "> <i class="bx bx-user-x mx-auto "></i></span>
                                                                           
                                                                        </div> --}}
                                                                            @elseif($item->status == 'approved')
                                                                                <div class="flex-grow-1 overflow-hidden">
                                                                                    <h5
                                                                                        class="text-truncate font-size-14 mb-1">
                                                                                        {{ $item->takenRequestHistory->user_name }}
                                                                                    </h5>
                                                                                    <p class="text-truncate mb-0"><span
                                                                                            class="badge bg-success rounded-pill">{{ $item->takenRequestHistory->name }}
                                                                                            {{ $item->takenRequestHistory->surname }}&apos;ın
                                                                                            İsteğini kabul ettiniz </span>
                                                                                    </p>
                                                                                    <span class="font-size-11 "
                                                                                        style="float: right;"> <i
                                                                                            class="bx bx-time font-size-12"></i>
                                                                                        {{ $item->event_time }}</span>

                                                                                </div>


                                                                                {{-- <div class="unread-message ">
                                                                            <span class="badge bg-success rounded-pill font-size-17 "> <i class="bx bx-user-check mx-auto "></i></span>
                                                                           
                                                                        </div> --}}
                                                                            @endif
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach


                                                        </ul>
                                                        <!-- end ul -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar"
                                    style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                <div class="simplebar-scrollbar"
                                    style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    @endsection
    @section('js')
    @endsection
