@extends('layouts.app')

@section('css')
    {{-- <link href="{{ asset('assets/libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection
{{-- 
@role('admin')
admin
@endrole  

@role('teacher')
teacher
@endrole  


@role('student')
student
@endrole   --}}
@section('content')
    @include('includes.alerts')
    @include('includes.errors')

    <div class="row">



        <div class="col-xxl-3 col-lg-4">
            <div class="card">
                <div class="card-body ">
                    <div class="user-profile-img">
                        <img src="assets/images/pattern-bg.jpg" class="profile-img profile-foreground-img rounded-top"
                            style="height: 120px;" alt="">
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
                                                <li><a class="dropdown-item" href="#">Action</a></li>
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
                        <div class="text-center">
                            <img src="assets/images/users/avatar-3.jpg" alt=""
                                class="avatar-xl rounded-circle img-thumbnail">

                            <div class="mt-3">
                                <h5 class="mb-1">Marie N.</h5>
                                <div>
                                    <a href="#" class="badge badge-soft-success m-1">UX Research</a>


                                    <a href="#" class="badge badge-soft-success m-1">Project Management</a>
                                    <a href="#" class="badge badge-soft-success m-1">CX Strategy</a>
                                </div>

                                <div class="mt-4">
                                    <a href="" class="btn btn-primary waves-effect waves-light btn-sm"><i
                                            class="bx bx-send me-1 align-middle"></i> Send Message</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="p-3 mt-3 border-bottom">
                        <div class="row text-center">
                            <div class="col-6 border-end">
                                <div class="p-1">
                                    <h5 class="mb-1">3,658</h5>
                                    <p class="text-muted mb-0">Products</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-1">
                                    <h5 class="mb-1">6.8k</h5>
                                    <p class="text-muted mb-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mt-2">
                        <h5 class="font-size-16">üyeler :<button style="float: right" type="button"
                                class="btn btn-primary btn-rounded btn-sm font-size-16 " data-bs-toggle="modal"
                                data-bs-target="#exampleModalScrollable">Üyeler <i
                                    class="uil-user-plus text-white font-size-16"></i></button></h5>
                        <!-- Scrollable modal -->


                        <div class="mt-4">
                            <p class="text-muted mb-1">Name :</p>
                            <h5 class="font-size-14 text-truncate">Marie N.</h5>
                        </div>

                        <div class="mt-4">
                            <p class="text-muted mb-1">E-mail :</p>
                            <h5 class="font-size-14 text-truncate">marie@vuesy.com</h5>
                        </div>

                        <div class="mt-4">
                            <p class="text-muted mb-1">Location :</p>
                            <h5 class="font-size-14 text-truncate">California, United States</h5>
                        </div>
                    </div>

                </div>
                <!-- end card body -->
            </div>
        </div>


        {{-- Part-2  --}}





        <div class="col-xxl-9 col-lg-8">


            {{-- Üyeler - Modal --}}
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
                            <ul class="list-unstyled chat-list">
                                <li class="">
                                    <a href="#">
                                        <div class="d-flex align-items-start">
                                            <div class="avatar align-self-center me-3">
                                                <div
                                                    class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                    <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                        class="rounded-circle avatar-sm" alt="">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-16 mb-1">
                                                    ommer11453
                                                </h5>
                                                <small class=" text-truncate" style="opacity: 0.8">
                                                    Samet Cetin</small>
                                            </div>


                                            <div class="unread-message">


                                                <form action="http://127.0.0.1:8000/grup/member/add" method="post">
                                                    <input type="hidden" name="_token"
                                                        value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                    <input name="grup" value="075bac9c-9722-487e-b7df-25e1764b0b08"
                                                        type="hidden">
                                                    <input name="user" value="47f30b13-635d-41ec-b0fb-e4e1b8e438d6"
                                                        type="hidden">




                                                    <button type="submit"
                                                        class="btn btn-success  btn-sm chat-send"><b><span
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
                            <ul class="list-unstyled chat-list">

                                <li class="">
                                    <a href="#">
                                        <div class="d-flex align-items-start">

                                            <div class="avatar align-self-center me-3">




                                                <div
                                                    class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                    <img src="http://127.0.0.1:8000/assets/images/users/avatar-2.jpg"
                                                        class="rounded-circle avatar-sm" alt="">


                                                </div>
                                            </div>


                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-16 mb-1">
                                                    ahmet53
                                                </h5>
                                                <small class=" text-truncate" style="opacity: 0.8">
                                                    Ahmet Çalık</small>
                                            </div>


                                            <div class="unread-message">


                                                <form action="http://127.0.0.1:8000/grup/member/add" method="post">
                                                    <input type="hidden" name="_token"
                                                        value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                    <input name="grup" value="075bac9c-9722-487e-b7df-25e1764b0b08"
                                                        type="hidden">
                                                    <input name="user" value="31bd9142-d323-11ed-b70f-8c8caa20f3ca"
                                                        type="hidden">




                                                    <button type="submit"
                                                        class="btn btn-success  btn-sm chat-send"><b><span
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
                            <ul class="list-unstyled chat-list">

                                <li class="">
                                    <a href="#">
                                        <div class="d-flex align-items-start">

                                            <div class="avatar align-self-center me-3">




                                                <div class="avatar">
                                                    <span class="avatar-title rounded-circle bg-soft-primary font-size-16">
                                                        <div
                                                            class="rounded-circle avatar-sm    avatar-title  bg-soft-primary  font-size-26">
                                                            <i class="bx bx-user-circle text-primary"></i>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-16 mb-1">
                                                    osmannım123
                                                </h5>
                                                <small class=" text-truncate" style="opacity: 0.8">
                                                    Osman5 Çalık</small>
                                            </div>


                                            <div class="unread-message">


                                                <form action="http://127.0.0.1:8000/grup/member/add" method="post">
                                                    <input type="hidden" name="_token"
                                                        value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                    <input name="grup" value="075bac9c-9722-487e-b7df-25e1764b0b08"
                                                        type="hidden">
                                                    <input name="user" value="11bd9142-d323-11ed-b70f-8c8caa20f3ca"
                                                        type="hidden">




                                                    <button type="submit"
                                                        class="btn btn-success  btn-sm chat-send"><b><span
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
                            <ul class="list-unstyled chat-list">

                                <li class="">
                                    <a href="#">
                                        <div class="d-flex align-items-start">

                                            <div class="avatar align-self-center me-3">




                                                <div
                                                    class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                    <img src="http://127.0.0.1:8000/assets/images/users/avatar-4.jpg"
                                                        class="rounded-circle avatar-sm" alt="">


                                                </div>
                                            </div>


                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-16 mb-1">
                                                    Mf_Altun
                                                </h5>
                                                <small class=" text-truncate" style="opacity: 0.8">
                                                    Muhammet Furkan Altun</small>
                                            </div>


                                            <div class="unread-message">


                                                <form action="http://127.0.0.1:8000/grup/member/add" method="post">
                                                    <input type="hidden" name="_token"
                                                        value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                    <input name="grup" value="075bac9c-9722-487e-b7df-25e1764b0b08"
                                                        type="hidden">
                                                    <input name="user" value="12bd9142-d323-11ed-b70f-8c8caa20f3ca"
                                                        type="hidden">




                                                    <button type="submit"
                                                        class="btn btn-success  btn-sm chat-send"><b><span
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
                        </div>
                        <!-- end modalbody -->
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary">Tamam</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            {{-- Üyeler - Modal --}}
            <div class="col-xxl-12 col-xl-6">
                <div class="card">




                    <div class="col-xxl-12 col-xl-6">
                        <div class="card">
                            <div class="card-header justify-content-center d-flex align-items-center">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                                    <li class="nav-item mx-2">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#navpills2-home"
                                            role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Akış</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" data-bs-toggle="tab" href="#navpills2-profile"
                                            role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Whatsapp</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" data-bs-toggle="tab" href="#navpills2-messages"
                                            role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Tasklarım</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" data-bs-toggle="tab" href="#navpills2-settings"
                                            role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Programlarım</span>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- end card header -->
                            <div class="card-body">


                                <!-- Tab panes -->
                                <div class="tab-content  text-muted">
                                    <div class="tab-pane active" id="navpills2-home" role="tabpanel">

                                      
                                        {{-- Üyeler - Modal --}}
                                        <div class="modal fade" id="asdfg" tabindex="-1" role="dialog"
                                            aria-labelledby="12345pTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="12345pTitle">
                                                            Yorumlar</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="simplebar-content" style="padding: 0px 24px;">


                                                            <div class="border-bottom py-3">
                                                                <p class=" text-muted font-size-13" style="float: right">


                                                                </p>
                                                                <div class="dropdown " style="float: right">
                                                                    11 dakika önce
                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                        href="#" role="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down ms-1"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        style="">


                                                                        <form
                                                                            action="http://127.0.0.1:8000/tasks/comment/comment/delete"
                                                                            method="post">
                                                                            <input type="hidden" name="_token"
                                                                                value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                                            <input type="hidden" name="comment"
                                                                                value="e7be1819-398a-4376-a1cb-0a94c2b9edbc">
                                                                            <input type="hidden" name="_token"
                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                            <li><input type="submit"
                                                                                    class="dropdown-item" value="Sil">
                                                                            </li>

                                                                        </form>


                                                                    </ul>
                                                                </div>

                                                                <p></p>
                                                                <div class="d-flex align-items-center mb-3">



                                                                    <div class="avatar align-self-center me-3">


                                                                        <div
                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                            <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle avatar-sm"
                                                                                alt="">
                                                                        </div>



                                                                    </div>


                                                                    <div class="flex-1">
                                                                        <h5 class="font-size-15 mb-1">
                                                                            Sen

                                                                        </h5>
                                                                        <a href="javascript: void(0);"
                                                                            class="badge bg-soft-success text-success font-size-11">ommer1453</a>

                                                                    </div>
                                                                </div>
                                                                <p class="text-muted mb-4">


                                                                    Asdsadsa
                                                                </p>



                                                            </div>
                                                            <div class="border-bottom py-3">
                                                                <p class=" text-muted font-size-13" style="float: right">


                                                                </p>
                                                                <div class="dropdown " style="float: right">
                                                                    1 saniye önce
                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                        href="#" role="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down ms-1"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        style="">


                                                                        <form
                                                                            action="http://127.0.0.1:8000/tasks/comment/comment/delete"
                                                                            method="post">
                                                                            <input type="hidden" name="_token"
                                                                                value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                                            <input type="hidden" name="comment"
                                                                                value="715c46cf-3b36-4169-b171-93a6a79c91ff">
                                                                            <input type="hidden" name="_token"
                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                            <li><input type="submit"
                                                                                    class="dropdown-item" value="Sil">
                                                                            </li>

                                                                        </form>


                                                                    </ul>
                                                                </div>

                                                                <p></p>
                                                                <div class="d-flex align-items-center mb-3">



                                                                    <div class="avatar align-self-center me-3">


                                                                        <div
                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                            <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle avatar-sm"
                                                                                alt="">
                                                                        </div>



                                                                    </div>


                                                                    <div class="flex-1">
                                                                        <h5 class="font-size-15 mb-1">
                                                                            Sen

                                                                        </h5>
                                                                        <a href="javascript: void(0);"
                                                                            class="badge bg-soft-success text-success font-size-11">ommer1453</a>

                                                                    </div>
                                                                </div>
                                                                <p class="text-muted mb-4">


                                                                    anh mi bag before banksy hoodie helvetica they sold out
                                                                    farm-to-table.


                                                                </p>






                                                            </div>
                                                        </div>
                                                        <div class="simplebar-content" style="padding: 0px 24px;">


                                                            <div class="border-bottom py-3">
                                                                <p class=" text-muted font-size-13" style="float: right">


                                                                </p>
                                                                <div class="dropdown " style="float: right">
                                                                    11 dakika önce
                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                        href="#" role="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down ms-1"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        style="">


                                                                        <form
                                                                            action="http://127.0.0.1:8000/tasks/comment/comment/delete"
                                                                            method="post">
                                                                            <input type="hidden" name="_token"
                                                                                value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                                            <input type="hidden" name="comment"
                                                                                value="e7be1819-398a-4376-a1cb-0a94c2b9edbc">
                                                                            <input type="hidden" name="_token"
                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                            <li><input type="submit"
                                                                                    class="dropdown-item" value="Sil">
                                                                            </li>

                                                                        </form>


                                                                    </ul>
                                                                </div>

                                                                <p></p>
                                                                <div class="d-flex align-items-center mb-3">



                                                                    <div class="avatar align-self-center me-3">


                                                                        <div
                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                            <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle avatar-sm"
                                                                                alt="">
                                                                        </div>



                                                                    </div>


                                                                    <div class="flex-1">
                                                                        <h5 class="font-size-15 mb-1">
                                                                            Sen

                                                                        </h5>
                                                                        <a href="javascript: void(0);"
                                                                            class="badge bg-soft-success text-success font-size-11">ommer1453</a>

                                                                    </div>
                                                                </div>
                                                                <p class="text-muted mb-4">


                                                                    Trust fund seitan letterpress, keytar raw denim keffiyeh
                                                                    etsy art party before they sold out master cleanse
                                                                    gluten-free squid scenester freegan cosby sweater. Fanny
                                                                    pack portland seitan DIY, art party locavore wolf cliche
                                                                    high life echo park Austin. Cred vinyl keffiyeh DIY
                                                                    salvia PBR, banh mi bag before banksy hoodie helvetica
                                                                    they sold out farm-to-table.Trust fund seitan
                                                                    letterpress, keytar raw denim keffiyeh etsy art party
                                                                    before they sold out master cleanse gluten-free squid
                                                                    scenester freegan cosby sweater. Fanny pack portland
                                                                    seitan DIY, art party locavore wolf cliche high life
                                                                    echo park Austin. Cred vinyl keffiyeh DIY salvia PBR,
                                                                    banh mi bag before banksy hoodie helvetica they sold out
                                                                    farm-to-table. Trust fund seitan letterpress, keytar raw
                                                                    denim keffiyeh etsy art party before they sold out
                                                                    master cleanse gluten-free squid scenester freegan cosby
                                                                    sweater. Fanny pack portland seitan DIY, art party
                                                                    locavore wolf cliche high life echo park Austin. Cred
                                                                    vinyl keffiyeh DIY salvia PBR, b
                                                                </p>






                                                            </div>
                                                            <div class="border-bottom py-3">
                                                                <p class=" text-muted font-size-13" style="float: right">


                                                                </p>
                                                                <div class="dropdown " style="float: right">
                                                                    1 saniye önce
                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                        href="#" role="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down ms-1"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        style="">


                                                                        <form
                                                                            action="http://127.0.0.1:8000/tasks/comment/comment/delete"
                                                                            method="post">
                                                                            <input type="hidden" name="_token"
                                                                                value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                                            <input type="hidden" name="comment"
                                                                                value="715c46cf-3b36-4169-b171-93a6a79c91ff">
                                                                            <input type="hidden" name="_token"
                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                            <li><input type="submit"
                                                                                    class="dropdown-item" value="Sil">
                                                                            </li>

                                                                        </form>


                                                                    </ul>
                                                                </div>

                                                                <p></p>
                                                                <div class="d-flex align-items-center mb-3">



                                                                    <div class="avatar align-self-center me-3">


                                                                        <div
                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                            <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle avatar-sm"
                                                                                alt="">
                                                                        </div>



                                                                    </div>


                                                                    <div class="flex-1">
                                                                        <h5 class="font-size-15 mb-1">
                                                                            Sen

                                                                        </h5>
                                                                        <a href="javascript: void(0);"
                                                                            class="badge bg-soft-success text-success font-size-11">ommer1453</a>

                                                                    </div>
                                                                </div>
                                                                <p class="text-muted mb-4">


                                                                    Sadsadasda
                                                                </p>






                                                            </div>
                                                        </div>
                                                        <div class="simplebar-content" style="padding: 0px 24px;">


                                                            <div class="border-bottom py-3">
                                                                <p class=" text-muted font-size-13" style="float: right">


                                                                </p>
                                                                <div class="dropdown " style="float: right">
                                                                    11 dakika önce
                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                        href="#" role="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down ms-1"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        style="">


                                                                        <form
                                                                            action="http://127.0.0.1:8000/tasks/comment/comment/delete"
                                                                            method="post">
                                                                            <input type="hidden" name="_token"
                                                                                value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                                            <input type="hidden" name="comment"
                                                                                value="e7be1819-398a-4376-a1cb-0a94c2b9edbc">
                                                                            <input type="hidden" name="_token"
                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                            <li><input type="submit"
                                                                                    class="dropdown-item" value="Sil">
                                                                            </li>

                                                                        </form>


                                                                    </ul>
                                                                </div>

                                                                <p></p>
                                                                <div class="d-flex align-items-center mb-3">



                                                                    <div class="avatar align-self-center me-3">


                                                                        <div
                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                            <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle avatar-sm"
                                                                                alt="">
                                                                        </div>



                                                                    </div>


                                                                    <div class="flex-1">
                                                                        <h5 class="font-size-15 mb-1">
                                                                            Sen

                                                                        </h5>
                                                                        <a href="javascript: void(0);"
                                                                            class="badge bg-soft-success text-success font-size-11">ommer1453</a>

                                                                    </div>
                                                                </div>
                                                                <p class="text-muted mb-4">


                                                                    Asdsadsa
                                                                </p>






                                                            </div>
                                                            <div class="border-bottom py-3">
                                                                <p class=" text-muted font-size-13" style="float: right">


                                                                </p>
                                                                <div class="dropdown " style="float: right">
                                                                    1 saniye önce
                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                        href="#" role="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down ms-1"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        style="">


                                                                        <form
                                                                            action="http://127.0.0.1:8000/tasks/comment/comment/delete"
                                                                            method="post">
                                                                            <input type="hidden" name="_token"
                                                                                value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                                            <input type="hidden" name="comment"
                                                                                value="715c46cf-3b36-4169-b171-93a6a79c91ff">
                                                                            <input type="hidden" name="_token"
                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                            <li><input type="submit"
                                                                                    class="dropdown-item" value="Sil">
                                                                            </li>

                                                                        </form>


                                                                    </ul>
                                                                </div>

                                                                <p></p>
                                                                <div class="d-flex align-items-center mb-3">



                                                                    <div class="avatar align-self-center me-3">


                                                                        <div
                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                            <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle avatar-sm"
                                                                                alt="">
                                                                        </div>



                                                                    </div>


                                                                    <div class="flex-1">
                                                                        <h5 class="font-size-15 mb-1">
                                                                            Sen

                                                                        </h5>
                                                                        <a href="javascript: void(0);"
                                                                            class="badge bg-soft-success text-success font-size-11">ommer1453</a>

                                                                    </div>
                                                                </div>
                                                                <p class="text-muted mb-4">


                                                                    Sadsadasda
                                                                </p>






                                                            </div>
                                                        </div>
                                                        <div class="simplebar-content" style="padding: 0px 24px;">


                                                            <div class="border-bottom py-3">
                                                                <p class=" text-muted font-size-13" style="float: right">


                                                                </p>
                                                                <div class="dropdown " style="float: right">
                                                                    11 dakika önce
                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                        href="#" role="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down ms-1"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        style="">


                                                                        <form
                                                                            action="http://127.0.0.1:8000/tasks/comment/comment/delete"
                                                                            method="post">
                                                                            <input type="hidden" name="_token"
                                                                                value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                                            <input type="hidden" name="comment"
                                                                                value="e7be1819-398a-4376-a1cb-0a94c2b9edbc">
                                                                            <input type="hidden" name="_token"
                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                            <li><input type="submit"
                                                                                    class="dropdown-item" value="Sil">
                                                                            </li>

                                                                        </form>


                                                                    </ul>
                                                                </div>

                                                                <p></p>
                                                                <div class="d-flex align-items-center mb-3">



                                                                    <div class="avatar align-self-center me-3">


                                                                        <div
                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                            <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle avatar-sm"
                                                                                alt="">
                                                                        </div>



                                                                    </div>


                                                                    <div class="flex-1">
                                                                        <h5 class="font-size-15 mb-1">
                                                                            Sen

                                                                        </h5>
                                                                        <a href="javascript: void(0);"
                                                                            class="badge bg-soft-success text-success font-size-11">ommer1453</a>

                                                                    </div>
                                                                </div>
                                                                <p class="text-muted mb-4">


                                                                    Asdsadsa
                                                                </p>






                                                            </div>
                                                            <div class="border-bottom py-3">
                                                                <p class=" text-muted font-size-13" style="float: right">


                                                                </p>
                                                                <div class="dropdown " style="float: right">
                                                                    1 saniye önce
                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                        href="#" role="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down ms-1"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        style="">


                                                                        <form
                                                                            action="http://127.0.0.1:8000/tasks/comment/comment/delete"
                                                                            method="post">
                                                                            <input type="hidden" name="_token"
                                                                                value="JtQ46WG7CmwsxAloJi6YZy9f3UOctMVYEJwMwxez">
                                                                            <input type="hidden" name="comment"
                                                                                value="715c46cf-3b36-4169-b171-93a6a79c91ff">
                                                                            <input type="hidden" name="_token"
                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                            <li><input type="submit"
                                                                                    class="dropdown-item" value="Sil">
                                                                            </li>

                                                                        </form>


                                                                    </ul>
                                                                </div>

                                                                <p></p>
                                                                <div class="d-flex align-items-center mb-3">



                                                                    <div class="avatar align-self-center me-3">


                                                                        <div
                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                            <img src="http://127.0.0.1:8000/assets/images/users/avatar-1.jpg"
                                                                                class="rounded-circle avatar-sm"
                                                                                alt="">
                                                                        </div>



                                                                    </div>


                                                                    <div class="flex-1">
                                                                        <h5 class="font-size-15 mb-1">
                                                                            Sen

                                                                        </h5>
                                                                        <a href="javascript: void(0);"
                                                                            class="badge bg-soft-success text-success font-size-11">ommer1453</a>

                                                                    </div>
                                                                </div>
                                                                <p class="text-muted mb-4">


                                                                    Trust fund seitan letterpress, keytar raw denim keffiyeh
                                                                    etsy art party before they sold out master cleanse
                                                                    gluten-free squid scenester freegan cosby sweater. Fanny
                                                                    pack portland seitan DIY, art party locavore wolf cliche
                                                                    high life echo park Austin. Cred vinyl keffiyeh DIY
                                                                    salvia PBR, banh mi bag before banksy hoodie helvetica
                                                                    they sold out farm-to-table.Trust fund seitan
                                                                    letterpress, keytar raw denim keffiyeh etsy art party
                                                                    before they sold out master cleanse gluten-free squid
                                                                    scenester freegan cosby sweater. Fanny pack portland
                                                                    seitan DIY, art party locavore wolf cliche high life
                                                                    echo park Austin. Cred vinyl keffiyeh DIY salvia PBR,
                                                                    banh mi bag before banksy hoodie helvetica they sold out
                                                                    farm-to-table. Trust fund seitan letterpress, keytar raw
                                                                    denim keffiyeh etsy art party before they sold out
                                                                    master cleanse gluten-free squid scenester freegan cosby
                                                                    sweater. Fanny pack portland seitan DIY, art party
                                                                    locavore wolf cliche high life echo park Austin. Cred
                                                                    vinyl keffiyeh DIY salvia PBR, banh mi bag before banksy
                                                                    hoodie helvetica they sold out farm-to-table.


                                                                </p>






                                                            </div>


                                                        </div>
                                                    </div>
                                                    <!-- end modalbody -->
                                                    <div class="modal-footer">
                                                        <div class="border rounded m-2 w-100  ">
                                                            <div class="d-flex chat-input-section align-items-start p-1">

                                                                <div class="flex-grow-1">
                                                                    <div
                                                                        class="position-relative d-flex align-items-start">
                                                                        <input type="text" name="comment"
                                                                            class="form-control chat-input"
                                                                            placeholder="Yorum yap..">
                                                                        <input type="hidden" name="task"
                                                                            value="e359a26e-e212-4a5b-927f-39017f7a41dd">
                                                                        <div
                                                                            class="chat-input-links d-flex align-items-start">

                                                                            <button type="submit"
                                                                                class="btn btn-primary mx-2"><i
                                                                                    class="uil uil-message"></i></button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        {{-- Üyeler - Modal --}}

                                        <div class="d-flex align-items-start mb-4">
                                            <div class="flex-shrink-0 avatar rounded-circle me-3">
                                                <img src="assets/images/users/avatar-1.jpg" alt=""
                                                    class="img-fluid rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-15 mb-1 text-truncate"><a href="pages-profile.html"
                                                        class="text-dark">Donald
                                                        Risher</a></h5>
                                                <span class="text-mute mb-0">1 saat önce</span>

                                            </div>


                                            <div class="flex-shrink-0 dropdown">
                                                <a class="text-body dropdown-toggle font-size-16" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal icon-xs">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div><!-- end dropdown -->
                                        </div>
                                        <h5 class="">
                                            <a href="" class="text-dark lh-base"><b>Stylish Cricket &amp; Walking
                                                    Light Weight Shoes</b></a>
                                        </h5>

                                        <p class="mb-0">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                            art party before they sold out master cleanse gluten-free squid
                                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                            art party locavore wolf cliche high life echo park Austin. Cred
                                            vinyl keffiyeh DIY salvia PBR, banh mi bag before banksy hoodie
                                            helvetica they sold out farm-to-table.Trust fund seitan letterpress, keytar raw
                                            denim keffiyeh etsy art party before they sold out master cleanse gluten-free
                                            squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party
                                            locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia
                                            PBR, banh mi bag before banksy hoodie helvetica they sold out farm-to-table.

                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before
                                            they sold out master cleanse gluten-free squid scenester freegan cosby sweater.
                                            Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo
                                            park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi bag before banksy
                                            hoodie helvetica they sold out farm-to-table.


                                        </p>

                                        <div class="mt-2">
                                            <span class="badge badge-soft-danger ">Full Stack </span>
                                            <span class="badge badge-soft-danger ">Full </span>
                                            <span class="badge badge-soft-danger ">Full Developer</span>
                                            <span class="badge badge-soft-danger ">Full Stack Developer</span>
                                            <span class="badge badge-soft-danger ">Full Stack Developer</span>
                                            <span class="badge badge-soft-danger ">Full Stack Developer</span>
                                            <span class="badge badge-soft-danger ">Full Stack Developer</span>
                                        </div>

                                        <ul class="list-inline product-review-link  mt-3">
                                            <li class="list-inline-item">
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="" data-bs-original-title="Beğen"><i
                                                        class="bx bx-like"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="" data-bs-original-title="Yorum Yap"><i
                                                        class="bx bx-comment-dots"></i></a>
                                            </li>
                                        </ul>

                                        {{-- <hr class="my-2 text-muted"> --}}

                                        <div class="card">

                                            <button style="float: right" type="button"
                                                class="btn btn-primary btn-rounded btn-sm font-size-16 "
                                                data-bs-toggle="modal" data-bs-target="#asdfg">Yorum Yok <i
                                                    class="uil-user-plus text-white font-size-16"></i></button>
                                        </div>







                                    </div> <!-- end tab pane -->
                                    
                                    <div class="tab-pane" id="navpills2-profile" role="tabpanel">
                                        <p class="mb-0">
                                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                            single-origin coffee squid. Exercitation +1 labore velit, blog
                                            sartorial PBR leggings next level wes anderson artisan four loko
                                            farm-to-table craft beer twee. Qui photo booth letterpress,
                                            commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                            vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                            aesthetic magna 8-bit.
                                        </p>
                                    </div> <!-- end tab pane -->
                                    <div class="tab-pane" id="navpills2-messages" role="tabpanel">

                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">

                                                        <a href="javascript: void(0);" class="d-block mx-3"
                                                            data-bs-toggle="tooltip" data-placement="top" title=""
                                                            data-bs-original-title="Logviewer">
                                                            <div class="avatar">
                                                                <div class="avatar-title rounded-circle bg-success ">
                                                                    L
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <strong class="d-block  text-muted ">This is the second item's
                                                            accordion body.</strong>

                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">


                                                        <div class="d-flex align-items-start">

                                                            <div class="flex-grow-1 overflow-hidden mx-2">
                                                                <span class="badge badge-soft-success my-1">Normal</span>
                                                                {{-- <strong class="d-block">This is the second item's accordion body.</strong>  --}}
                                                                <small class="mt-2 text-muted d-block">It is
                                                                    hidden by default, until the collapse plugin adds the
                                                                    appropriate
                                                                    classes that we use to style each element. These classes
                                                                    control the
                                                                    overall appearance, as well as the showing and hiding
                                                                    via CSS
                                                                    transitions. You can modify any of this with custom CSS
                                                                    or
                                                                    overriding our default variables. It's also worth noting
                                                                    that just
                                                                    about any HTML can go within the
                                                                    <code>.accordion-body</code>,
                                                                    though the transition does limit
                                                                    overflow.LogvieweLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerr
                                                                    Eklenecek Süper Admin Özelliği Gelince..</small>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            {{--  --}}
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingtwo">
                                                    <button class="accordion-button fw-medium collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">

                                                        <a href="javascript: void(0);" class="d-block mx-3"
                                                            data-bs-toggle="tooltip" data-placement="top" title=""
                                                            data-bs-original-title="Logviewer">
                                                            <div class="avatar">
                                                                <div class="avatar-title rounded-circle bg-success ">
                                                                    L
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <strong class="d-block  text-muted ">This is the second item's
                                                            accordion body.</strong>

                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingtwo" data-bs-parent="#accordionExample"
                                                    style="">
                                                    <div class="accordion-body">


                                                        <div class="d-flex align-items-start">

                                                            <div class="flex-grow-1 overflow-hidden mx-2">
                                                                <span class="badge badge-soft-success my-1">Normal</span>
                                                                {{-- <strong class="d-block">This is the second item's accordion body.</strong>  --}}
                                                                <small class="mt-2 text-muted d-block">It is
                                                                    hidden by default, until the collapse plugin adds the
                                                                    appropriate
                                                                    classes that we use to style each element. These classes
                                                                    control the
                                                                    overall appearance, as well as the showing and hiding
                                                                    via CSS
                                                                    transitions. You can modify any of this with custom CSS
                                                                    or
                                                                    overriding our default variables. It's also worth noting
                                                                    that just
                                                                    about any HTML can go within the
                                                                    <code>.accordion-body</code>,
                                                                    though the transition does limit
                                                                    overflow.LogvieweLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerLogviewerr
                                                                    Eklenecek Süper Admin Özelliği Gelince..</small>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>


                                    </div> <!-- end tab pane -->





                                    <div class="tab-pane" id="navpills2-settings" role="tabpanel">



                                        <div class="d-flex align-items-start mb-4">
                                            <div class="flex-shrink-0 avatar rounded-circle me-3">
                                                <img src="assets/images/users/avatar-1.jpg" alt=""
                                                    class="img-fluid rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-15 mb-1 text-truncate"><a href="pages-profile.html"
                                                        class="text-dark">Donald
                                                        Risher</a></h5>
                                                <span class="text-mute mb-0">1 saat önce</span>

                                            </div>


                                            <div class="flex-shrink-0 dropdown">
                                                <a class="text-body dropdown-toggle font-size-16" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal icon-xs">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div><!-- end dropdown -->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <a href="assets/images/small/img-1.jpg"
                                                        class="thumb preview-thumb image-popup">
                                                        <img src="assets/images/small/img-1.jpg" class="img-fluid"
                                                            alt="work-thumbnail">
                                                    </a>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <div class="mt-4 mt-md-0">
                                                    <a href="assets/images/small/img-2.jpg"
                                                        class="thumb preview-thumb image-popup">
                                                        <img src="assets/images/small/img-2.jpg" class="img-fluid"
                                                            alt="work-thumbnail">
                                                    </a>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <h5 class="mt-1">
                                            <a href="" class="text-dark lh-base">Stylish Cricket &amp; Walking
                                                Light Weight Shoes</a>
                                        </h5>
                                        <p class="mb-0">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                            art party before they sold out master cleanse gluten-free squid
                                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                            art party locavore wolf cliche high life echo park Austin. Cred
                                            vinyl keffiyeh DIY salvia PBR, banh mi bag before banksy hoodie
                                            helvetica they sold out farm-to-table.Trust fund seitan letterpress, keytar raw
                                            denim keffiyeh etsy art party before they sold out master cleanse gluten-free
                                            squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party
                                            locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia
                                            PBR, banh mi bag before banksy hoodie helvetica they sold out farm-to-table.

                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before
                                            they sold out master cleanse gluten-free squid scenester freegan cosby sweater.
                                            Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo
                                            park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi bag before banksy
                                            hoodie helvetica they sold out farm-to-table.


                                        </p>
                                        <span class="badge badge-soft-danger my-2 mt-2">Full Stack </span>
                                        <span class="badge badge-soft-danger my-2 mt-2">Full </span>
                                        <span class="badge badge-soft-danger my-2 mt-2">Full Developer</span>
                                        <span class="badge badge-soft-danger my-2 mt-2">Full Stack Developer</span>
                                        <div class="">
                                            <div class="border rounded m-2">
                                                <div class="d-flex chat-input-section align-items-start p-1">

                                                    <div class="flex-grow-1">
                                                        <div class="position-relative d-flex align-items-start">
                                                            <input type="text" name="comment"
                                                                class="form-control chat-input" placeholder="Yorum yap..">
                                                            <input type="hidden" name="task"
                                                                value="e359a26e-e212-4a5b-927f-39017f7a41dd">
                                                            <div class="chat-input-links d-flex align-items-start">

                                                                <button type="submit" class="btn btn-primary mx-2"><i
                                                                        class="uil uil-message"></i></button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <hr class="my-4 text-muted">





                                    </div><!-- end tab pane -->
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>


                </div><!-- end card -->
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center">

                    <div class="flex-grow-1">
                        <div class="card-title d-inline"><b>Grup</b></div>

                        <!-- Scrollable modal -->
                        <button style="float: right" type="button"
                            class="btn btn-danger btn-rounded btn-sm font-size-16 " data-bs-toggle="modal"
                            data-bs-target="#exampleModalScrollable">Something <i
                                class="uil-user-plus text-white font-size-16"></i></button>


                    </div>

                </div>
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-lg-12">

                            {{-- <div class="mb-4">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div><h5 class="font-size-14 mb-0">Month</h5></div>
                                    <div class="form-check form-switch font-size-20 ms-3" onclick="check()">
                                        <input class="form-check-input" type="checkbox" id="plan-switch">
                                        <label class="form-check-label" for="plan-switch"></label>
                                    </div>
                                    <div><h5 class="font-size-14 mb-0">Annual</h5></div>
                                </div>
                            </div> --}}


                            <div class="row">



                                <div class="col-xl-3">
                                    <div class="card pricing-box">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="mb-1 font-size-20">Takvim</h5>
                                            </div>
                                            <hr class="my-4 text-muted">
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-primary w-100">Git</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xl-3">
                                    <div class="card pricing-box">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="mb-1 font-size-20">Programlar</h5>
                                            </div>
                                            <hr class="my-4 text-muted">
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-primary w-100">Git</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->


                                <div class="col-xl-3">
                                    <div class="card pricing-box">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="mb-1 font-size-20">Görevler</h5>
                                            </div>
                                            <hr class="my-4 text-muted">
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-primary w-100">Git</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xl-3">
                                    <div class="card pricing-box">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="mb-1 font-size-20">Raporlar</h5>
                                            </div>
                                            <hr class="my-4 text-muted">
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-primary w-100">Git</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->


                            </div>
                            <!-- end row -->
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/lightbox.init.js') }}"></script>
@endsection
