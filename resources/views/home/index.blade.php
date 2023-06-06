@extends('layouts.app')

@section('css')
    <link href="{{asset('assets/libs/fullcalendar/main.min.css')}}" rel="stylesheet" type="text/css" />
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">
                        <div class="user-profile-img">
                            <img src="assets/images/pattern-bg.jpg" class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                            <div class="overlay-content rounded-top">
                                <div>
                                    <div class="user-nav p-3">
                                        <div class="d-flex justify-content-end">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xl rounded-circle img-thumbnail">

                                <div class="mt-3">
                                    <h5 class="mb-1">Marie N.</h5>
                                    <div>
                                        <a href="#" class="badge badge-soft-success m-1">UX Research</a>
                                        

                                        <a href="#" class="badge badge-soft-success m-1">Project Management</a>
                                        <a href="#" class="badge badge-soft-success m-1">CX Strategy</a>
                                    </div>

                                    <div class="mt-4">
                                        <a href="" class="btn btn-primary waves-effect waves-light btn-sm"><i class="bx bx-send me-1 align-middle"></i> Send Message</a>
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
                            <h5 class="font-size-16">Info :</h5>

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
      
            {{-- <div class="col-12">
                <!-- Left sidebar -->
                <div class="email-leftbar card">
                    <div class="card-body">
                        <button type="button" class="btn btn-danger w-100 fw-semibold" data-bs-toggle="modal" data-bs-target="#composemodal">
                            Compose
                        </button>
                        <div class="mail-list mt-4">
                            <a href="#" class="active"><i class="bx bxs-inbox font-size-16 align-middle me-2"></i> Inbox <span class="ms-1 float-end">(18)</span></a>
                            <a href="#"><i class="bx bx-star font-size-16 align-middle me-2"></i>Starred</a>
                            <a href="#"><i class="bx bxs-bookmark font-size-16 align-middle me-2"></i>Important</a>
                            <a href="#"><i class="bx bx-file font-size-16 align-middle me-2"></i>Draft</a>
                            <a href="#"><i class="bx bx-mail-send font-size-16 align-middle me-2"></i>Sent Mail</a>
                            <a href="#"><i class="bx bx-trash font-size-16 align-middle me-2"></i>Trash</a>
                        </div>

                        <h6 class="mt-4">Labels</h6>

                        <div class="mail-list mt-1">
                            <a href="#"><span class="mdi mdi-circle-outline text-info me-2"></span>Theme Support</a>
                            <a href="#"><span class="mdi mdi-circle-outline text-warning me-2"></span>Freelance</a>
                            <a href="#"><span class="mdi mdi-circle-outline text-primary me-2"></span>Social</a>
                            <a href="#"><span class="mdi mdi-circle-outline text-danger me-2"></span>Friends</a>
                            <a href="#"><span class="mdi mdi-circle-outline text-success me-2"></span>Family</a>
                        </div>

                        <h6 class="mt-4">Chat</h6>

                        <div class="mt-3 mb-1">
                            <div class="mail-list">
                                <a href="javascript: void(0);" class="d-flex align-items-start">
                                    <img class="flex-shrink-0 me-3 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="36">
                                    <div class="flex-grow-1 chat-user-box">
                                        <p class="user-title m-0">Scott Median</p>
                                        <p class="text-muted mb-0">Hello</p>
                                    </div>
                                </a>

                                <a href="javascript: void(0);" class="d-flex align-items-start">
                                    <img class="flex-shrink-0 me-3 rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="36">
                                    <div class="flex-grow-1 chat-user-box">
                                        <p class="user-title m-0">Julian Rosa</p>
                                        <p class="text-muted mb-0">What about our next..</p>
                                    </div>
                                </a>

                                <a href="javascript: void(0);" class="d-flex align-items-start">
                                    <img class="flex-shrink-0 me-3 rounded-circle" src="assets/images/users/avatar-4.jpg" alt="Generic placeholder image" height="36">
                                    <div class="flex-grow-1 chat-user-box">
                                        <p class="user-title m-0">David Medina</p>
                                        <p class="text-muted mb-0">Yeah everything is fine</p>
                                    </div>
                                </a>

                                <a href="javascript: void(0);" class="d-flex align-items-start">
                                    <img class="flex-shrink-0 me-3 rounded-circle" src="assets/images/users/avatar-6.jpg" alt="Generic placeholder image" height="36">
                                    <div class="flex-grow-1 chat-user-box">
                                        <p class="user-title m-0">Jay Baker</p>
                                        <p class="text-muted mb-0">Wow that's great</p>
                                    </div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Left sidebar -->

                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">
                                                    
                    <div class="card">
                        <div class="btn-toolbar p-3" role="toolbar">
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary"><i class="fa fa-inbox"></i></button>
                                <button type="button" class="btn btn-primary"><i class="fa fa-exclamation-circle"></i></button>
                                <button type="button" class="btn btn-primary"><i class="far fa-trash-alt"></i></button>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="#">Updates</a>
                                    <a class="dropdown-item" href="#">Social</a>
                                    <a class="dropdown-item" href="#">Team Manage</a>
                                </div>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="#">Updates</a>
                                    <a class="dropdown-item" href="#">Social</a>
                                    <a class="dropdown-item" href="#">Team Manage</a>
                                </div>
                            </div>

                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    More <i class="mdi mdi-dots-vertical ms-2"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="#">Mark as Unread</a>
                                    <a class="dropdown-item" href="#">Mark as Important</a>
                                    <a class="dropdown-item" href="#">Add to Tasks</a>
                                    <a class="dropdown-item" href="#">Add Star</a>
                                    <a class="dropdown-item" href="#">Mute</a>
                                </div>
                            </div>
                        </div>

                        <div class="py-3">
                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk1">
                                            <label for="chk1" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Whitney Peter</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">23 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> Delectus, ut aut reiciendis – <span class="teaser text-muted fw-normal">Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 5:01 AM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk2">
                                            <label for="chk2" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-2.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">me, Susanna</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">07 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"><span class="bg-warning badge me-2">Freelance</span> Wolombo has been arranged, – <span class="teaser text-muted fw-normal">Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 8:23 AM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk3">
                                            <label for="chk3" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-4.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Web Support</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">14 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> Re: New mail settings – <span class="teaser text-muted fw-normal">Will you answer him asap?</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 6:36 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1 unread">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk4">
                                            <label for="chk4" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Whitney Peter</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">23 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> <span class="bg-info badge me-2">Support</span> Off on Thursday - <span class="teaser text-muted fw-normal">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4  4 mar 2014 at 5:55 pm</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 3:26 AM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk5">
                                            <label for="chk5" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-6.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Death to Stock</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">17 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> <span class="bg-primary badge me-2">Social</span> This Week's Top Stories – <span class="teaser text-muted fw-normal">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 4:32 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk6">
                                            <label for="chk6" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Andrew Zimmer</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">02 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> Mochila Beta: Subscription Confirmed – <span class="teaser text-muted fw-normal">You've been confirmed! Welcome to the ruling class of the inbox. For your records, here is a copy of the information you submitted to us...</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 4:24 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1 unread">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk7">
                                            <label for="chk7" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-2.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Randy, me (5)</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">15 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"><span class="bg-success badge me-2">Family</span> Weekend on Revibe – <span class="teaser text-muted fw-normal">Today's Friday and we thought maybe you want some music inspiration for the weekend. Here are some trending tracks and playlists we think you should give a listen!</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 4:24 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk8">
                                            <label for="chk8" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">KanbanFlow</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">06 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> Task assigned: Clone ARP's website
                                           –  <span class="teaser text-muted fw-normal">You have been assigned a task by Alex@Work on the board Web.</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 7:36 AM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1 unread">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk9">
                                            <label for="chk9" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-3.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Revibe</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">25 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> Last pic over my village – <span class="teaser text-muted fw-normal">Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 9:52 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk10">
                                            <label for="chk10" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Erik, me (5)</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">07 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> <span class="bg-danger badge me-2">Friends</span> Let's go fishing! – <span class="teaser text-muted fw-normal">Hey, You wanna join me and Fred at the lake tomorrow? It'll be awesome.</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 5:05 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk11">
                                            <label for="chk11" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Stack Exchange</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">19 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> 1 new items in your Stackexchange inbox
                                           – <span class="teaser text-muted fw-normal"> The following items were added to your Stack Exchange global inbox since you last checked it.</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 7:30 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk12">
                                            <label for="chk12" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">Google Drive Team</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">47 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> You can now use your storage in Google
                                           Drive –  <span class="teaser text-muted fw-normal">Hey Nicklas Sandell! Thank you for purchasing extra storage space in Google Drive.</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 9:14 AM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="message-list mb-0 p-1">
                                <div class="list">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk13">
                                            <label for="chk13" class="toggle"></label>
                                        </div>
                                        <div class="d-flex title align-items-center">
                                            <img src="assets/images/users/avatar-4.jpg" class="avatar-sm rounded-circle" alt="">
                                            <div class="flex-1 ms-2 ps-1">
                                                <h5 class="font-size-14 mb-0"><a href="" class="text-dark">me, Peter (5)</a></h5>
                                                <a href="" class="text-muted text-uppercase font-size-12">07 Threads</a>
                                            </div>
                                        </div>
                                        <span class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject text-dark"> <span class="bg-info badge me-2">Support</span> Home again! –  <span class="teaser text-muted fw-normal">That's just perfect! See you tomorrow.</span>
                                        </a>
                                        <div class="date"><i class="mdi mdi-link-variant me-2 font-size-15 align-middle"></i> 6:56 PM</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                           

                           
                            
                    </div><!-- card -->

                    <div class="row">
                        <div class="col-7">
                            Showing 1 - 20 of 1,524
                        </div><!-- End col -->

                        <div class="col-5">
                            <div class="btn-group float-end">
                                <button type="button" class="btn btn-sm btn-success"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-sm btn-success"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div><!-- End col -->
                    </div><!-- End row -->

                </div>
                <!-- End Right Sidebar -->
            </div> --}}
  
@endsection
@section('js')
    <!-- plugin js -->
    <script src="{{ asset('assets/libs/fullcalendar/main.min.js')}}"></script>

    <!-- Calendar init -->
    <script src="{{ asset('assets/js/pages/calendar.init.js')}}"></script>
@endsection
