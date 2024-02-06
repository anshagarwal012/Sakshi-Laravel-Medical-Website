<header class="ishorizontal-topbar">
    <div class="navbar-header my-3">
        <div class="d-flex">
            <!-- LOGO -->
            {{-- <div class="navbar-brand-box"> --}}
            <a href="/" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ URL::asset('build/images/suda/header_logo.jpg') }}" class="w-100">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('build/images/suda/header_logo.jpg') }}" class="w-100">
                </span>
            </a>
            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse"
                data-bs-target="#topnav-menu-content">
                <i class="bx bx-menu align-middle"></i>
            </button>
        </div>
    </div>
    @php
        $type = $users[0]['type'];
    @endphp
    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu d-flex">
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">
                                <i class="bx bx-home-alt icon nav-icon"></i>
                                {{-- <span data-key="t-dashboards">Home</span> --}}
                            </a>
                        </li>

                        @if ($type != 'SU')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span data-key="t-dashboards">Occupancy Entry</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                    @if ($type == 'DU' || $type == 'UL' || $type == 'AG')
                                        <a href="/enter_occupancy_details" class="dropdown-item">Enter Occupancy
                                            Details</a>
                                        <a href="/enter_occupancy_details_temp" class="dropdown-item">Enter Occupancy
                                            Details Temporary</a>
                                        <a href="/occupancy_details_edit_or_delete" class="dropdown-item">Occupancy
                                            Details Edit
                                            or Delete</a>
                                        @if ($type != 'AG')
                                            <a href="/occupancy_details_for_approval" class="dropdown-item">Occupancy
                                                Details
                                                for Approval</a>
                                        @endif
                                    @endif
                                    @if ($type == 'CA')
                                        <a href="/shelter-home-construction-progress-details"
                                            class="dropdown-item">Shelter Home Construction Progress Details</a>
                                    @endif
                                </div>
                            </li>
                        @endif
                        @if ($type == 'SU')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span data-key="t-dashboards">Shelter Home Entry</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                    <a href="/shelter_home_details" class="dropdown-item">Enter Shelter Home Details</a>
                                    <a href="/shelter_home_construction_details" class="dropdown-item">Enter Shelter
                                        Home Construction Details</a>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-key="t-dashboards">Fund Sanction / Utilization</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                @if ($type == 'SU')
                                    <a href="/fund_sanction" class="dropdown-item">Sanction Fund</a>
                                    <a href="/demand_approval_suda" class="dropdown-item">Demand / Utilization
                                        Approval</a>
                                @endif
                                @if ($type == 'DU')
                                    <a href="/demand_approval_duda" class="dropdown-item">Demand / Utilization
                                        Approval</a>
                                    <a href="/release_approval_DUDA_to_ULB" class="dropdown-item">Release Approval DUDA
                                        to ULB</a>
                                @endif
                                @if ($type == 'UL')
                                    <a href="/demand_approval_ulb" class="dropdown-item">Demand / Utilization
                                        Approval</a>
                                    <a href="/release_approval_ULB_to_AGENCY" class="dropdown-item">Release Approval ULB
                                        to Agency</a>
                                @endif
                                @if ($type == 'AG' || $type == 'CA')
                                    <a href="/fund_demand" class="dropdown-item">Fund Demand</a>
                                    <a href="/fund_utilization" class="dropdown-item">Fund Utilization</a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-key="t-dashboards">Report</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                @if ($type == 'SU')
                                    <a href="/list_of_user_details_report" class="dropdown-item">List of User Details
                                        Report</a>
                                    <a href="/not-filled-occupancy-detail-report" class="dropdown-item">Ocupancy Not Filled</a>
                                @endif  

                                {{-- <a href="/construction-shelter-home-detail-report" class="dropdown-item">Construction Shelter Home Detail Report</a> --}}
                                <a href="/report_feedback" class="dropdown-item">Feedback Report</a>
                                <a href="/occupancy-detail-report" class="dropdown-item">Occupancy Detail Report</a>
                                <a href="/fund-sanction-report" class="dropdown-item">Fund Sanction Report</a>
                                <a href="/fund-utilization-report" class="dropdown-item">Fund Utilization Report</a>
                                <a href="fund-sanction-release-demand-and-utilization-report"
                                    class="dropdown-item">Fund Sanction, Release, Demand, And Utilization Report</a>
                                @if ($type == 'SU')
                                    <a href="/shelter-home-construction-progress-report" class="dropdown-item">Shelter
                                        Home Construction Progress Report</a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-key="t-dashboards">Admin</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="/change_self_password" class="dropdown-item">Change Self Password</a>
                                @if ($type == 'SU')
                                    <a href="/create_change_login_credentials" class="dropdown-item">Create / Change
                                        login Credentials</a>
                                @endif
                            </div>
                        </li>
                        @if ($type == 'SU' || $type == 'DU')
                            @if ($type == 'SU')
                                <li class="nav-item">
                                    <a class="nav-link" href="/gallery_approve_by_suda" id="topnav-dashboard"
                                        role="button">
                                        <span data-key="t-dashboards">Gallery</span>
                                    </a>
                                </li>
                            @endif
                            @if ($type == 'DU')
                                <li class="nav-item">
                                    <a class="nav-link" href="/gallery_add_by_duda" id="topnav-dashboard"
                                        role="button">
                                        <span data-key="t-dashboards">Gallery</span>
                                    </a>
                                </li>
                            @endif
                        @endif

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/logout" id="topnav-dashboard" role="button">
                                <span data-key="t-dashboards">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="user">
                    <h6>You are Login as : <span class="text-capitalize">{{ $users[0]['username'] }}</span></h6>
                </div>
            </nav>
        </div>
    </div>
</header>
