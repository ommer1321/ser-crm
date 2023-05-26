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

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Grup Ayarları</h5>



                    <div class="card border shadow-none mb-5">
                        <div class="card-header d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        01
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title">Genel Grup Bilgisi</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.info.grup', $grup->grup_id) }}" name="grup-settings"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div>
                                    <div class="mb-3">
                                        <label for="grup_name" class="form-label">Grup Adı</label>
                                        <input id="grup_name" name="name" type="text" class="form-control"
                                            placeholder="Grup Adını Giriniz.." value="{{ $grup->name }}">

                                        @error('name')
                                            <small class="text-danger"> {{ $message }} </small>
                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="grup_detail" class="form-label">Grup Detayı</label>
                                        <textarea class="form-control" name="details" id="projectdesc" rows="3"
                                            placeholder="Enter Project Description...">{{ $grup->details }}</textarea>

                                        @error('details')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="grup_branch" class="form-label">Branş Adı</label>
                                        <input id="grup_branch" type="text" name="branch" class="form-control"
                                            placeholder="Grup Adını Giriniz.."value="{{ $grup->branch }}">

                                        @error('branch')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="text-end m-4">
                                        <button type="submit" {{-- value="true" name="grup-settings_btn" --}}
                                            class="btn btn-primary w-sm">Güncelle</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card border shadow-none mb-5">
                        <div class="card-header d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        02
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title">Grup Üye Ayarları</h5>
                            </div>
                        </div>
                        <div class="card-body">


                            <div>
                                <div class="mb-4">
                                    <label></label>
                                    <div class="mb-3">
                                        <a href="{{ route('members.grup', $grup->grup_id) }}" class="btn btn-light w-100"
                                            type="button">
                                            Üye Eklemek İçin Tıklayınız!
                                        </a>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- end card -->

                    <form action="{{ route('update.profile-photo.grup', $grup->grup_id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card border shadow-none">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                            03
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title">Profil Fotoğrafı</h5>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3 my-4">
                                        <div class="mt-4 mt-md-0">
                                            @if ($grup->logo_path)
                                                <img class="img-thumbnail rounded-circle avatar-xl" alt="200x200"
                                                    src="{{ asset($grup->logo_path) }}" data-holder-rendered="true">
                                            @else
                                                <div class="avatar-xl">
                                                    <span
                                                        class="avatar-title rounded-circle avatar-xl  fs-1 rounded-circle img-thumbnail">
                                                        {{ $grup->first_letter }}
                                                    </span>
                                                </div>
                                            @endif


                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <input class="form-control form-control-lg" name="photo" id="formFileLg"
                                            type="file">
                                    </div>

                                </div>
                            </div>
                            <!-- end card -->

                            <div class="text-end m-4">
                                <button type="submit" name="profile_photo" value="true"
                                    class="btn btn-primary w-sm">Güncelle</button>
                    </form>

                    <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                        data-bs-target="#kapatBackdrop">

                        Profile Fotoğrafını Kaldır</button>
                </div>

                <!-- end form -->
            </div>


            <!-- end card body -->


            <div class="card border shadow-none mb-5">
                <div class="card-header d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                04
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title">Grup Durum Ayarları</h5>
                    </div>
                </div>
                <div class="card-body">


                    <div>
                        <div class="mb-4">
                            <label></label>
                            <div class="mb-3">



                                <!-- Button trigger modal -->
                                <button style="float: right;" type="button" class="btn btn-danger mx-2 "
                                    data-bs-toggle="modal" data-bs-target="#kapatBackdrop">

                                    Grubu Tamamen Kapat</button>
                                <!-- Button trigger modal -->
                                <button style="float: right;" type="button" class="btn btn-warning "
                                    data-bs-toggle="modal" data-bs-target="#pasifBackdrop">
                                    Grubu Pasif Yap
                                </button>

                                <!-- KapatBackdrop Modal -->
                                <div class="modal fade" id="kapatBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Grubu Kapat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <!-- end modalheader -->
                                            <div class="modal-body">
                                                <p>Bu Grubu Tamamen
                                                    Kapatmak istediğinize eminmisiniz ?<br>İşlem geri alınamaz ve
                                                    tüm veriler
                                                    silinecektir <span
                                                        class=" d-inline text-primary">Onaylıyormusunuz</span> ?
                                                </p>
                                            </div>
                                            <!-- end modalbody -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">İptal</button>
                                                <button type="button" class="btn btn-primary">Onayla</button>
                                            </div>
                                            <!-- end modalfooter -->
                                        </div>
                                    </div>
                                </div><!-- end modal -->





                                <!-- PasifBackdrop Modal -->
                                <div class="modal fade" id="pasifBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Grubu Pasife Yap
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <!-- end modalheader -->
                                            <div class="modal-body">
                                                <p>Bu grubu pasif yaparsanız sadece grubu siz göreceksiniz diğer
                                                    katılımcılar göremiyecek ve veriler
                                                    silinmeyecektir <span
                                                        class=" d-inline text-primary">Onaylıyormusunuz</span> ?
                                                </p>
                                            </div>
                                            <!-- end modalbody -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">İptal</button>
                                                <button type="button" class="btn btn-primary">Onayla</button>
                                            </div>
                                            <!-- end modalfooter -->
                                        </div>
                                    </div>
                                </div><!-- end modal -->
                            </div>


                        </div>
                    </div>


                </div>
            </div>
            <!-- end card -->

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
