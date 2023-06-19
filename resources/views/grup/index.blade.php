@extends('layouts.app')

@section('css')
    <!-- plugin css -->
    <link href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">

    <!-- One of the following themes -->
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/classic.min.css') }}" />
    <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
    <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}" /> <!-- 'nano' theme -->
    <link rel="stylesheet" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}" /> <!-- 'nano' theme -->
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
                                    <h5 class="mb-1"></h5>
                                    <p class="text-muted mb-0">
                                    <h5 class="font-size-16"><button type="button"
                                            class="btn btn-primary btn-rounded btn-sm font-size-16 " data-bs-toggle="modal"
                                            data-bs-target="#exampleModalScrollable">Üyeler
                                            {{ $grup->members_count }}</button></h5>
                                    </p>
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


        {{-- Part-2  --}}





        <div class="col-xxl-9 col-lg-8">


            {{--  --}}
            <div class="card-body">
                <div>



                    <form action="{{ route('store.news.grup', $grup->grup_id) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf


                        <input type="hidden" name="user_name" value="{{ Auth::user()->user_name }}">
                        <!-- First modal dialog -->
                        <div class="modal fade" id="firstmodal" tabindex="-1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Başlık ve Yazı Ekle</h5>
                                        <a class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                                    </div>
                                    <!-- end modalheader -->


                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-3 col-form-label">Başlık:
                                            </label>
                                            <div class="col-md-9">
                                                <div class="form-floating">
                                                    <input type="text" name="title" value="{{ old('title') }}"
                                                        class="form-control chat-input" placeholder="Başlık Giriniz..">
                                                    @error('title')
                                                        <small class="text-danger"> {{ $message }} </small>
                                                    @enderror

                                                    <label for="floatingTextarea2">Buraya Yaz..</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Yazı:
                                            </label>
                                            <div class="col-md-9">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                                                        style="height: 100px">{{ old('note') }}</textarea>
                                                    <label for="floatingTextarea2">Buraya Yaz..</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">


                                        <!-- Toogle to second dialog -->
                                        <a class="btn btn-primary" data-bs-target="#secondmodal" data-bs-toggle="modal"
                                            data-bs-dismiss="modal">Devam et</a>
                                    </div>
                                    <!-- end modal footer -->
                                </div>
                            </div>
                        </div>


                        <!-- Second modal dialog -->
                        <div class="modal fade" id="secondmodal" tabindex="-1" aria-hidden="true"
                            style="display: none;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Görsel Ekle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div><!-- end modalheader -->

                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-3 col-form-label">Görsel:
                                            </label>
                                            <div class="col-md-9">

                                                <input class="form-control form-control-md" multiple name="photos[]"
                                                    id="formFileLg" type="file">
                                                @error('photos')
                                                    <small class="text-danger"> {{ $message }} </small>
                                                @enderror
                                                {{-- hata:basic photo --}}

                                            </div>
                                        </div>
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <!-- Toogle to first dialog -->
                                        <button style="float: left;" class="btn btn-secondary"
                                            data-bs-target="#firstmodal" data-bs-toggle="modal"
                                            data-bs-dismiss="modal">Geri</button>

                                        <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                                        <a class="btn btn-primary" data-bs-target="#thirdmodal" data-bs-toggle="modal"
                                            data-bs-dismiss="modal">Devam Et</a>
                                    </div><!-- end modalfooter -->
                                </div>
                            </div>
                        </div><!-- end modal -->


                        <!-- Third modal dialog -->
                        <div class="modal fade" id="thirdmodal" tabindex="-1" style="display: none;"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Kullanıcı Etiketle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!-- end modalheader -->

                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="card mt-2">

                                                <a class="btn btn-light" data-bs-toggle="collapse"
                                                    href="#collapseExample" aria-expanded="true"
                                                    aria-controls="collapseExample">
                                                    Kullanıcı Etiketle
                                                </a>
                                                <div class="card-body collapse " id="collapseExample" style="">
                                                    <div class="d-flex flex-wrap gap-2 align-items-start mb-3">
                                                    </div>
                                                    @if ($grupOfMembers)
                                                        <div class="card card-body mb-0">
                                                            @foreach ($grupOfMembers as $grupOfMember)
                                                                <ul class="list-unstyled chat-list">

                                                                    <li class="">
                                                                        <a href="#">
                                                                            <div class="d-flex align-items-start">

                                                                                <div class="avatar align-self-center me-3">
                                                                                    @if ($grupOfMember->profile_photo_path)
                                                                                        <div
                                                                                            class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                                            <img src="{{ asset($grupOfMember->profile_photo_path) }}"
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


                                                                                <div class="flex-grow-1 overflow-hidden">
                                                                                    <h5
                                                                                        class="text-truncate font-size-16 mb-1">
                                                                                        {{ $grupOfMember->user_name }}
                                                                                    </h5>
                                                                                    <small class=" text-truncate"
                                                                                        style="opacity: 0.8">
                                                                                        {{ $grupOfMember->name }}
                                                                                        {{ $grupOfMember->surname }}</small>
                                                                                </div>
                                                                                <div class="unread-message">

                                                                                    <div class="form-check form-switch mb-2"
                                                                                        dir="ltr">
                                                                                        <input type="checkbox"
                                                                                            class="form-check-input"
                                                                                            name="tagged_users[]"
                                                                                            value="{{ $grupOfMember->user_id }}"
                                                                                            id="customSwitchsizesm">
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                role="alert">
                                                <i
                                                    class="uil-minus-circle
                                            text-primary font-size-16 me-2"></i>
                                                Ekleyecek Arkadaşınız Kalmadı
                                            </div>
                                            @endif



                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Toogle to first dialog -->
                                        <a style="float: left;" class="btn btn-secondary" data-bs-target="#secondmodal"
                                            data-bs-toggle="modal" data-bs-dismiss="modal">Geri</a>

                                        <a class="btn btn-primary" data-bs-target="#fourmodal" data-bs-toggle="modal"
                                            data-bs-dismiss="modal">Devam et</a>
                                    </div>
                                    <!-- end modal footer -->
                                </div>
                            </div>
                        </div>




                        <!-- Four modal dialog -->
                        <div class="modal fade" id="fourmodal" tabindex="-1" style="display: none;"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-titlef">Etiket Ekle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!-- end modalheader -->
                                    <div class="modal-body">
                                        {{-- <input type="text" name="title" class="form-control chat-input"
                                            placeholder="Başlık Giriniz.."> --}}
                                        Şimdilik Burası Boş
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Toogle to first dialog -->
                                        <a style="float: left;" class="btn btn-secondary" data-bs-target="#thirdmodal"
                                            data-bs-toggle="modal" data-bs-dismiss="modal">Geri</a>
                                        <!-- Toogle to save dialog -->
                                        <button class="btn btn-success" type="submit">Kaydet</button>
                                    </div>
                                    <!-- end modal footer -->
                                </div>
                            </div>
                        </div>

                </div> <!-- end preview-->
            </div>


            </form>

            {{--  --}}


            {{--  Gönderi - Modal --}}

            <div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModalTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newPostModalTitle">
                                Gönderi Oluştur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">

                            {{-- 
                            <form action="" method="post">

                            


                            <input type="hidden" name="grup" value="{{ $grup->grup_id }}">
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Başlık</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title') }}" id="horizontal-firstname-input"
                                        placeholder="Başlık Giriniz..">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div><!-- end row -->
                        </form> --}}


                        </div>
                        <!-- end modalbody -->
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button> --}}
                            <button type="button" class="btn btn-primary">Tamam</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            {{-- Üyeler - Modal --}}

            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                Üyeler</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($grupOfMembers)
                                @foreach ($grupOfMembers as $grupOfMember)
                                    <ul class="list-unstyled chat-list">

                                        <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">

                                                    <div class="avatar align-self-center me-3">




                                                        @if ($grupOfMember->profile_photo_path)
                                                            <div
                                                                class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                <img src="{{ asset($grupOfMember->profile_photo_path) }}"
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
                                                            {{ $grupOfMember->user_name }}
                                                        </h5>
                                                        <small class=" text-truncate" style="opacity: 0.8">
                                                            {{ $grupOfMember->name }} {{ $grupOfMember->surname }}</small>
                                                    </div>


                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <div class="alert alert-primary alert-outline alert-dismissible fade show" role="alert">
                                    <i
                                        class="uil-minus-circle
                                text-primary font-size-16 me-2"></i>
                                    Ekleyecek Arkadaşınız Kalmadı
                                </div>
                            @endif

                        </div>
                        <!-- end modalbody -->
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button> --}}
                            <button type="button" class="btn btn-primary">Tamam</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            {{-- Üyeler - Modal --}}

            @role('teacher')
                {{--  Task Ekle Modal --}}
                <div class="modal fade" id="task-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Not Oluştur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>


                            <form action="{{ route('store.task') }}" method="post">
                                @csrf
                                <!-- end modalheader -->
                                <div class="modal-body">

                                    <input type="hidden" name="grup" value="{{ $grup->grup_id }}">
                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Başlık</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}" id="horizontal-firstname-input"
                                                placeholder="Başlık Giriniz..">
                                            @error('title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div><!-- end row -->

                                    <div class="row mb-4 mt-3 mt-xl-0">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Son
                                            Tarih</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="finished_at" type="date"
                                                value="{{ old('finished_at') }}" id="example-date-input">
                                            @error('finished_at')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Not
                                            Önemi</label>
                                        <div class="col-md-9">
                                            <select class="form-select" value="{{ old('status') }}" name="status">
                                                <option value="red">Kırmızı</option>
                                                <option value="yellow">Sarı</option>
                                                <option value="green">Yeşil</option>
                                            </select>
                                            @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Notunuz:
                                        </label>
                                        <div class="col-md-9">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                                                    style="height: 100px">{{ old('note') }}</textarea>
                                                <label for="floatingTextarea2">Buraya Yaz..</label>
                                                @error('note')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <a class="btn btn-light collapsed" data-bs-toggle="collapse" href="#collapseExample"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            Kullanıcı Etiketle
                                        </a>
                                        <div class="card-body collapse" id="collapseExample">
                                            <div class="d-flex flex-wrap gap-2 align-items-start mb-3">


                                            </div>

                                            <div class="card card-body mb-0">
                                                @foreach ($grupOfMembers as $grupOfMember)
                                                    <ul class="list-unstyled chat-list">

                                                        <li class="">
                                                            <a href="#">
                                                                <div class="d-flex align-items-start">

                                                                    <div class="avatar align-self-center me-3">




                                                                        @if ($grupOfMember->profile_photo_path)
                                                                            <div
                                                                                class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                                <img src="{{ asset($grupOfMember->profile_photo_path) }}"
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


                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="text-truncate font-size-16 mb-1">
                                                                            {{ $grupOfMember->user_name }}
                                                                        </h5>
                                                                        <small class=" text-truncate" style="opacity: 0.8">
                                                                            {{ $grupOfMember->name }}
                                                                            {{ $grupOfMember->surname }}</small>
                                                                    </div>


                                                                    <div class="unread-message">






                                                                        <div class="form-check form-switch mb-2"
                                                                            dir="ltr">
                                                                            <input type="checkbox" class="form-check-input"
                                                                                name="user[]"
                                                                                value="{{ $grupOfMember->user_id }}"
                                                                                id="customSwitchsizesm">
                                                                        </div>




                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                <a class="btn btn-primary collapsed" data-bs-toggle="collapse"
                                                    href="#collapseExample" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    Tamam
                                                </a>
                                            </div>

                                        </div><!-- end card body -->
                                    </div><!-- end card -->


                                </div>
                                <!-- end modalbody -->
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Oluştur">
                                </div>
                                <!-- end modalfooter -->
                            </form>



                        </div>
                    </div>
                </div>

                {{--  Task Ekle Modal --}}
            @endrole


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
                                            <span class="d-none d-sm-block">Tasklarınız </span>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item mx-2">
                                        <a class="nav-link" data-bs-toggle="tab" href="#navpills2-messages"
                                            role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Tasklarım</span>
                                        </a>
                                    </li> --}}
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
                                        <div class="card">


                                            <div class="card-header ">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h4 class="text-muted">Gönderiler</h4>
                                                    </div>
                                                    <div class="col-6">
                                                        <button type="button" style="float: right"
                                                            class="btn btn-soft-primary btn-rounded btn-sm "
                                                            data-bs-toggle="modal" data-bs-target="#firstmodal">Gönderi
                                                            Oluştur</button>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card-body">



                                                @if ($news && count($news) > 0)
                                                    @foreach ($news as $new)
                                                        {{-- Üyeler - Modal --}}


                                                        <div class="modal fade" id="news{{ $new->news_uuid }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="12345pTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="12345pTitle">
                                                                            Yorumlar</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        @if (count($new->news_comments) > 0)
                                                                            @foreach ($new->news_comments as $news_comment)
                                                                                <div class="simplebar-content"
                                                                                    style="padding: 0px 24px;">
                                                                                    <div class="border-bottom py-3">
                                                                                        <div class="dropdown "
                                                                                            style="float: right">
                                                                                            {{ $news_comment->updated_at->diffForHumans() }}
                                                                                            {{-- <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                                        href="#" role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-expanded="false">
                                                                                        <i
                                                                                            class="mdi mdi-chevron-down ms-1"></i>
                                                                                    </a>

                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        style="">
                                                                                        <form
                                                                                            action=""
                                                                                            method="post">
                                                                                            <input type="hidden"
                                                                                                name="_token"
                                                                                                value="">
                                                                                            <input type="hidden"
                                                                                                name="comment"
                                                                                                value="">
                                                                                           
                                                                                            <li><input type="submit"
                                                                                                    class="dropdown-item"
                                                                                                    value="Sil">
                                                                                            </li>
                                                                                        </form>
                                                                                    </ul> --}}
                                                                                        </div>
                                                                                        <div
                                                                                            class="d-flex align-items-center mb-3">

                                                                                            @if ($news_comment->who_comment_user->profile_photo_path)
                                                                                                <div
                                                                                                    class="avatar align-self-center me-3">
                                                                                                    <div
                                                                                                        class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                                                        <img src="{{ asset($news_comment->who_comment_user->profile_photo_path) }}"
                                                                                                            class="rounded-circle avatar-sm"
                                                                                                            alt="">
                                                                                                    </div>
                                                                                                </div>
                                                                                            @else
                                                                                                <div class="avatar mx-2 ">
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


                                                                                            <div class="flex-1">
                                                                                                <h5
                                                                                                    class="font-size-15 mb-1">
                                                                                                    @if ($news_comment->who_comment_user->id == auth()->user()->id)
                                                                                                        Sen
                                                                                                    @else
                                                                                                        {{ $news_comment->who_comment_user->name }}
                                                                                                    @endif
                                                                                                </h5>
                                                                                                <a href="javascript: void(0);"
                                                                                                    class="badge bg-soft-success text-success font-size-11">{{ $news_comment->who_comment_user->user_name }}</a>
                                                                                            </div>
                                                                                        </div>


                                                                                        <p class="text-muted mb-4">

                                                                                            {{ $news_comment->comment }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div class="alert alert-primary"> <i
                                                                                    class="uil-comment mx-2 font-size-18"></i>Henüz
                                                                                Yorum Yok</div>
                                                                        @endif

                                                                    </div>





                                                                    <!-- end modalbody -->
                                                                    <div class="modal-footer">
                                                                        <div class="border rounded m-2 w-100  ">
                                                                            <div
                                                                                class="d-flex chat-input-section align-items-start p-1">

                                                                                <div class="flex-grow-1">


                                                                                    <form
                                                                                        action="{{ route('store.comment.news.grup', $grup->grup_id) }}"
                                                                                        method="post">
                                                                                        @csrf

                                                                                        <div
                                                                                            class="position-relative d-flex align-items-start">
                                                                                            <input type="text"
                                                                                                name="comment"
                                                                                                class="form-control chat-input"
                                                                                                placeholder="Yorum yap..">
                                                                                            <input type="hidden"
                                                                                                name="grup"
                                                                                                value="{{ $grup->grup_id }}">
                                                                                            <input type="hidden"
                                                                                                name="grup_news"
                                                                                                value="{{ $new->news_uuid }}">
                                                                                            {{-- <input type="hidden" name="grup_news"
                                                                                        value="{{ $new->news_uuid }}"> --}}
                                                                                            <div
                                                                                                class="chat-input-links d-flex align-items-start">

                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary mx-2"><i
                                                                                                        class="uil uil-message"></i></button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </form>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div>
                                                        {{-- Üyeler Modal End --}}





                                                        <div class="d-flex align-items-start mb-4 mt-5">
                                                            @if ($new->posted_user->profile_photo_path)
                                                                <div class="avatar align-self-center me-3">
                                                                    <img src=" {{ asset($new->posted_user->profile_photo_path) }}"
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


                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="font-size-15 mb-1 text-truncate"><a
                                                                        href="pages-profile.html"
                                                                        class="text-dark">{{ $new->posted_user->user_name }}</a>
                                                                </h5>

                                                                <span class="text-mute mb-0">
                                                                    {{ $new->updated_at->diffForHumans() }}</span>



                                                            </div>




                                                            <div class="flex-shrink-0 dropdown">
                                                                <a class="text-body dropdown-toggle font-size-16"
                                                                    href="#" role="button"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-more-horizontal icon-xs">
                                                                        <circle cx="12" cy="12"
                                                                            r="1">
                                                                        </circle>
                                                                        <circle cx="19" cy="12"
                                                                            r="1">
                                                                        </circle>
                                                                        <circle cx="5" cy="12"
                                                                            r="1">
                                                                        </circle>
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
                                                            <a href="#"
                                                                class="text-dark lh-base"><b>{{ $new->title }}sadsa</b></a>
                                                        </h5>

                                                        <p class="mb-0">{{ $new->note }}</p>

                                                        {{-- <div class="mt-2">
                                                    <span class="badge badge-soft-danger ">Full Stack </span>
                                                    <span class="badge badge-soft-danger ">Full </span>
                                                    <span class="badge badge-soft-danger ">Full Developer</span>
                                                    <span class="badge badge-soft-danger ">Full Stack Developer</span>
                                                    <span class="badge badge-soft-danger ">Full Stack Developer</span>
                                                    <span class="badge badge-soft-danger ">Full Stack Developer</span>
                                                    <span class="badge badge-soft-danger ">Full Stack Developer</span>
                                                </div> --}}
                                                        <div class="col-12  my-1 ">

                                                            <div class="card-body">
                                                                <div class="row">

                                                                    @if ($new->images_paths)
                                                                        @foreach ($new->images_paths as $image)
                                                                            <div class="col-4 mt-2">
                                                                                <div>
                                                                                    <a href="{{ asset($image) }}"
                                                                                        class="thumb preview-thumb image-popup-desc "
                                                                                        data-title="{{ $new->title }}"
                                                                                        data-description="{{ $new->note }}">
                                                                                        <img src="{{ asset($image) }}"
                                                                                            class="img-fluid"
                                                                                            alt="work-thumbnail">
                                                                                    </a>
                                                                                </div>
                                                                            </div><!-- end col -->
                                                                        @endforeach
                                                                    @endif

                                                                </div><!-- end row -->
                                                            </div>

                                                        </div> <!-- end col -->


                                                        <ul class="list-inline product-review-link  mt-3">
                                                            <li class="list-inline-item">
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title=""
                                                                    data-bs-original-title="Beğen"><i
                                                                        class="bx bx-like"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title=""
                                                                    data-bs-original-title="Yorum Yap"><i
                                                                        class="bx bx-comment-dots"></i></a>
                                                            </li>
                                                            <li style="float: right" class="list-inline-item">
                                                                @if (count($new->news_comments) > 0)
                                                                    <span style="float:right;"
                                                                        class=" badge badge-soft-primary ">
                                                                        {{ count($new->news_comments) }} Yorum Var</span>
                                                                @else
                                                                    <span style="float:right;"
                                                                        class=" badge badge-soft-primary ">
                                                                        Yorum Yok</span>
                                                                @endif
                                                            </li>
                                                        </ul>

                                                        {{-- <hr class="my-2 text-muted"> --}}

                                                        <div class="card border border-0">

                                                            <button style="float: right" type="button"
                                                                class="btn btn-primary btn-rounded btn-sm font-size-16 "
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#news{{ $new->news_uuid }}"><span
                                                                    class="align-middle">Yorum Yap </span><i
                                                                    class="far fa-comments align-middle mt-1  text-white font-size-18"></i>
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                        role="alert">
                                                        <i
                                                            class="uil-minus-circle
                    text-primary font-size-16 me-2"></i>
                                                        Post Bulunmamakta
                                                    </div>
                                                @endif

                                            </div>
                                        </div>

                                    </div> <!-- end tab pane -->

                                    <div class="tab-pane" id="navpills2-profile" role="tabpanel">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-header d-flex align-items-center">

                                                        <div class="flex-grow-1">
                                                            <div class="card-title d-inline">
                                                                
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <h4 class="text-muted">Tasklarınız</h4>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        @role('student')
                                                                        @if ($tasks)
                                                                            <button
                                                                                class="btn btn-soft-primary btn-rounded collapsed btn-sm"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target=".multi-collapse"
                                                                                aria-expanded="false"
                                                                                aria-controls="multiCollapseExample1 multiCollapseExample2"
                                                                                style="float: right;">Görünümü Değiştir</button>
                                                                        @endif
                                                                    @endrole
                                                                    @role('teacher')
                                                                    <!-- Scrollable modal -->
                                                                    <button style="float: right" type="button"
                                                                        class="btn btn-soft-primary btn-rounded collapsed btn-sm"
                                                                        data-bs-toggle="modal" data-bs-target="#task-create">Task
                                                                        Ekle
                                                                    </button>
                                                                @endrole
                                                                </div>
                                                                </div>

                                                          
                                                            </div>


                                                      
                                                        </div>

                                                    </div>
                                                    <div class="card-body">

                                                        @role('student')
                                                            @if ($tasks)
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="multi-collapse collapse show"
                                                                            id="multiCollapseExample1" style="">
                                                                            <div class="card card-body mb-0">

                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-xl-12">
                                                                                        <div
                                                                                            class="timeline-sec timeline-vertical">
                                                                                            <div class="wrapper">
                                                                                                <div class="timeline-main">

                                                                                                    <div class="timeline-row">



                                                                                                        @foreach ($tasks as $task)
                                                                                                            <div
                                                                                                                class="timeline-box ">
                                                                                                                <div
                                                                                                                    class="timeline-date bg-soft-{{ $task->status_color }} border-{{ $task->status_color }} ">
                                                                                                                    <div
                                                                                                                        class="date text-center ">
                                                                                                                        <h3
                                                                                                                            class="mb-1 text-{{ $task->status_color }} font-size-20 ">
                                                                                                                            {{ $task->first_letter }}
                                                                                                                        </h3>
                                                                                                                        <p
                                                                                                                            class="mb-0 d-none d-md-block  text-{{ $task->status_color }}">
                                                                                                                            {{ $task->date_counter }}
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="timeline-content ">
                                                                                                                    <h3
                                                                                                                        class="font-size-18  ">
                                                                                                                        {{ $task->title }}
                                                                                                                        <span
                                                                                                                            style="float:right;"
                                                                                                                            class=" badge badge-soft-{{ $task->status_color }} ">{{ $task->status_tr }}</span>
                                                                                                                    </h3>
                                                                                                                    <p
                                                                                                                        class="text-muted mb-0 mt-2 pt-1">
                                                                                                                        {{ $task->note }}
                                                                                                                    </p>
                                                                                                                    <a href="{{ route('details.task', $task->task_id) }}"
                                                                                                                        class="btn btn-{{ $task->status_color }} btn-rounded waves-effect waves-light mt-4">Git
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endforeach



                                                                                                        <div
                                                                                                            class="horizontal-line">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="verticle-line">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="corner top">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="corner bottom">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="timeline-row">
                                                                                                        <div
                                                                                                            class="timeline-box">

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div><!-- end col -->
                                                                    <div class="col-12">
                                                                        <div class="multi-collapse collapse"
                                                                            id="multiCollapseExample2" style="">

                                                                            @if ($tasks)
                                                                                <div class="accordion" id="accordionExample">

                                                                                    {{--  --}}

                                                                                    @foreach ($tasks as $task)
                                                                                        <div class="accordion-item">
                                                                                            <h2 class="accordion-header"
                                                                                                id="{{ $task->id }}">
                                                                                                <button
                                                                                                    class="accordion-button fw-medium collapsed"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="collapse"
                                                                                                    data-bs-target="#task-{{ $task->id }}"
                                                                                                    aria-expanded="false"
                                                                                                    aria-controls="collapseOne">

                                                                                                    <a href="{{ route('details.task', $task->task_id) }}"
                                                                                                        class="d-block mx-3"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-placement="top"
                                                                                                        title="">
                                                                                                        <div class="avatar">
                                                                                                            <div
                                                                                                                class="avatar-title rounded-circle bg-{{ $task->status_color }} ">
                                                                                                                {{ $task->first_letter }}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </a>
                                                                                                    <strong
                                                                                                        class="d-block  text-muted ">{{ $task->title }}</strong>

                                                                                                </button>

                                                                                            </h2>
                                                                                            <div id="task-{{ $task->id }}"
                                                                                                class="accordion-collapse collapse"
                                                                                                aria-labelledby="{{ $task->id }}"
                                                                                                data-bs-parent="#accordionExample"
                                                                                                style="">
                                                                                                <div class="accordion-body">


                                                                                                    <div
                                                                                                        class="d-flex align-items-start">

                                                                                                        <div
                                                                                                            class="flex-grow-1 overflow-hidden mx-2">
                                                                                                            <span
                                                                                                                class="badge badge-soft-{{ $task->status_color }} my-1">{{ $task->status_tr }}</span>
                                                                                                            <span
                                                                                                                style="float:right;"
                                                                                                                class="text-muted">{{ $task->date_counter }}</span>
                                                                                                            {{-- <strong class="d-block">This is the second item's accordion body.</strong>  --}}
                                                                                                            <small
                                                                                                                class="mt-2 text-muted d-block">{{ $task->note }}</small>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach

                                                                                    {{--  --}}
                                                                                </div>
                                                                            @else
                                                                                <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                                                    role="alert">
                                                                                    <i
                                                                                        class="uil-minus-circle
                                                                 text-primary font-size-16 me-2"></i>
                                                                                    Etiketli Olduğunuz Task Yok
                                                                                </div>
                                                                            @endif


                                                                        </div>
                                                                    </div><!-- end col -->
                                                                </div>
                                                            @else
                                                                <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                                    role="alert">
                                                                    <i
                                                                        class="uil-minus-circle
                                    text-primary font-size-16 me-2"></i>
                                                                    Henüz Task Yok
                                                                </div>
                                                            @endif
                                                        @endrole


                                                        @role('teacher')
                                                            @if (count($mySharedTasks) > 0)
                                                                <div class="accordion" id="accordionExample">

                                                                    {{--  --}}

                                                                    @foreach ($mySharedTasks as $mySharedTask)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="{{ $mySharedTask->id }}">
                                                                                <button
                                                                                    class="accordion-button fw-medium collapsed"
                                                                                    type="button" data-bs-toggle="collapse"
                                                                                    data-bs-target="#task-{{ $mySharedTask->id }}"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapseOne">

                                                                                    <a href="{{ route('details.task', $mySharedTask->task_id) }}"
                                                                                        class="d-block mx-3"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-placement="top" title="">
                                                                                        <div class="avatar">
                                                                                            <div
                                                                                                class="avatar-title rounded-circle bg-{{ $mySharedTask->status_color }} ">
                                                                                                {{ $mySharedTask->first_letter }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <strong
                                                                                        class="d-block  text-muted ">{{ $mySharedTask->title }}</strong>

                                                                                </button>

                                                                            </h2>
                                                                            <div id="task-{{ $mySharedTask->id }}"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="{{ $mySharedTask->id }}"
                                                                                data-bs-parent="#accordionExample"
                                                                                style="">
                                                                                <div class="accordion-body">


                                                                                    <div class="d-flex align-items-start">

                                                                                        <div
                                                                                            class="flex-grow-1 overflow-hidden mx-2">
                                                                                            <span
                                                                                                class="badge badge-soft-{{ $mySharedTask->status_color }} my-1">{{ $mySharedTask->status_tr }}</span>
                                                                                            <span style="float:right;"
                                                                                                class="text-muted">{{ $mySharedTask->date_counter }}</span>
                                                                                            {{-- <strong class="d-block">This is the second item's accordion body.</strong>  --}}
                                                                                            <small
                                                                                                class="mt-2 text-muted d-block">{{ $mySharedTask->note }}</small>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

                                                                    {{--  --}}
                                                                </div>
                                                            @else
                                                                <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                                    role="alert">
                                                                    <i
                                                                        class="uil-minus-circle
                                            text-primary font-size-16 me-2"></i>
                                                                    Bu Grupta Hiç Task Paylaşmadınız
                                                                </div>
                                                            @endif
                                                        @endrole
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->

                                    </div> <!-- end tab pane -->



                                    {{--   
    burada tasklar bulunmakta ihtiyac oldugu zaman tabı kullanabilirsin
    
                                    <div class="tab-pane" id="navpills2-messages" role="tabpanel">
                                        <div class="card-header d-flex align-items-center">

                                            <div class="flex-grow-1">
                                                <div class="card-title d-inline"><b>Tasklarınız</b></div>
                                                @role('teacher')
                                                    <!-- Scrollable modal -->
                                                    <button style="float: right" type="button"
                                                        class="btn btn-primary btn-rounded btn-sm font-size-16 "
                                                        data-bs-toggle="modal" data-bs-target="#task-create">Task Ekle
                                                    </button>
                                                @endrole
                                            </div>

                                        </div>
                                        @if ($tasks)
                                            <div class="accordion" id="accordionExample">

                                           

                                                @foreach ($tasks as $task)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="{{ $task->id }}">
                                                            <button class="accordion-button fw-medium collapsed"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#task-{{ $task->id }}"
                                                                aria-expanded="false" aria-controls="collapseOne">

                                                                <a href="{{ route('details.task', $task->task_id) }}"
                                                                    class="d-block mx-3" data-bs-toggle="tooltip"
                                                                    data-placement="top" title="">
                                                                    <div class="avatar">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-{{ $task->status_color }} ">
                                                                            {{ $task->first_letter }}
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <strong
                                                                    class="d-block  text-muted ">{{ $task->title }}</strong>

                                                            </button>

                                                        </h2>
                                                        <div id="task-{{ $task->id }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="{{ $task->id }}"
                                                            data-bs-parent="#accordionExample" style="">
                                                            <div class="accordion-body">


                                                                <div class="d-flex align-items-start">

                                                                    <div class="flex-grow-1 overflow-hidden mx-2">
                                                                        <span
                                                                            class="badge badge-soft-{{ $task->status_color }} my-1">{{ $task->status_tr }}</span>
                                                                        <span style="float:right;"
                                                                            class="text-muted">{{ $task->date_counter }}</span>
                                                                       
                                                                        <small
                                                                            class="mt-2 text-muted d-block">{{ $task->note }}</small>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                        
                                            </div>
                                        @else
                                            <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                role="alert">
                                                <i
                                                    class="uil-minus-circle
                                            text-primary font-size-16 me-2"></i>
                                                Etiketli Olduğunuz Task Yok
                                            </div>
                                        @endif

                                    </div> <!-- end tab pane -->
 --}}




                                    <div class="tab-pane" id="navpills2-settings" role="tabpanel">



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
                    <button style="float: right" type="button" class="btn btn-danger btn-rounded btn-sm font-size-16 "
                        data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">Something <i
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
    <!-- plugins -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Modern colorpicker bundle -->
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/lightbox.init.js') }}"></script>
@endsection
