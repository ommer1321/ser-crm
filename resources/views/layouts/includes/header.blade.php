<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('index.home') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.svg" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-sm.svg" alt="" height="26"> <span class="logo-txt">As
                            Yazılım</span>
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.svg" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-sm.svg" alt="" height="26"> <span class="logo-txt">As
                            Yazılım</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse"
                id="horimenu-btn" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{ route('index.home') }}"
                                    id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-home-circle icon"></i>
                                    <span data-key="t-dashboard">Anasayfa</span>
                                </a>
                            </li>



                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages"
                                    role="button">
                                    <i class="bx bx-customize icon"></i>
                                    <span data-key="t-apps">Uygulamalar</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                    <a href="{{ route('index.calendar') }}" class="dropdown-item"
                                        data-key="t-calendar">Takvim</a>

                                    <a href="{{ route('index.task') }}" class="dropdown-item"
                                        data-key="t-calendar">Görevler</a>


                                    @role('teacher')
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                id="topnav-projects" role="button">
                                                <span data-key="t-projects">Gruplar</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-projects">
                                                <a href="{{ route('list.grup') }}" class="dropdown-item"
                                                    data-key="t-p-grid">Grup Listesi</a>
                                                <a href="{{ route('create.grup') }}" class="dropdown-item"
                                                    data-key="t-p-list">Grup Oluştur</a>

                                            </div>
                                        </div>
                                    @endrole
                                </div>
                            </li>


                        </ul>
                    </div>
                </nav>
            </div>

        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-search icon-sm"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                    <form class="p-2">
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0"
                                    placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- 
            <div class="dropdown d-inline-block language-switch">
                <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img id="header-lang-img" src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="eng">
                        <img src="assets/images/flags/us.jpg" alt="user-image" class="me-2" height="12"> <span
                            class="align-middle">English</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                        <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-2" height="12">
                        <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                        <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-2" height="12">
                        <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                        <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-2" height="12">
                        <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                        <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-2" height="12">
                        <span class="align-middle">Russian</span>
                    </a>
                </div>
            </div> --}}

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell icon-sm"></i>
                    <span class="noti-dot bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-15"> Notifications </h5>
                            </div>
                            <div class="col-auto">
                                <a href="javascript:void(0);" class="small"> Mark all as read</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 250px;">
                        <h6 class="dropdown-header bg-light">New</h6>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex border-bottom align-items-start">
                                <div class="flex-shrink-0">
                                    <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-sm"
                                        alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Justin Verduzco</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-13">Your task changed an issue from "In Progress" to
                                            <span class="badge badge-soft-success">Review</span>
                                        </p>
                                        <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex border-bottom align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm me-3">
                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                            <i class="uil-shopping-basket"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New order has been placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-13">Open the order confirmation or shipment
                                            confirmation.</p>
                                        <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                class="mdi mdi-clock-outline"></i> 5 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <h6 class="dropdown-header bg-light">Earlier</h6>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex border-bottom align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm me-3">
                                        <span
                                            class="avatar-title bg-soft-success text-success rounded-circle font-size-16">
                                            <i class="uil-truck"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-13">Here is somthing that you might light like to
                                            know.</p>
                                        <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex border-bottom align-items-start">
                                <div class="flex-shrink-0">
                                    <img src="assets/images/users/avatar-4.jpg" class="me-3 rounded-circle avatar-sm"
                                        alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-13">Yay ! Everything worked!</p>
                                        <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                class="mdi mdi-clock-outline"></i> 3 days ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle">
                    <i class="bx bx-cog icon-sm"></i>
                </button>
            </div> --}}

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="Header Avatar">
                    <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                        <span class="user-name">{{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header">Merhaba {{ Auth::user()->user_name }}</h6>
                    <a class="dropdown-item" href="pages-profile.html"><i
                            class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Profile</span></a>
                    {{-- <a class="dropdown-item" href="apps-chat.html"><i
                            class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Messages</span></a>
                    <a class="dropdown-item" href="apps-kanban-board.html"><i
                            class="mdi mdi-calendar-check-outline text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Taskboard</span></a>
                    --}}
                    <a class="dropdown-item" href="{{ route('myfriends.friendship') }}"><i
                            class="bx bxs-user-detail text-muted font-size-20 align-middle me-1"></i> <span
                            class="align-middle">Arkadaşlarım</span></a>

                    <a class="dropdown-item" href="{{ route('index.friendship') }}"><i
                            class="uil-user-plus text-muted font-size-20 align-middle me-1"></i> <span
                            class="align-middle">Arkadaş Ekle</span></a>
                           

                    <a class="dropdown-item" href="{{ route('request-box.friendship') }}"><i
                            class="bx bx-heart text-muted font-size-20 align-middle me-1"></i> <span
                            class="align-middle">İstek Kutusu</span></a>

                            <a class="dropdown-item" href="{{ route('index.notification') }}"><i
                                class=" bx bx-bell icon-sm text-muted font-size-20 align-middle me-1"></i> <span
                                class="align-middle">Bildirimler</span></a>

                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="#"><i
                            class="mdi mdi-wallet text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Balance : <b>$6951.02</b></span></a>
                    <a class="dropdown-item d-flex align-items-center" href="contacts-settings.html"><i
                            class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Settings</span><span
                            class="badge badge-soft-success ms-auto">New</span></a>
                    <a class="dropdown-item" href="auth-lockscreen-cover.html"><i
                            class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Lock screen</span></a>
 --}}



                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>
            </div>
        </div>
    </div>

    {{-- <div class="collapse show dash-content" id="dashtoggle">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Starter Page</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- start dash info -->
         
            <!-- end dash info -->
        </div>
    </div> --}}

    <!-- start dash troggle-icon -->
    {{-- <div>
        <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle"
            aria-expanded="true" aria-controls="dashtoggle">
            <i class="bx bx-up-arrow-alt"></i>
        </a>
    </div> --}}
    <!-- end dash troggle-icon -->

</header>
