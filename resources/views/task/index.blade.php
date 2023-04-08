@extends('layouts.app')

@section('title')
    Görev Ouştur
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid">



        {{-- Create Modal --}}

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Not Oluştur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>


                    <form action="{{ route('store.task') }}" method="post">
                        <!-- end modalheader -->
                        <div class="modal-body">

                            @csrf
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Başlık</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        id="horizontal-firstname-input" placeholder="Başlık Giriniz..">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div><!-- end row -->

                            <div class="row mb-4 mt-3 mt-xl-0">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Son Tarih</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="finished_at" type="date"
                                        value="{{ old('finished_at') }}" id="example-date-input">
                                    @error('finished_at')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Not Önemi</label>
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
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Notunuz: </label>
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

        {{-- Create Modal --}}


        @include('includes.alerts')

        @include('includes.errors')





        <div class="card">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-lg-auto">
                        <div class="d-flex">

                            <div class="col-auto ms-sm-auto">

                                <div class="avatar-group justify-content-sm-end">

                                    <div class="avatar-group-item">
                                        <a href="javascript: void(0);">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                    <i class="uil-corner-up-left-alt fs-5 "></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>


                                </div>
                            </div>

                            <div class="flex-grow-1 mx-2">
                                <h5 class="font-size-16 mb-1">Not Oluşturun </h5>
                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet adipiscing elit</p>
                            </div>

                        </div>




                    </div>

                    <div class="col-auto ms-sm-auto">

                        <div class="avatar-group justify-content-sm-end">

                            <div class="avatar-group-item">
                                <a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="d-block" data-bs-toggle="tooltip" data-placement="top">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                            <i class="mdi mdi-plus fs-5"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div><!-- end avatar-group -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>





        <div class="row mt-4">
            <!-- start col -->

            @foreach ($taskList as $task)
                <div class="col-xl-4 col-sm-6">
                    <div class="card border">
                        <div class="card-body">
                            <div class="">
                                <div class="dropdown float-end">
                                    <a class="text-muted dropdown-toggle font-size-16" href="{{route('details.task',$task->task_id)}}" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="bx bx-dots-vertical-rounded font-size-20"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{route('details.task',$task->task_id)}}">Göster</a>
                                        <a  class="dropdown-item" href="{{route('details.task',$task->task_id)}}#edit">Düzenle</a>

                                        <form action="{{ route('delete.task', $task->task_id) }}" name="deleteTask"
                                            method="post">
                                            @csrf
                                            @method('put')

                                            <input type="submit" name="deleteTaskButton" class="dropdown-item"
                                                value="Sil">

                                        </form>
                                    </div>
                                </div>




                                <div class="d-flex align-items-start">

                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip"
                                        data-placement="top" title=""
                                        data-bs-original-title="{{ $task->title }}">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-{{ $task->status_color }} ">
                                                {{ $task->first_letter }}
                                            </div>
                                        </div>
                                    </a>

                                    <div class="flex-grow-1 overflow-hidden mx-2">

                                        <h5 class="font-size-15 mb-1 text-truncate"><a href="javascript: void(0);"
                                                class="text-dark">{{ $task->title }} </a></h5>

                                        <span
                                            class="badge badge-soft-{{ $task->status_color }} mb-0">{{ $task->status_tr }}</span>


                                        <small class="mt-2 text-muted d-block">{{ $task->mini_note }}</small>
                                    </div>

                                </div>





                                <div class="mt-3 pt-1">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-muted font-size-13 mb-1">Kalan Süre</p>
                                        <p class="text-muted font-size-13 mb-1">{{ $task->date_counter }} Gün</p>
                                    </div>
                                    <div class="progress animated-progess custom-progress">
                                        <div class="progress-bar bg-gradient bg-{{ $task->status_color }}"
                                            role="progressbar" style="width: {{ $task->percent_time }}%"
                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="90">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <p class="mb-0 text-muted"><i class="mdi mdi-clock me-1"></i> Son Tarih:
                                        {{ $task->finished_at }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- end col -->

        </div>

    </div>
@endsection
@section('js')
@endsection
