<div class="top-left">
    <div class="navbar-header">
        <a class="navbar-brand" href="/dashboard"><img src="{{asset('images/logo-2.png')}}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="#"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a>
        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
    </div>
</div>
<div class="top-right">
    <div class="header-menu">
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" style="height:40px" src="{{asset('assets/images/pictIcha.jpg')}}" alt="User Avatar">
            </a>
            
            <div class="user-menu dropdown-menu">
                <a class="nav-link" href="/aboutMe"><i class="fa fa- user"></i>My Profile</a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                    <a href="#" onclick="document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
                </form>


            </div>
        </div>

    </div>
</div>