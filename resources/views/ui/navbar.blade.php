<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top py-0 m-0">
    <div class="container-fluid p-0">
        <a href="/dashboard" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" style="width:80px; height:20px;" alt="">
            </h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item">
                <img class="rounded-circle me-lg-2" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" style="width:50px" alt="">
                @auth
                    <span class="d-none d-lg-inline-flex">
                        {{ Auth::user()->name }}
                    </span>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="/logout" class="dropdown-item">Log Out</a>
                    </div>
                @else
                    <button style="color: black; padding-left:5px;">Login</button>
                @endauth
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
