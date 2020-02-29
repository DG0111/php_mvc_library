<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo e(ADMIN_ASSET_URL); ?>images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo e(ADMIN_ASSET_URL); ?>images/logo-mini.svg" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-equal"></span>
        </button>
        <form class="form-inline d-none d-lg-block search my-auto">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search here...">
                <div class="input-group-append">
                    <i class="mdi mdi-magnify"></i>
                </div>
            </div>
        </form>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-lg-flex">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-earth mr-2"></i>
                    English
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="#">
                        French
                    </a>
                    <a class="dropdown-item" href="#">
                        Spain
                    </a>
                    <a class="dropdown-item" href="#">
                        Latin
                    </a>
                    <a class="dropdown-item" href="#">
                        Japanese
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                   data-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0 bg-white">Notifications</h6>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-calendar"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="text-small text-muted text-right mb-0">4:10 PM</p>
                            <p class="preview-subject">Event today</p>
                            <p class="text-muted text-small ellipsis">
                                Just a reminder that you have an event today
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                                <i class="mdi mdi-settings"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="text-small text-muted text-right mb-0">4:10 PM</p>
                            <p class="preview-subject">Settings</p>
                            <p class="text-muted text-small ellipsis">
                                Update dashboard
                            </p>
                        </div>
                    </a>
                    <h6 class="p-3 mb-0 text-center bg-white">See all notifications</h6>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                   data-toggle="dropdown">
                    <i class="mdi mdi-email-outline"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0 bg-white">Messages</h6>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow">
                            <span class="badge badge-pill badge-danger">REQUEST</span>
                            <p class="preview-subject">Support request</p>
                            <p class="text-small text-muted ellipsis mb-0">
                                Please provide support for the items in queue
                            </p>
                        </div>
                        <p class="text-small text-muted align-self-start">4:10 PM</p>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow">
                            <span class="badge badge-pill badge-primary">INVOICES</span>
                            <p class="preview-subject">Invoice received</p>
                            <p class="text-small text-muted ellipsis mb-0">
                                The invoice for the items have been received in your inbox
                            </p>
                        </div>
                        <p class="text-small text-muted align-self-start">1 day ago</p>
                    </a>
                    <h6 class="p-3 mb-0 text-center bg-white">4 new messages</h6>
                </div>
            </li>

            <li class="nav-item nav-item-highlight">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-logout"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-equal"></span>
        </button>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\baiTap2\app\views/layouts/admin_navbar.blade.php ENDPATH**/ ?>