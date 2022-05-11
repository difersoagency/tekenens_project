<header class="main-nav">
    <div class="sidebar-user text-center">
      <img class="img-90 rounded-circle" src="<?php echo e(asset('assets/images/dashboard/1.png')); ?>" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6></a>
        <p class="mb-0 font-roboto">Human Resources Department</p>
        <ul>
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
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Post</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="git-pull-request"></i><span>Post</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="git-pull-request"></i><span>Pages</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('file-manager')); ?>" href=""><i data-feather="git-pull-request"></i><span>Categories</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php echo e(routeActive('kanban')); ?>" href=""><i data-feather="monitor"></i><span>Tags</span></a>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Additional</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/ui-kits')); ?>" href="javascript:void(0)"><i data-feather="box"></i><span>Settings</span></a>
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
<?php /**PATH C:\P\theme\resources\views/layouts/admin/partials/sidebar.blade.php ENDPATH**/ ?>