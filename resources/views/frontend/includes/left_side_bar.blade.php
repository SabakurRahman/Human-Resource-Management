<style>
    #side-menu li a {
        text-decoration: none !important;
    }

    .data-center {
        padding-left: 20px !important;
    }

    .breadcrumb-item a, h4 {
        text-decoration: none !important;
    }
</style>

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                @role('Super Admin|Admin|Hr')
                <li>
                    <a href="{{route('front.index')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endrole
                @role('admin|Hr|Employee')
                <li>
                    <a href="{{ route('notice.board') }}">
                        <i class="ri-artboard-fill"></i>
                        <span>Notice Board</span>
                    </a>
                </li>
                @endrole

                @role('Super Admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-lock-password-line"></i>
                        <span>Role Permission</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('role.index')}}">

                                <span>Roles</span>
                            </a>

                        </li>
                        <li>
                            <a href="{{route('user.role_association')}}">

                                <span>Permissions</span>
                            </a>
                    </ul>
                </li>
                @endrole

                @role('Super Admin|admin')
                <li>
                <li>
                            <a href="{{route('companies.index')}}">
                                <i class="ri-store-line"></i>
                                <span>Companies</span>

                            </a>

                        </li>


                <li>
                    <a href="{{route('departments.index')}}">
                        <i class="ri-git-branch-fill"></i>
                        <span>Departments</span>

                    </a>

                </li>
                @endrole

                @role('Super Admin|Hr')
                <li>
                    <a href="{{route('employees.index')}}">
                        <i class="ri-team-line"></i>
                        <span>Employee</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('leave-management.index')}}">
                        <i class="ri-arrow-left-line"></i>
                        <span>Leave Management</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('holiday.index')}}">
                        <i class="ri-arrow-left-line"></i>
                        <span>Holiday</span>

                    </a>

                </li>


                <li>
                    <a href="{{route('attendance.report.all')}}">
                        <i class="ri-line-chart-line"></i>
                        <span>Attendance Report</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('payroll.index')}}">
                        <i class="ri-wechat-pay-fill"></i>
                        <span>Payroll</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('increment.index')}}">
                        <i class="ri-exchange-dollar-fill"></i>
                        <span>Increment List</span>

                    </a>

                </li>
              @role('Hr')
                <li>
                    <a href="{{route('notice.index')}}">
                        <i class="ri-megaphone-line"></i>
                        <span>Hr Notice</span>

                    </a>

                </li>
              @endrole

                @endrole
                @role('Employee|Hr')
                <li>
                    <a href="{{route('mark.attendance')}}">
                        <i class="ri-chat-check-line"></i>
                        <span>Attendance</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('attendance.log')}}">
                        <i class="ri-chat-check-line"></i>
                        <span>My Attendance Log</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('my-leave-report')}}">
                        <i class="ri-line-chart-line"></i>
                        <span> My Leave Report</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('attendance.report')}}">
                        <i class="ri-line-chart-line"></i>
                        <span> My Attendance Report</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('leave-management.create')}}">
                        <i class="ri-user-received-line"></i>
                        <span>Leave Application</span>

                    </a>

                </li>
                <li>
                    <a href="{{route('my-salary-show')}}">
                        <i class="ri-money-dollar-box-line"></i>
                        <span>My Salary Show</span>

                    </a>

                </li>
                @endrole




            </ul>
            <!-- end ul -->
        </div>
        <!-- Sidebar -->
    </div>
</div>


