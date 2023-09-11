<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
    <div class="sidebar-contents">
    <div id="sidebar-menu" class="sidebar-menu">
    <div class="mobile-show">
    <div class="offcanvas-menu">
    <div class="user-info align-center bg-theme text-center">
    <span class="lnr lnr-cross  text-white" id="mobile_btn_close">X</span>
    <a href="javascript:void(0)" class="d-block menu-style text-white">
    <div class="user-avatar d-inline-block mr-3">
    <img src="{{ asset('assets/img/profiles/avatar-18.jpg') }}" alt="user avatar" class="rounded-circle" width="50">
    </div>
    </a>
    </div>
    </div>
    <div class="sidebar-input">
    <div class="top-nav-search">
    <form>
    <input type="text" class="form-control" placeholder="Search here">
    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
    </form>
    </div>
    </div>
     </div>
    <ul>
    <li class="active">
    <a href=""><img src="{{ asset('assets/img/home.svg') }}" alt="sidebar_img"> <span>Dashboard</span></a>
    </li>
    <li>
    <a href=""><img src="{{ asset('assets/img/employee.svg') }}" alt="sidebar_img"><span> Users</span></a>
    </li>
    <li>
    <a href="{{ route('clientcategories.index') }}"><img src="{{ asset('assets/img/company.svg') }}" alt="sidebar_img"> <span> Categories</span></a>
    </li>
    <li>
    <a href="{{ route('clients.index') }}"><img src="{{ asset('assets/img/calendar.svg') }}" alt="sidebar_img"> <span>Abonnees</span></a>
    </li>
    <li>
    <a href="{{ route('factures.index') }}"><img src="{{ asset('assets/img/leave.svg') }}" alt="sidebar_img"> <span>Factures</span></a>
    </li>

    <li>
    <a href="{{ route('forfaits.index') }}"><img src="{{ asset('assets/img/report.svg') }}" alt="sidebar_img"><span>Forfaits</span></a>
    </li>
    </ul>
    <ul class="logout">
    <li>
    <a href="{{ route('logout') }}"><img src="{{ asset('assets/img/logout.svg') }}" alt="sidebar_img"><span>Log out</span></a>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>