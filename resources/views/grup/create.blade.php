@extends('layouts.app')

@section('title')
    Gruplar
@endsection

@section('css')
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('store.grup') }}" method="post" class="dropzone dz-clickable" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div>
                    <ul class="wizard-nav mb-5">
                        <li class="wizard-list-item">
                            <div class="list-item">
                                <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Basic Info">
                                    <i class="uil uil-clipboard-notes"></i>
                                </div>
                            </div>
                        </li>
                        <li class="wizard-list-item">
                            <div class="list-item">
                                <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Assignee">
                                    <i class="uil uil-users-alt"></i>
                                </div>
                            </div>
                        </li>

                        <li class="wizard-list-item">
                            <div class="list-item">
                                <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Attached Files">
                                    <i class="uil uil-paperclip"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- wizard-nav -->

                    <div class="wizard-tab">
                        <div class="text-center mb-4">
                            <h5>Grup Bilgileri</h5>
                            <p class="card-title-desc">Aşağıdaki Tüm Alanları Doldurunuz</p>
                        </div>

                        <div>
                            <div class="mb-3">
                                <label for="grup_name" class="form-label">Grup Adı</label>
                                <input id="grup_name" type="text" name="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="Grup Adını Giriniz..">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="grup_detail" class="form-label">Grup Detayı</label>
                                <textarea class="form-control" name="details" id="projectdesc" rows="3"
                                    placeholder="Enter Project Description...">{{ old('details') }}</textarea>
                                @error('details')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="grup_branch" class="form-label">Branş Adı</label>
                                <input id="grup_branch" type="text" name="branch" class="form-control"
                                    value="{{ old('branch') }}" placeholder="Grup Adını Giriniz..">
                                @error('branch')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>

                    </div>
                    <!-- wizard-tab -->

                    <div class="wizard-tab">

                        <div class="text-center mb-3">
                            <h5>Grup Üyesi Alanı <span class="text-danger">(friends db oluşturulup burası odan
                                    çekilecek)</span></h5>
                            <p class="card-title-desc">Üyeler Sadece Arkadaş Listenizdeki Kişiler Olabilir.<b></b></p>
                        </div>

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

                    </div>
                    <!-- wizard-tab -->

                    <div class="wizard-tab">
                        <div class="text-center mb-4">
                            <h5>Grup Profil Fotoğrafı </h5>
                            <p>Fotoğraf Yüklemek İsteğe Bağlıdır Grup Fotoğrafı Yok ise Otomatik Oluşur<b></b></p>
                        </div>

                        <input class="form-control form-control-lg" name="photo" id="formFileLg" type="file">

                        @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                        {{-- <div class="fallback">
                            <input name="photo" type="file"  />
                        </div>

                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-light uil uil-upload-alt"></i>
                            </div>

                            <h5 class="font-size-16">Buraya Yükleyiniz</h5>
                        </div> --}}
                        <button type="submit" class="btn btn-success  w-sm ms-auto">Kaydet</button>
                    </div>
                    <!-- wizard-tab -->

                    <div class="d-flex align-items-start gap-3 mt-4">
                        <button type="button" class="btn btn-primary w-sm" id="prevBtn"
                            onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn"
                            onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </div><!-- end card body -->

        </form>
    </div>
@endsection

@section('js')
    <!-- flatpickr js -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- dropzone plugin -->
    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>


    <!-- init js -->
    <script src="{{ asset('assets/js/pages/project-create.init.js') }} "></script>
@endsection
