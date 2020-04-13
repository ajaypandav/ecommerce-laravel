<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="{{ url('admin/dashboard') }}">
                        <span class="font-size-xl text-dual-primary-dark">Learn</span><span class="font-size-xl text-primary">Laravel</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a class="{{ request()->is('admin/dashboard') ? ' active' : '' }}" href="{{ url('admin/dashboard') }}">
                        <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/banner') ? ' active' : '' }}" href="{{ url('admin/banner') }}">
                        <i class="si si-picture"></i><span class="sidebar-mini-hide">Banner</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/category') ? ' active' : '' }}" href="{{ url('admin/category') }}">
                        <i class="fa fa-align-left"></i><span class="sidebar-mini-hide">Category</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/product') ? ' active' : '' }}" href="{{ url('admin/product') }}">
                        <i class="fa fa-product-hunt"></i><span class="sidebar-mini-hide">Products</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/order') ? ' active' : '' }}" href="{{ url('admin/order') }}">
                        <i class="fa fa-shopping-cart"></i><span class="sidebar-mini-hide">Orders</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/contact') ? ' active' : '' }}" href="{{ url('admin/contact') }}">
                        <i class="fa fa-phone"></i><span class="sidebar-mini-hide">Contact Us</span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/subscriber') ? ' active' : '' }}" href="{{ url('admin/subscriber') }}">
                        <i class="fa fa-envelope"></i><span class="sidebar-mini-hide">Subscribers</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/blogCategory') || request()->is('admin/blog') ? 'open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                        <i class="fa fa-rss"></i><span class="sidebar-mini-hide">Blog</span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('admin/blogCategory') ? ' active' : '' }}" href="{{ url('admin/blogCategory') }}">Blog Categories</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/blog') ? ' active' : '' }}" href="{{ url('admin/blog') }}">Blog List</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>