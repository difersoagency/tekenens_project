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
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href="<?php echo e(route('dashboard')); ?>"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Blog Info</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="home"></i><span>Home</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="info"></i><span>About</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="user"></i><span>Profile</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="phone"></i><span>Contact</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Blog Post</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>"  href="<?php echo e(route('article.show')); ?>"><i data-feather="file-text"></i><span>Article</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="folder"></i><span>Portofolio</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="briefcase"></i><span>Career</span></a>
                    </li>
                    
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Additional</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/ui-kits')); ?>" href="javascript:void(0)"><i data-feather="settings"></i><span>Settings</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/ui-kits')); ?>;">
                            <li><a href="" class="<?php echo e(routeActive('state-color')); ?>">User</a></li>
                            <li><a href="" class="<?php echo e(routeActive('state-color')); ?>">Website</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<?php /**PATH C:\laragon\www\tekenens_project\resources\views/layouts/admin/partials/sidebar.blade.php ENDPATH**/ ?>