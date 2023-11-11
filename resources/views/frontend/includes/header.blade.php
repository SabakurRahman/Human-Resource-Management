
      <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div  style="padding: 0 9.5rem 0 1.5rem;" class="navbar-brand-box">
                    <a href="{{route('front.index')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('tamplate/assets/images/Logo.png')}}" alt="logo-sm-dark" height="40">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('tamplate/assets/images/brand-logo.png')}}" alt="logo-dark" height="40">
                        </span>
                    </a>

                    <a href="{{route('front.index')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('tamplate/assets/images/Logo.png')}}" alt="logo-sm-light" height="40">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('tamplate/assets/images/Logo.png')}}" alt="logo-light" height="40">
                        </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>
            </div>
            <div class="d-flex">
                <div class="dropdown d-none d-lg-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <div class="top-icon">
                            <i class="mdi mdi-fullscreen"></i>
                        </div>
                    </button>
                </div>
{{--                <div class="dropdown d-inline-block">--}}
{{--                    <button type="button" class="btn header-item noti-icon waves-effect"--}}
{{--                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        <div class="top-icon">--}}
{{--                            <i class="mdi mdi-bell"></i>--}}
{{--                        </div>--}}
{{--                        <span style="position: absolute;top: 12px;right: 4px;font-size: 10px;" class="badge bg-danger rounded-pill">3</span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"--}}
{{--                        aria-labelledby="page-header-notifications-dropdown">--}}
{{--                        <div class="p-3">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col">--}}
{{--                                    <h6 class="m-0"> Notifications </h6>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <a href="#!" class="small"> View All</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div data-simplebar style="max-height: 230px;">--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="avatar-xs me-3">--}}
{{--                                        <span class="avatar-title bg-primary rounded-circle font-size-16">--}}
{{--                                            <i class="ri-shopping-cart-line"></i>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-1">--}}
{{--                                        <h6 class="mt-0 mb-1">Your order is placed</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">If several languages coalesce the grammar</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <img src="{{asset('tamplate/assets/images/users/avatar-3.jpg')}}" class="me-3 rounded-circle avatar-xs"--}}
{{--                                        alt="user-pic">--}}
{{--                                    <div class="flex-1">--}}
{{--                                        <h6 class="mt-0 mb-1">James Lemire</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">It will seem like simplified English.</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="avatar-xs me-3">--}}
{{--                                        <span class="avatar-title bg-success rounded-circle font-size-16">--}}
{{--                                            <i class="ri-checkbox-circle-line"></i>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-1">--}}
{{--                                        <h6 class="mt-0 mb-1">Your item is shipped</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">If several languages coalesce the grammar</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}

{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <img src="{{asset('tamplate/assets/images/users/avatar-4.jpg')}}" class="me-3 rounded-circle avatar-xs"--}}
{{--                                        alt="user-pic">--}}
{{--                                    <div class="flex-1">--}}
{{--                                        <h6 class="mt-0 mb-1">Salena Layfield</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="p-2 border-top">--}}
{{--                            <div class="d-grid">--}}
{{--                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">--}}
{{--                                    <i class="mdi mdi-arrow-right-circle me-1"></i> View More..--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- end notification -->

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{--                        <img class="rounded-circle header-profile-user" src="{{asset('tamplate/assets/images/users/avatar-7.jpg')}}"--}}
{{--                            alt="Header Avatar">--}}

                        <img class="rounded-circle header-profile-user"
                             src="{{ isset(Auth::user()->profile->profile_photo) ? asset(\App\Models\UserProfile::PHOTO_UPLOAD_PATH . Auth::user()->profile->profile_photo) : asset('tamplate/assets/images/users/avatar-7.jpg') }}"
                             alt="Header Avatar">

{{--                        <span class="d-none d-xl-inline-block ms-1">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>--}}
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->

                        {{-- <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a> --}}



                        <a class="dropdown-item" href="">
                         <i class="ri-user-line align-middle me-1"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                        {!! Form::button('<i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout', ['class'=>'dropdown-item','type' => 'submit']) !!}
                        {!! Form::close() !!}


                    </div>

                </div>
                <!-- end user -->


                <!-- end setting -->
            </div>
        </div>
