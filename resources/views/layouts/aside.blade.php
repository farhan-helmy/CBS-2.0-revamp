<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item  {{request()->routeIs('dashboard') ? 'selected' : ''}}"> <a class="sidebar-link  {{request()->routeIs('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item  {{request()->routeIs('appointment.*') ? 'selected' : ''}}"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Appointment</span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="{{route('appointment.set')}}" class="sidebar-link"><span class="hide-menu"> Set
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('appointment.queue')}}" class="sidebar-link"><span class="hide-menu"> Queue
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('appointment.records')}}" class="sidebar-link"><span class="hide-menu"> Record
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{request()->routeIs('patient.*') ? 'selected' : ''}}"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-address-book"></i><span class="hide-menu">Patient</span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="{{route('patient.index')}}" class="sidebar-link"><span class="hide-menu"> Register
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('patient.records')}}" class="sidebar-link"><span class="hide-menu"> Records
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-hospital"></i><span class="hide-menu">Panel</span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span class="hide-menu"> Register
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span class="hide-menu"> Records
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>