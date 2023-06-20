@extends('layouts.app')

@section('title')
    Detay
@endsection

@section('css')
    <!-- quill css -->
    <link href="{{ asset('assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-lg-12">
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


                        <div class="avatar-group justify-content-sm-end">

                            <div class="avatar-group-item">
                                <a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="d-block" data-placement="top">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                            <i class="mdi mdi-plus fs-5"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div><!-- end avatar-group -->

                    </div>




                </div>


                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end card-body-->
    </div>


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
                    @role('teacher')
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                                <i class="mdi mdi-clipboard-edit-outline font-size-20"></i>
                                <span class="d-none d-sm-block">Düzenle</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#comments" role="tab">
                                <i class="uil-comment-alt-edit font-size-20"></i>
                                <span class="d-none d-sm-block">Yorumlar</span>
                            </a>
                        </li>
                    @endrole
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
                                                        <h5 class="font-size-16 mb-1">
                                                            {{ $task->created_at->diffForHumans() }}</h5>
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
                                                                <p class="text-muted mb-0">{{ $task->date_counter }}
                                                                </p>
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


                                                    @if ($tagged_users)
                                                        <div class="avatar align-self-center me-3">

                                                            <div
                                                                class="avatar-title rounded bg-soft-{{ $task->status_color }} text-{{ $task->status_color }} font-size-24">
                                                                <i
                                                                    class="uil-pricetag-alt                                                                                    "></i>
                                                            </div>

                                                        </div>

                                                        <div class="avatar-group ">
                                                            @foreach ($tagged_users as $user)
                                                                @if ($user->profile_photo_path)
                                                                    <div class="avatar-group-item">
                                                                        <a href="javascript: void(0);" class="d-block"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title=""
                                                                            data-bs-original-title="{{ $user->name }} {{ $user->surname }}">
                                                                            <div class="avatar-sm">
                                                                                <img src="{{ asset($user->profile_photo_path) }}"
                                                                                    alt=""
                                                                                    class="img-fluid rounded-circle">
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @else
                                                                    <div class="avatar-group-item">

                                                                        <a href="javascript: void(0);" class="d-block"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title=""
                                                                            data-bs-original-title="{{ $user->name }} {{ $user->surname }}">

                                                                            <div class="avatar-sm">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-primary">
                                                                                    {{ $user->first_letter }}
                                                                                </div>
                                                                            </div>
                                                                        </a>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <a href="javascript: void(0);" class="text-body">

                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar align-self-center me-3">
                                                                    <div
                                                                        class="avatar-title rounded bg-soft-{{ $task->status_color }} text-{{ $task->status_color }} font-size-24">
                                                                        <i
                                                                            class="uil-pricetag-alt                                                                                    "></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-15 text-truncate mt-2">
                                                                        <b>Kimse Etiketli Değil</b>
                                                                    </h5>

                                                                </div>


                                                            </div>

                                                        </a>
                                                    @endif

                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->


                                </div>

                                <div class="row">



                                    <div class="col-lg-12">
                                        <div class="card h-100 mb-lg-0">
                                            <div class="card-body">

                                                @role('student|teacher|admin')
                                                    <div class="d-flex align-items-start mb-4">
                                                        <div class="flex-shrink-0 me-3">
                                                            <img class="rounded-circle avatar"
                                                                src="{{ asset($task->teacher->profile_photo_path) }}"
                                                                alt="Generic placeholder image">
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 my-1">{{ $task->teacher->name }}
                                                                {{ $task->teacher->surname }}</h5>
                                                            <small class="text-muted"><a
                                                                    href="mailto:{{ $task->teacher->email }}">
                                                                    {{ $task->teacher->email }}</a></small>
                                                        </div>
                                                    </div>
                                                @endrole
                                                <h4 class="mt-0  font-size-16">{{ $task->title }}</h4>

                                                {{-- <h5 class="card-title mb-4"></h5> --}}

                                                <div class="text-muted">
                                                    {{ $task->note }}
                                                </div>
                                                <hr>
                                                <div class="row">

                                                    <div class="col-7">


                                                        <div class="d-flex flex-wrap gap-2">

                                                            <form action="{{ route('update.answer.task') }}"
                                                                method="post">
                                                                @csrf

                                                                <input type="hidden" name="task"
                                                                    value="{{ $task->task_id }}">

                                                                    @if ($task->my_answer == 'ok')
                                                                <button type="submit" name="answer" value="ok"
                                                                    class="btn btn-sm btn-success"><i
                                                                        class="uil uil-check-circle"></i></button>

                                                                        @else
                                                                        <button type="submit" name="answer" value="ok"
                                                                        class="btn  btn-sm btn-soft-success"><i
                                                                            class="uil uil-check-circle"></i></button>
                                                                        @endif
                                                            </form>


                                                            <form action="{{ route('update.answer.task') }}"
                                                                method="post">
                                                                @csrf

                                                                <input type="hidden" name="task"
                                                                    value="{{ $task->task_id }}">

                                                                @if ($task->my_answer == 'doing')

                                                                    <button type="submit" name="answer" value="doing"
                                                                        class="btn btn-sm btn-warning"><i
                                                                            class="uil uil-exclamation-triangle"></i></button>
                                                                @else

                                                                    <button type="submit" name="answer" value="doing"
                                                                        class="btn btn-sm btn-soft-warning"><i
                                                                            class="uil uil-exclamation-triangle"></i></button>
                                                                @endif

                                                            </form>

                                                            <form action="{{ route('update.answer.task') }}"
                                                                method="post">
                                                                @csrf

                                                                <input type="hidden" name="task"
                                                                    value="{{ $task->task_id }}">

                                                                @if ($task->my_answer == 'no')
                                                                    <button type="submit" name="answer" value="no"
                                                                        class="btn btn-sm btn-danger"><i
                                                                            class="uil uil-ban"></i></button>
                                                                @else
                                                                    <button type="submit" name="answer" value="no"
                                                                        class="btn btn-sm btn-soft-danger"><i
                                                                            class="uil uil-ban"></i></button>
                                                                @endif

                                                            </form>


                                                 


                                                        </div>


                                                    </div>
                                                    <div class="col-5">
                                                     @if ($task->my_answer == 'ok')
                                                     <span class="badge bg-soft-success text-success font-size-15"
                                                     style="float: right"><i
                                                         class="uil-arrow-circle-right me-1"></i>Tamamlandı</span>
                                                     @elseif($task->my_answer == 'doing')
                                                     <span class="badge bg-soft-warning text-warning font-size-15"
                                                     style="float: right"><i
                                                         class="uil-arrow-circle-right me-1"></i>Bekliyor</span>
                                                     @elseif($task->my_answer == 'no')
                                                     <span class="badge bg-soft-danger text-danger font-size-15"
                                                     style="float: right"> <i
                                                         class="uil-arrow-circle-right me-1"></i>Yapılmadı</span>
                                                         @else
                                                         <span class="badge bg-soft-secondary text-secondary font-size-15"
                                                     style="float: right"> <i
                                                         class="uil-arrow-circle-right me-1"></i> Durum Yok</span>
                                                     @endif  
                                                       
                                                     


                                                    </div>
                                                </div>




                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->


                                    {{-- 

                                        etkilenenler

                                    <div class="col-lg-4">
                                        <div class="card h-100 mb-lg-0">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Etkilenenler</h5>

                                                <div>


                                                    <div class="py-3">
                                                        @if ($tagged_users)
                                                            <div class="avatar-group ">
                                                                @foreach ($tagged_users as $user)
                                                                    @if ($user->profile_photo_path)
                                                                        <div class="avatar-group-item">
                                                                            <a href="javascript: void(0);" class="d-block"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title=""
                                                                                data-bs-original-title="{{ $user->name }} {{ $user->surname }}">
                                                                                <div class="avatar">
                                                                                    <img src="{{ asset($user->profile_photo_path) }}"
                                                                                        alt=""
                                                                                        class="img-fluid rounded-circle">
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    @else
                                                                        <div class="avatar-group-item">

                                                                            <a href="javascript: void(0);" class="d-block"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title=""
                                                                                data-bs-original-title="{{ $user->name }} {{ $user->surname }}">

                                                                                <div class="avatar">
                                                                                    <div
                                                                                        class="avatar-title rounded-circle bg-primary">
                                                                                        {{ $user->first_letter }}
                                                                                    </div>
                                                                                </div>
                                                                            </a>

                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <div class="card border shadow-none mb-2">
                                                                <a href="javascript: void(0);" class="text-body">
                                                                    <div class="p-2">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar align-self-center me-3">
                                                                                <div
                                                                                    class="avatar-title rounded bg-soft-{{ $task->status_color }} text-{{ $task->status_color }} font-size-24">
                                                                                    <i
                                                                                        class="uil-pricetag-alt                                                                                    "></i>
                                                                                </div>
                                                                            </div>

                                                                            <div class="overflow-hidden me-auto">
                                                                                <h5
                                                                                    class="font-size-15 text-truncate mt-2">
                                                                                    <b>Kimse Etiketli Değil</b>
                                                                                </h5>

                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif


                                                    </div>
                                                  


                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end card -->
                                    </div> --}}





                                </div><!-- end row -->



                                <div class="col-12">
                                    <div class="mt-4 pt-3">
                                        {{-- <h5 class="font-size-14 mb-3">Yorumlar : </h5> --}}
                                        <div class="text-muted mb-3">
                                            <span class="badge bg-primary font-size-22 mx-2 "><i
                                                    class="far fa-comment-dots   m-2"></i>
                                            </span> <span style="float: right;" class="font-size-18 mx-3 mt-2 ">Yorum
                                                Sayısı : {{ count($activeTaskComments) }}</span>
                                        </div>
                                        <div class="border py-4 rounded">

                                            <div class="px-4" data-simplebar="init" style="max-height: 500px;">
                                                <div class="simplebar-wrapper" style="margin: 0px -24px;">
                                                    <div class="simplebar-height-auto-observer-wrapper">
                                                        <div class="simplebar-height-auto-observer"></div>
                                                    </div>
                                                    <div class="simplebar-mask">
                                                        <div class="simplebar-offset" style="right: -20px; bottom: 0px;">
                                                            <div class="simplebar-content-wrapper"
                                                                style="height: auto; overflow: hidden scroll; padding-right: 20px; padding-bottom: 0px;">
                                                                <div class="simplebar-content" style="padding: 0px 24px;">

                                                                    {{-- Comment Form Forech --}}
                                                                    @if (count($activeTaskComments) > 0)
                                                                        @foreach ($activeTaskComments as $comment)
                                                                            <div class="border-bottom py-3">
                                                                                <p class=" text-muted font-size-13"
                                                                                    style="float: right">

                                                                             <div class="d-flex justify-content-center align-item-center text-muted" style="float: right"><span>       {{ $comment->created_at->diffForHumans() }}</span>
                                                                           
                                                                                @if ($comment->auth)
                                                                                <div
                                                                                    class="dropdown " style="float: right">
                                                                                  
                                                                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none"
                                                                                        href="#"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-expanded="false">
                                                                                        <i
                                                                                            class="mdi mdi-chevron-down ms-1"></i>
                                                                                    </a>

                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        style="">


                                                                                        <form
                                                                                            action="{{ route('delete.comment.task') }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            <input type="hidden"
                                                                                                name="comment"
                                                                                                value="{{ $comment->comment_uuid }}">
                                                                                            <input type="hidden"
                                                                                                name="_token"
                                                                                                value="1Q5wcJa3kNR8qmdqMzmK9Xc5aTS66wuWHrQ96sYD">
                                                                                            <li><input
                                                                                                    type="submit"
                                                                                                    class="dropdown-item"
                                                                                                    value="Sil">
                                                                                            </li>

                                                                                        </form>


                                                                                    </ul>
                                                                                </div>
                                                                            @endif

                                                                            </div>
                                                                                  
                                                                                </p>
                                                                                <div
                                                                                    class="d-flex align-items-center mb-3">



                                                                                    @if ($comment->who_comment_user->profile_photo_path)
                                                                                        <div
                                                                                            class="avatar align-self-center me-3">


                                                                                            <div
                                                                                                class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                                                <img src="{{ asset($comment->who_comment_user->profile_photo_path) }}"
                                                                                                    class="rounded-circle avatar-sm"
                                                                                                    alt="">
                                                                                            </div>



                                                                                        </div>
                                                                                    @else
                                                                                        <div
                                                                                            class="avatar align-self-center me-3">
                                                                                            <div
                                                                                                class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                                                <i
                                                                                                    class="bx bx-user-circle text-primary"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif


                                                                                    <div class="flex-1">
                                                                                        <h5 class="font-size-15 mb-1">
                                                                                            {{ $comment->who_comment_user->name }}

                                                                                        </h5>
                                                                                        <a href="javascript: void(0);"
                                                                                            class="badge bg-soft-success text-success font-size-11">{{ $comment->who_comment_user->user_name }}</a>

                                                                                    </div>
                                                                                </div>
                                                                                <p class="text-muted mb-4">

                                                                                    @if ($comment->pimmed == 1)
                                                                                        <li class="list-inline-item">
                                                                                            <a href="#"
                                                                                                class="btn badge bg-success"><i
                                                                                                    class="mdi mdi-tooltip-check-outline font-size-24 text-white"></i></a>
                                                                                        </li>
                                                                                    @endif

                                                                                    {{ $comment->comment }}
                                                                                </p>


                                                                                {{--                                                                      
    like icon       
                                                                                <div class="d-flex align-items-start">

                                                                                    <div class="flex-shrink-0">
                                                                                        <ul
                                                                                            class="list-inline product-review-link mb-0">
                                                                                            <li class="list-inline-item">
                                                                                                <a href="#"
                                                                                                    data-bs-toggle="tooltip"
                                                                                                    data-bs-placement="top"
                                                                                                    title=""
                                                                                                    data-bs-original-title="Like"><i
                                                                                                        class="bx bx-like"></i></a>
                                                                                            </li>
                                                                                            <li class="list-inline-item">
                                                                                                <a href="#"
                                                                                                    data-bs-toggle="tooltip"
                                                                                                    data-bs-placement="top"
                                                                                                    title=""
                                                                                                    data-bs-original-title="Comment"><i
                                                                                                        class="bx bx-comment-dots"></i></a>
                                                                                            </li>







                                                                                        </ul>




                                                                                    </div>
                                                                                </div> --}}



                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <div class="border-bottom py-3">
                                                                            <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                                                role="alert">
                                                                                <i
                                                                                    class="far fa-comments text-primary font-size-14"></i>
                                                                                <span class="text-primary font-size-12">
                                                                                    Yorum Yok</span>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="simplebar-placeholder"
                                                        style="width: auto; height: 373px;"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-horizontal"
                                                    style="visibility: hidden;">
                                                    <div class="simplebar-scrollbar"
                                                        style="transform: translate3d(0px, 0px, 0px); display: none;">
                                                    </div>
                                                </div>
                                                <div class="simplebar-track simplebar-vertical"
                                                    style="visibility: visible;">
                                                    <div class="simplebar-scrollbar"
                                                        style="height: 191px; transform: translate3d(0px, 0px, 0px); display: block;">
                                                    </div>
                                                </div>
                                            </div>

                                            {{--  Comment Form --}}

                                            <form action="{{ route('store.comment.task') }}" method="post">
                                                @csrf

                                                <div class="">
                                                    <div class="border rounded m-2">
                                                        <div class="d-flex chat-input-section align-items-start p-3">

                                                            <div class="flex-grow-1">
                                                                <div class="position-relative d-flex align-items-start">
                                                                    <input type="text" name="comment"
                                                                        class="form-control chat-input"
                                                                        placeholder="Yorum yap..">
                                                                    <input type="hidden" name="task"
                                                                        value="{{ $task->task_id }}">
                                                                    <div class="chat-input-links d-flex align-items-start">

                                                                        <button type="submit"
                                                                            class="btn btn-primary mx-2"><i
                                                                                class="uil uil-message"></i></button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end tab pane -->
                    @role('teacher')
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

                                                    <form action="{{ route('delete.task', $task->task_id) }}"
                                                        name="deleteTask" method="post">

                                                        @method('put')
                                                        @csrf

                                                        <li><input type="submit" class="dropdown-item" value="Sil"></li>

                                                    </form>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>


                                    <form action="{{ route('update.task', $task->task_id) }}" name="updateTask"
                                        method="post">
                                        <!-- end modalheader -->
                                        <div class="modal-body">

                                            @method('put')
                                            @csrf
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-3 col-form-label">Başlık</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="title" class="form-control"
                                                        value="{{ old('title') ?? $task->title }}"
                                                        id="horizontal-firstname-input" placeholder="Başlık Giriniz..">
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
                                                        value="{{ old('finished_at') ?? $task->finished_at }}"
                                                        id="example-date-input">
                                                    @error('finished_at')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Not
                                                    Önemi</label>
                                                <div class="col-md-9">
                                                    {{-- hata:basic old() aktif değil --}}
                                                    <select class="form-select" value="{{ old('status') ?? $task->status }}"
                                                        name="status">
                                                        <option @if ($task->status == 'red') selected @endif
                                                            value="red">Kırmızı</option>
                                                        <option @if ($task->status == 'yellow') selected @endif
                                                            value="yellow">Sarı</option>
                                                        <option @if ($task->status == 'green') selected @endif
                                                            value="green">Yeşil</option>
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
                                                            style="height: 100px">{{ old('note') ?? $task->note }}</textarea>

                                                        @error('note')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="card">
                                                <a class="btn btn-light collapsed" data-bs-toggle="collapse"
                                                    href="#collapseExample" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    Kullanıcı Etiketle
                                                </a>
                                                <div class="card-body collapse" id="collapseExample">
                                                    <div class="d-flex flex-wrap gap-2 align-items-start mb-3">


                                                    </div>

                                                    <div class="card card-body mb-0">

                                                        @if ($myFriends)
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
                                                                                        {{ $myFriend->user_name }}
                                                                                    </h5>
                                                                                    <small class=" text-truncate"
                                                                                        style="opacity: 0.8">
                                                                                        {{ $myFriend->name }}
                                                                                        {{ $myFriend->surname }}</small>
                                                                                </div>


                                                                                <div class="unread-message">






                                                                                    <div class="form-check form-switch mb-2"
                                                                                        dir="ltr">


                                                                                        <input type="checkbox"
                                                                                            class="form-check-input"
                                                                                            @if ($myFriend->is_task_taged == true) checked @endif
                                                                                            name="user[]"
                                                                                            value="{{ $myFriend->user_id }}"
                                                                                            id="customSwitchsizesm">
                                                                                    </div>




                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        @else
                                                            <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                                role="alert">
                                                                <i class="uil uil-minus-circle text-primary font-size-14"></i>
                                                                <span class="text-primary font-size-12"> Arkadaşınız Yok</span>
                                                            </div>
                                                        @endif


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
                                            <input type="submit" class="btn btn-primary" value="Kaydet">
                                        </div>
                                        <!-- end modalfooter -->
                                    </form>

                                    {{--  --}}

                                    <!-- end cardbody -->

                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end tab pane -->
                    @endrole

                    @role('teacher')
                        <div class="tab-pane " id="comments" role="tabpanel">
                            <div class="card mb-0 border-0">
                                <div class="card-body">



                                    <ul class="list-unstyled chat-list">

                                        @if (count($editableTaskComments) > 0)
                                            @foreach ($editableTaskComments as $comment)
                                                <li class="">
                                                    <a href="#">
                                                        <div class="d-flex align-items-start">



                                                            <div class="avatar align-self-center me-3">
                                                                <div
                                                                    class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                    <img src="{{ asset($comment->who_comment_user->profile_photo_path) }}"
                                                                        class="rounded-circle avatar-sm" alt="">


                                                                </div>
                                                            </div>


                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="text-truncate font-size-16 mb-1">
                                                                    {{ $comment->who_comment_user->name }}</h5>
                                                                <small class=" text-truncate  mb-0 " style="opacity: 0.8">

                                                                    {{ $comment->comment }}</small>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="font-size-11">
                                                                    {{ $comment->created_at->diffForHumans() }}</div>
                                                            </div>

                                                            <div class="unread-message">
                                                                <div class="d-flex ">

                                                                    @if ($comment->pimmed == 1)
                                                                        <form action="{{ route('pim.comment.task') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="comment"
                                                                                value="{{ $comment->comment_uuid }}">
                                                                            <button class="btn badge bg-success"><i
                                                                                    class="mdi mdi-tooltip-check-outline font-size-16 text-white"></i></button>


                                                                        </form>
                                                                    @else
                                                                        <form action="{{ route('pim.comment.task') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="comment"
                                                                                value="{{ $comment->comment_uuid }}">
                                                                            <button class="btn badge bg-soft-warning"><i
                                                                                    class="mdi mdi-tooltip-remove-outline font-size-16 text-white"></i></button>

                                                                        </form>
                                                                    @endif

                                                                    <form action="{{ route('delete.comment.task') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="comment"
                                                                            value="{{ $comment->comment_uuid }}">
                                                                        <button class="btn badge bg-danger mx-2"><i
                                                                                class="bx bx-trash font-size-16 text-white"></i></button>

                                                                    </form>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!-- end li -->
                                            @endforeach
                                        @endif
                                        @if (!count($editableTaskComments) > 0)
                                            <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                role="alert">
                                                <i
                                                    class="far fa-comments
                                            text-primary font-size-16 me-2"></i>
                                                Henüz Yorum Yok.
                                            </div>
                                        @endif


                                    </ul>





                                    {{--  --}}
                                    {{-- Yorum eski  --}}
                                    {{-- <div class="card">
                                        <a class="btn btn-light collapsed" data-bs-toggle="collapse" href="#commentsExample"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            Yorum İşlemleri
                                        </a>
                                        <div class="card-body collapse" id="commentsExample">
                                            <div class="d-flex flex-wrap gap-2 align-items-start mb-3">


                                            </div>

                                         
                                            <!-- Comment Form Forech-->
                                            
                                            @if (count($editableTaskComments) > 0)
                                                @foreach ($editableTaskComments as $comment)
                                                    <div class="border-bottom py-3">
                                                        <p class="float-sm-end text-muted font-size-13">
                                                            {{ $comment->created_at->diffForHumans() }}
                                                        </p>
                                                        <div class="d-flex align-items-center mb-3">



                                                            @if ($comment->who_comment_user->profile_photo_path)
                                                                <div class="avatar align-self-center me-3">


                                                                    <div
                                                                        class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                        <img src="{{ asset($comment->who_comment_user->profile_photo_path) }}"
                                                                            class="rounded-circle avatar-sm" alt="">
                                                                    </div>



                                                                </div>
                                                            @else
                                                                <div class="avatar align-self-center me-3">
                                                                    <div
                                                                        class="avatar-title  rounded-circle avatar bg-soft-primary text-info font-size-24">
                                                                        <i class="bx bx-user-circle text-primary"></i>
                                                                    </div>
                                                                </div>
                                                            @endif


                                                            <div class="flex-1">
                                                                <h5 class="font-size-15 mb-1">
                                                                    {{ $comment->who_comment_user->name }}

                                                                </h5>
                                                                <a href="javascript: void(0);"
                                                                    class="badge bg-soft-success text-success font-size-11">{{ $comment->who_comment_user->user_name }}</a>

                                                            </div>
                                                        </div>
                                                        <p class="text-muted mb-4">
                                                            {{ $comment->comment }}</p>
                                                        <div class="d-flex align-items-start">

                                                            <div class="flex-shrink-0">
                                                                <ul class="list-inline product-review-link mb-0">
                                                                    like icon
                                                                    <li class="list-inline-item">
                                                                        <a href="#" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title=""
                                                                            data-bs-original-title="Like"><i
                                                                                class="bx bx-like"></i></a>
                                                                    </li>



                                                                    @if ($comment->pimmed == 1)
                                                                        <li class="list-inline-item">

                                                                            <form action="{{ route('pim.comment.task') }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="comment"
                                                                                    value="{{ $comment->comment_uuid }}">
                                                                                <button class="btn badge bg-success"><i
                                                                                        class="mdi mdi-tooltip-check-outline font-size-16 text-white"></i></button>

                                                                            </form>
                                                                        </li>
                                                                    @else
                                                                        <li class="list-inline-item">

                                                                            <form action="{{ route('pim.comment.task') }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="comment"
                                                                                    value="{{ $comment->comment_uuid }}">
                                                                                <button class="btn badge bg-soft-warning"><i
                                                                                        class="mdi mdi-tooltip-remove-outline font-size-16 text-white"></i></button>

                                                                            </form>
                                                                        </li>
                                                                    @endif



                                                                    <li class="list-inline-item">

                                                                        <form action="{{ route('delete.comment.task') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="comment"
                                                                                value="{{ $comment->comment_uuid }}">
                                                                            <button class="btn badge bg-danger"><i
                                                                                    class="bx bx-trash font-size-16 text-white"></i></button>

                                                                        </form>
                                                                    </li>



                                                                </ul>




                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="border-bottom py-3">
                                                    <div class="alert alert-primary alert-outline alert-dismissible fade show"
                                                        role="alert">
                                                        <i class="far fa-comments text-primary font-size-14"></i>
                                                        <span class="text-primary font-size-12">
                                                            Yorum Yok</span>
                                                    </div>
                                                </div>
                                            @endif

                                        </div><!-- end card body -->
                                    </div> --}}





                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end tab pane -->
                    @endrole
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
