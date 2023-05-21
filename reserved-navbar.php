<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <img src="logo_CITYEX.png" alt="...">
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                   
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="./admin.php">
                            <i class="bi bi-house"></i> Admin Page
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./dashboard.php">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./buy-vouchers.php">
                            <i class="bi bi-bar-chart"></i> Acquista Vouchers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./buy-track.php">
                            <i class="bi bi-bookmarks"></i> Acquista Tratta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cart.php">
                            <i class="bi bi-chat"></i> Carrello
                            <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto"><?php if (isset($_SESSION) && array_key_exists("cart",$_SESSION)) {echo count($_SESSION["cart"]);}else echo 0;?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-people"></i> Users
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-square"></i> Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <style>
    /* Webpixels CSS */
/* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
/* URL: https://github.com/webpixels/css */

@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");
.navbar
{
    box-shadow: inset 0 0 15px rgba(55, 84, 170, 0), inset 0 0 20px rgba(255, 255, 255, 0), 7px 7px 15px rgba(55, 84, 170, .15), -7px -7px 20px rgba(255, 255, 255, 1), inset 0px 0px 4px rgba(255, 255, 255, .2);
	 -webkit-touch-callout: none;
}  
</style>