<header class="main-nav">
    <div class="sidebar-user text-center">
      <img class="img-90 rounded-circle" src="<?php echo e(asset('assets/images/dashboard/1.png')); ?>" alt="" />
        
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">Admin</h6></a>
        <p class="mb-0 font-roboto">Super Admin</p>
        
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
                        <a class="nav-link menu-title link-nav " href="<?php echo e(route('dashboard')); ?>"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Blog Info</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav " href="<?php echo e(route('home.show')); ?>"><i data-feather="home"></i><span>Home</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav " href=""><i data-feather="info"></i><span>About</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav " href=""><i data-feather="user"></i><span>Profile</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e((request()->is('contact*')) ? 'active' : ''); ?>" href="<?php echo e(route('contact.show')); ?>"><i data-feather="phone"></i><span>Contact</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Blog Post</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav  <?php echo e((request()->is('article*')) ? 'active' : ''); ?>"   href="<?php echo e(route('article.show')); ?>"><i data-feather="file-text"></i><span>Article</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav  <?php echo e((request()->is('portofolio*')) ? 'active' : ''); ?>" href="<?php echo e(route('portofolio.show')); ?>"><i data-feather="folder"></i><span>Portofolio</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e((request()->is('job_vacancy*')) ? 'active' : ''); ?>" href="<?php echo e(route('job_vacancy.show')); ?>"><i data-feather="briefcase"></i><span>Job Vacancy</span></a>
                    </li>
                    
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Additional</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav  <?php echo e((request()->is('team*')) ? 'active' : ''); ?>" href="<?php echo e(route('team.show')); ?>"><i data-feather="briefcase"></i><span>Teams</span></a>
                    </li>
                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<?php /**PATH F:\tekenens_project\resources\views/layouts/admin/partials/sidebar.blade.php ENDPATH**/ ?>