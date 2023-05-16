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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Grup Ayarları</h5>

                    <form action="{{ route('update.grup', $grup->grup_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

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



                                </div>
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
                                            <button class="btn btn-light w-100" type="button" data-bs-toggle="modal"
                                                data-bs-target="#selectmembermodal">
                                                Üye Eklemek İçin Tıklayınız!
                                            </button>
                                        </div>
        
                                        <!-- Modal -->
                                        <div class="modal fade" id="selectmembermodal" tabindex="-1"
                                            aria-labelledby="selectmembermodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="selectmembermodalLabel">Üyeleri Seçiniz</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
        
        
        
                                                        <div data-simplebar style="max-height: 200px;">
        
        
                                                            <div>
        
        
                                                                <ul class="list-group list-group-flush contact-list">
                                                                    @error('user')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                    @foreach ($users as $user)
                                                                        <li class="list-group-item">
        
                                                                            <div class="avatar-group-item">
                                                                                <a href="javascript: void(0);" class=""
                                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                                    title="Janna Johnson">
                                                                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                                                                        alt=""
                                                                                        class="rounded-circle avatar-sm">
                                                                                </a>
        
        
        
                                                                                <label class="form-check-label mx-2"
                                                                                    for="memberCheck1">
                                                                                    {{ $user->name }}
                                                                                </label>
        
        
                                                                                <input class="form-check-input   mt-2"
                                                                                    name="user[]" type="checkbox"
                                                                                    value="{{ $user->user_id }}"
                                                                                    id="memberCheck1">
                                                                            </div>
        
                                                                        </li>
                                                                    @endforeach
        
        
                                                                </ul><!-- end ul -->
                                                            </div>
        
        
        
        
                                                        </div>
                                                        <!-- end simplebar -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light w-sm"
                                                            data-bs-dismiss="modal">Tamamla</button>
        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </div>
                                </div>




                                {{-- <div>
                                    <div class="mb-4">
                                        <label></label>
                                        <div class="mb-3">
                                            <button class="btn btn-light w-100" type="button" data-bs-toggle="modal"
                                                data-bs-target="#selectmembermodal">
                                                Üye Eklemek İçin Tıklayınız!
                                            </button>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="selectmembermodal" tabindex="-1"
                                            aria-labelledby="selectmembermodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="selectmembermodalLabel">Üyeleri
                                                            Seçiniz</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">



                                                        <div data-simplebar style="max-height: 200px;">
                                                            <div>
                                                                <div class="p-3 fw-semibold font-size-12 text-muted">
                                                                    A
                                                                </div>

                                                                <ul class="list-group list-group-flush contact-list">
                                                                    <li class="list-group-item">


                                                                        <div class="avatar-group-item">
                                                                            <a href="javascript: void(0);" class=""
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Janna Johnson">
                                                                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle avatar-sm">
                                                                            </a>



                                                                            <label class="form-check-label mx-2"
                                                                                for="memberCheck1">
                                                                                Janna Johnson
                                                                            </label>

                                                                            <input class="form-check-input   mt-2"
                                                                                type="checkbox" value=""
                                                                                id="memberCheck1">


                                                                        </div>

                                                                    </li>

                                                                    <li class="list-group-item">


                                                                        <div class="avatar-group-item">
                                                                            <a href="javascript: void(0);" class=""
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Janna Johnson">
                                                                                <img src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle avatar-sm">
                                                                            </a>



                                                                            <label class="form-check-label mx-2"
                                                                                for="memberCheck1">
                                                                                Janna Johnson
                                                                            </label>

                                                                            <input class="form-check-input   mt-2"
                                                                                type="checkbox" value=""
                                                                                id="memberCheck1">


                                                                        </div>

                                                                    </li>
                                                                </ul><!-- end ul -->
                                                            </div>

                                                            <div>
                                                                <div class="p-3 fw-semibold font-size-12 text-muted">
                                                                    B
                                                                </div>

                                                                <ul class="list-group list-group-flush contact-list">
                                                                    <li class="list-group-item">


                                                                        <div class="avatar-group-item">
                                                                            <a href="javascript: void(0);" class=""
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Janna Johnson">
                                                                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle avatar-sm">
                                                                            </a>



                                                                            <label class="form-check-label mx-2"
                                                                                for="memberCheck1">
                                                                                Janna Johnson
                                                                            </label>

                                                                            <input class="form-check-input   mt-2"
                                                                                type="checkbox" value=""
                                                                                id="memberCheck1">


                                                                        </div>

                                                                    </li>
                                                                </ul><!-- end ul -->
                                                            </div>


                                                        </div>
                                                        <!-- end simplebar -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light w-sm"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary w-sm">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        <!-- end card -->

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
                                            <img class="img-thumbnail rounded-circle avatar-xl" alt="200x200"
                                                src="{{ asset($grup->logo_path) }}" data-holder-rendered="true">

                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <input class="form-control form-control-lg" id="formFileLg" type="file">
                                    </div>

                                </div>
                            </div>
                            <!-- end card -->

                            <div class="text-end m-4">
                                <button type="submit" class="btn btn-primary w-sm">Güncelle</button>
                            </div>
                    </form>
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
