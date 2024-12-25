 <!-- Spinner Start -->
 <div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
     <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
     </div>
 </div>
 <!-- Spinner End -->


 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3 ">
     <nav class="navbar bg-light navbar-light">
         <a href="/" class="navbar-brand mx-4 mb-3">
             <div class="text-primary m-2 pr-4 mt-4 mb-3"><img src="{{ asset('img/logo6.png') }}"
                     style="width: 400px; height:40px; margin-left: -5px" alt=""></div>

         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="{{ asset('img/user.jpg') }}" alt=""
                     style="width: 40px; height: 40px;">
                 <div
                     class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                 </div>
             </div>
             <div class="ms-3">
                 <h6 class="mb-0">LabTech</h6>
                 <span>Admin</span>
             </div>
         </div>
         <div class="navbar-nav w-100">
             <a href="/" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"
                     style="background-color: transparent"></i>Dashboard</a>
             <div class="navbar-nav w-100">
                 <a href="/users" class="nav-item nav-link "><i class="fa-solid fa-user"
                         style="background-color: transparent"></i>User</a>

                 <div class="navbar-nav w-100">
                     <a href="/products" class="nav-item nav-link "><i class="fa-solid fa-box"
                             style="background-color: transparent"></i>Products</a>

                     <div class="navbar-nav w-100">
                         <a href="/categories" class="nav-item nav-link "><i class="fa-solid fa-boxes-stacked"
                                 style="background-color: transparent"></i>Categories</a>

                         <div class="navbar-nav w-100">
                             <a href="/testings" class="nav-item nav-link "><i class="fa-solid fa-microscope"
                                     style="background-color: transparent"></i>Testings</a>

                             <div class="navbar-nav w-100">
                                 <a href="/reports" class="nav-item nav-link "><i class="fa-solid fa-laptop me-2"
                                         style="background-color: transparent"></i>Reports</a>
                             </div>
                         </div>


                     </div>
                 </div>
             </div>
     </nav>
 </div>
 <!-- Sidebar End -->
