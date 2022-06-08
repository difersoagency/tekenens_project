<header class="main-nav">
    <div class="sidebar-user text-center">
      <img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        {{-- <div class="badge-bottom"><span class="badge badge-primary">New</span></div> --}}
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">Admin</h6></a>
        <p class="mb-0 font-roboto">Super Admin</p>
        {{-- <ul>
            <li>
                <span><span class="counter">19.8</span>k</span>
                <p>Follow</p>
            </li>
            <li>
                <span>2 year</span>
                <p>Experince</p>
            </li>
            <li>
                <span><span class="counter">95.2</span>k</span>
                <p>Follower</p>
            </li>
        </ul> --}}
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav  {{ (request()->is('admin/dashboard*')) ? 'active' : '' }} " href="{{route('dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Blog Info</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{  Route::is('home.*')  ? 'active' : ''}}" href="{{route('home.show')}}"><i data-feather="home"></i><span>Home</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav " href=""><i data-feather="info"></i><span>About</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav " href=""><i data-feather="user"></i><span>Profile</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{  Route::is('contact.*')  ? 'active' : ''}}" href="{{route('contact.show')}}"><i data-feather="phone"></i><span>Contact</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{  Route::is('testimoni.*')  ? 'active' : ''}}" href="{{route('testimoni.show')}}"><i data-feather="edit-2"></i><span>Testimoni</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Blog Post</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav  {{  Route::is('article.*')  ? 'active' : ''}}"   href="{{route('article.show')}}"><i data-feather="file-text"></i><span>Article</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav  {{  Route::is('portofolio.*')  ? 'active' : ''}}" href="{{route('portofolio.show')}}"><i data-feather="folder"></i><span>Portofolio</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav  {{  Route::is('job_vacancy.*')  ? 'active' : ''}}" href="{{route('job_vacancy.show')}}"><i data-feather="briefcase"></i><span>Job Vacancy</span></a>
                    </li>
                    {{-- <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{routeActive('kanban')}}" href=""><i data-feather="monitor"></i><span>Tags</span></a>
                    </li> --}}
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Additional</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav  {{  Route::is('team.*')  ? 'active' : ''}}" href="{{route('team.show')}}"><i data-feather="briefcase"></i><span>Teams</span></a>
                    </li>
                    {{-- <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/ui-kits') }}" href="javascript:void(0)"><i data-feather="settings"></i><span>Settings</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/ui-kits') }};">
                            <li><a href="{{route('user.show')}}" class="{{routeActive('state-color')}}">User</a></li>
                            <li><a href="" class="{{routeActive('state-color')}}">Website</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
