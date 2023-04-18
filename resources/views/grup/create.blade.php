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
                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Attached Files">
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
                    <form>
                        <div>
                            <div class="mb-3">
                                <label for="grup_name" class="form-label">Grup Adı</label>
                                <input id="grup_name" type="text" class="form-control"
                                    placeholder="Grup Adını Giriniz..">
                            </div>

                            <div class="mb-3">
                                <label for="grup_detail" class="form-label">Grup Detayı</label>
                                <textarea class="form-control" name="grup_detail" id="projectdesc" rows="3"
                                    placeholder="Enter Project Description..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="grup_branch" class="form-label">Branş Adı</label>
                                <input id="grup_branch" type="text" class="form-control"
                                    placeholder="Grup Adını Giriniz..">
                            </div>


                        </div>
                    </form>
                </div>
                <!-- wizard-tab -->

                <div class="wizard-tab">

                    <div class="text-center mb-4">
                        <h5>Grup Üyesi Alanı</h5>
                        <p class="card-title-desc"><small><b>Üyeler Sadece Arkadaş Listenizdeki Kişiler Olabilir.</b></small></p>
                    </div>
                    <form>
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
                                                        <div class="p-3 fw-semibold font-size-12 text-muted">
                                                            A
                                                        </div>

                                                        <ul class="list-group list-group-flush contact-list">
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
                                                                            Janna Johnson
                                                                        </label>

                                                                        <input class="form-check-input   mt-2" type="checkbox"
                                                                            value="" id="memberCheck1" >
                                                             

                                                                </div>

                                                            </li>

                                                            <li class="list-group-item">


                                                                <div class="avatar-group-item">
                                                                    <a href="javascript: void(0);" class=""
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Janna Johnson">
                                                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                                                                            alt=""
                                                                            class="rounded-circle avatar-sm">
                                                                    </a>
                                                               


                                                                        <label class="form-check-label mx-2"
                                                                            for="memberCheck1">
                                                                            Janna Johnson
                                                                        </label>

                                                                        <input class="form-check-input   mt-2" type="checkbox"
                                                                            value="" id="memberCheck1" >
                                                             

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
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Janna Johnson">
                                                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                                                            alt=""
                                                                            class="rounded-circle avatar-sm">
                                                                    </a>
                                                               


                                                                        <label class="form-check-label mx-2"
                                                                            for="memberCheck1">
                                                                            Janna Johnson
                                                                        </label>

                                                                        <input class="form-check-input   mt-2" type="checkbox"
                                                                            value="" id="memberCheck1" >
                                                             

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
                        </div>
                    </form>
                </div>
                <!-- wizard-tab -->

                <div class="wizard-tab">
                    <div class="text-center mb-4">
                        <h5>Grup Profil Fotoğrafı </h5>
                         <small><b>Fotoğraf Yüklemek İsteğe Bağlıdır Grup Fotoğrafı Yok ise Otomatik Oluşur</b></small>
                    </div>
                    <form action="#" class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>

                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-light uil uil-upload-alt"></i>
                            </div>

                            <h5 class="font-size-16">Buraya Yükleyiniz</h5>
                        </div>
                    </form>
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
