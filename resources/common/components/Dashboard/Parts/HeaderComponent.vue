<template>
    <div>
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="javascript:void(0);" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                            <span class="logo-lg">
                                    <img src="/assets/images/logo-dark.png" alt="" height="20">
                                </span>
                        </a>

                        <a href="javascript:void(0);" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                            <span class="logo-lg">
                                    <img src="/assets/images/logo-light.png" alt="" height="20">
                                </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="uil-search"></span>
                        </div>
                    </form>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="uil-search"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="uil-bell"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notifications </h5>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> Mark all as read</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar="init" style="max-height: 230px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; padding-right: 0px; padding-bottom: 0px; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="uil-shopping-basket"></i>
                                                </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <img src="/assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1">James Lemire</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="uil-truck"></i>
                                                </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <img src="/assets/images/users/avatar-4.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div></div>
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="uil-arrow-circle-right me-1"></i> View More..
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<!--                            <img class="rounded-circle header-profile-user" src="/assets/images/users/avatar-4.jpg" alt="Header Avatar">-->
                            <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{ user.name }}</span>
                            <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <router-link :to="{name: 'dashboard.profile'}" class="dropdown-item">
                                <i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i>
                                <span class="align-middle">View Profile</span>
                            </router-link>
                            <router-link :to="{name: 'dashboard.logout'}" class="dropdown-item">
                                <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
                                <span class="align-middle">Sign out</span>
                            </router-link>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <div class="vertical-menu mm-active">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="javascript:void(0);" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                    <span class="logo-lg">
                            <img src="/assets/images/logo-dark.png" alt="" height="20">
                        </span>
                </a>

                <a href="javascript:void(0);" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                    <span class="logo-lg">
                            <img src="/assets/images/logo-light.png" alt="" height="20">
                        </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div data-simplebar="init" class="sidebar-menu-scroll mm-show"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -20px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; padding-right: 20px; padding-bottom: 0px; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">

                <!--- Sidemenu -->
                <div id="sidebar-menu" class="mm-active">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled mm-show" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li class="mm-active">
                            <a href="javascript:void(0);" class="active">
                                <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-window-section"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="true">
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                                        <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                        <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                        <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                        <li><a href="layouts-boxed.html">Boxed Width</a></li>
                                        <li><a href="layouts-preloader.html">Preloader</a></li>
                                        <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                                        <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                        <li><a href="layouts-hori-topbar-dark.html">Topbar Dark</a></li>
                                        <li><a href="layouts-hori-boxed-width.html">Boxed Width</a></li>
                                        <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-title">Apps</li>

                        <li>
                            <a href="calendar.html" class="waves-effect">
                                <i class="uil-calender"></i>
                                <span>Calendar</span>
                            </a>
                        </li>

                        <li>
                            <a href="chat.html" class=" waves-effect">
                                <i class="uil-comments-alt"></i>
                                <span class="badge rounded-pill bg-warning float-end">New</span>
                                <span>Chat</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-store"></i>
                                <span>Ecommerce</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="ecommerce-products.html">Products</a></li>
                                <li><a href="ecommerce-product-detail.html">Product Detail</a></li>
                                <li><a href="ecommerce-orders.html">Orders</a></li>
                                <li><a href="ecommerce-customers.html">Customers</a></li>
                                <li><a href="ecommerce-cart.html">Cart</a></li>
                                <li><a href="ecommerce-checkout.html">Checkout</a></li>
                                <li><a href="ecommerce-shops.html">Shops</a></li>
                                <li><a href="ecommerce-add-product.html">Add Product</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-envelope"></i>
                                <span>Email</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="email-inbox.html">Inbox</a></li>
                                <li><a href="email-read.html">Read Email</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-invoice"></i>
                                <span>Invoices</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="invoices-list.html">Invoice List</a></li>
                                <li><a href="invoices-detail.html">Invoice Detail</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-book-alt"></i>
                                <span>Contacts</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="contacts-grid.html">User Grid</a></li>
                                <li><a href="contacts-list.html">User List</a></li>
                                <li><a href="contacts-profile.html">Profile</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Pages</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-user-circle"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="auth-login.html">Login</a></li>
                                <li><a href="auth-register.html">Register</a></li>
                                <li><a href="auth-recoverpw.html">Recover Password</a></li>
                                <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-file-alt"></i>
                                <span>Utility</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="pages-starter.html">Starter Page</a></li>
                                <li><a href="pages-maintenance.html">Maintenance</a></li>
                                <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                                <li><a href="pages-timeline.html">Timeline</a></li>
                                <li><a href="pages-faqs.html">FAQs</a></li>
                                <li><a href="pages-pricing.html">Pricing</a></li>
                                <li><a href="pages-404.html">Error 404</a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Components</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-flask"></i>
                                <span>UI Elements</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="ui-alerts.html">Alerts</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-carousel.html">Carousel</a></li>
                                <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                <li><a href="ui-grid.html">Grid</a></li>
                                <li><a href="ui-images.html">Images</a></li>
                                <li><a href="ui-lightbox.html">Lightbox</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                                <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                                <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-video.html">Video</a></li>
                                <li><a href="ui-general.html">General</a></li>
                                <li><a href="ui-colors.html">Colors</a></li>
                                <li><a href="ui-rating.html">Rating</a></li>
                                <li><a href="ui-notifications.html">Notifications</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="uil-shutter-alt"></i>
                                <span class="badge rounded-pill bg-info float-end">6</span>
                                <span>Forms</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="form-elements.html">Basic Elements</a></li>
                                <li><a href="form-validation.html">Validation</a></li>
                                <li><a href="form-advanced.html">Advanced Plugins</a></li>
                                <li><a href="form-editors.html">Editors</a></li>
                                <li><a href="form-uploads.html">File Upload</a></li>
                                <li><a href="form-xeditable.html">Xeditable</a></li>
                                <li><a href="form-repeater.html">Repeater</a></li>
                                <li><a href="form-wizard.html">Wizard</a></li>
                                <li><a href="form-mask.html">Mask</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-list-ul"></i>
                                <span>Tables</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="tables-basic.html">Bootstrap Basic</a></li>
                                <li><a href="tables-datatable.html">Datatables</a></li>
                                <li><a href="tables-responsive.html">Responsive</a></li>
                                <li><a href="tables-editable.html">Editable</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-chart"></i>
                                <span>Charts</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="charts-apex.html">Apex</a></li>
                                <li><a href="charts-chartjs.html">Chartjs</a></li>
                                <li><a href="charts-flot.html">Flot</a></li>
                                <li><a href="charts-knob.html">Jquery Knob</a></li>
                                <li><a href="charts-sparkline.html">Sparkline</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-streering"></i>
                                <span>Icons</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="icons-unicons.html">Unicons</a></li>
                                <li><a href="icons-boxicons.html">Boxicons</a></li>
                                <li><a href="icons-materialdesign.html">Material Design</a></li>
                                <li><a href="icons-dripicons.html">Dripicons</a></li>
                                <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-location-point"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="maps-google.html">Google</a></li>
                                <li><a href="maps-vector.html">Vector</a></li>
                                <li><a href="maps-leaflet.html">Leaflet</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-share-alt"></i>
                                <span>Multi Level</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 1.1</a></li>
                                <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                                        <li><a href="javascript: void(0);">Level 2.1</a></li>
                                        <li><a href="javascript: void(0);">Level 2.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 937px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 227px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {}
        }
    },
    created() {
        this.user = this.$store.getters.user;
    }
}
</script>
