@extends('layouts.app')

@section('title')
    Detay
@endsection

@section('css')
    <!-- quill css -->
    <link href="{{ asset('assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card pb-0">
                <ul class="nav nav-tabs nav-tabs-custom nav-justified project-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab">
                            <i class="bx bx-clipboard font-size-20"></i>
                            <span class="d-none d-sm-block">Not Detayları</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                            <i class="mdi mdi-clipboard-edit-outline font-size-20"></i>
                            <span class="d-none d-sm-block">Düzenle</span>
                        </a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active " id="overview" role="tabpanel">
                        <div class="card mb-0 border-0">
                            <div class="card-body">

                                @include('includes.alerts')

                                @include('includes.errors')

                                <div class="row">

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <div
                                                                class="avatar-title bg-soft-{{ $task->status_color }} rounded font-size-20 text-{{ $task->status_color }}">
                                                                <i class="bx bxs-error"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">

                                                        <p class="mb-0 text-truncate text-muted">Seviye : <span
                                                                class="text-{{ $task->status_color }}">{{ $task->status_tr }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <div
                                                                class="avatar-title bg-soft-{{ $task->status_color }} rounded font-size-20 text-{{ $task->status_color }}">
                                                                <i class="uil uil-clock-eight"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-0 text-truncate text-muted">Oluşturma Tarih</p>
                                                        <h5 class="font-size-16 mb-1">07/12/2023</h5>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <div
                                                                class="avatar-title bg-soft-{{ $task->status_color }} rounded font-size-20 text-{{ $task->status_color }}">
                                                                <i class="bx bxs-hourglass"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-14">Geri Sayım</h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">{{ $task->date_counter }} Gün</p>
                                                            </div>
                                                        </div>
                                                        <div class="progress animated-progess custom-progress">
                                                            <div class="progress-bar bg-gradient bg-{{ $task->status_color }}"
                                                                role="progressbar"
                                                                style="width: {{ $task->percent_time }}%"
                                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="90">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <div
                                                                class="avatar-title bg-soft-{{ $task->status_color }} rounded font-size-20 text-{{ $task->status_color }}">
                                                                <i class="uil uil-clock-eight"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-0 text-truncate text-muted">Son Tarih</p>
                                                        <h5 class="font-size-16 mb-1">07/12/2023</h5>

                                                    </div>
                                                </div>
                                            </div><!-- end card body-->
                                        </div><!-- end card -->
                                    </div> <!-- end col -->
                                </div>

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card h-100 mb-lg-0">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">{{ $task->title }}</h5>

                                                <div class="text-muted">
                                                    {{ $task->note }}
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-lg-4">
                                        <div class="card h-100 mb-lg-0">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Etkilenenler</h5>

                                                <div>


                                                    <div class="py-3">

                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-14">Burası Boş</h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Burası Boş</p>
                                                            </div>
                                                        </div>
                                                        {{-- User --}}

                                                        <div class="avatar-group mt-2">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-block"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="James Scott">
                                                                    <div class="avatar-sm">
                                                                        <img src="assets/images/users/avatar-2.jpg"
                                                                            alt=""
                                                                            class="img-fluid rounded-circle">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-block"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="Lynn Hackett">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title rounded-circle bg-info">
                                                                            E
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- User --}}


                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div><!-- end row -->

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end tab pane -->

                    <div class="tab-pane " id="tasks" role="tabpanel">
                        <div class="card mb-0 border-0">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h5 id="edit" class="card-title">Notu Düzenle:</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown">
                                            <a class="btn btn-link text-dark dropdown-toggle shadow-none" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="uil uil-ellipsis-h"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-end">

                                                <form action="{{ route('delete.task', $task->task_id) }}" name="deleteTask"
                                                    method="post">
                                                    {{-- sad
     --}}
                                                    @method('put')
                                                    @csrf

                                                    <li><input type="submit" name="deleteTaskButton" class="dropdown-item" value="Sil"></li>

                                                </form>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <hr>


                                <form action="{{ route('update.task', $task->task_id) }}" name="updateTask" method="post">
                                    <!-- end modalheader -->
                                    <div class="modal-body">

                                        @method('put')
                                        @csrf
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-3 col-form-label">Başlık</label>
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
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-3 col-form-label">Notunuz: </label>
                                            <div class="col-md-9">
                                                <div class="form-floating">
                                                    {{-- Ck Editör id="ckeditor-classic" --}}
                                                    <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                                                        style="height: 100px">{{ old('note') }}</textarea>

                                                    @error('note')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>





                                    </div>
                                    <!-- end modalbody -->
                                    <div class="modal-footer">
                                        <input type="submit" name="updateTaskButton" class="btn btn-primary" value="Oluştur">
                                    </div>
                                    <!-- end modalfooter -->
                                </form>




                                <!-- end cardbody -->

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end tab pane -->



                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <!-- ckeditor -->
    <script src="{{ asset('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- quill js -->
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
@endsection
