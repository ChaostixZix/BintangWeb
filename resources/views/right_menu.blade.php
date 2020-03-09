<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="{{ asset('tabler') }}/index.html">
                <img src="http://ppdb.thawalibpadangpanjang.sch.id/scrooge/logo.jpg" class="header-brand-img"
                     alt="tabler logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto">
                @if(!\Illuminate\Support\Facades\Session::has('username'))
                    <div class="nav-item d-none d-md-flex">
                        <a href="https://github.com/tabler/tabler" class="btn btn-sm btn-outline-primary"
                           target="_blank">Login</a>
                    </div>
                @else
                    <div class="dropdown">
                        <a class="nav-link pr-0 leading-none" data-toggle="dropdown">
                            <span class="avatar"
                                  style="background-image: url({{ asset('tabler') }}/demo/faces/female/25.jpg)"></span>
                            <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{\Illuminate\Support\Facades\Session::get('username')}}</span>
                      <small class="text-muted d-block mt-1">{{\Illuminate\Support\Facades\Session::get('nisn')}}</small>
                    </span>
                        </a>
                    </div>
                    <div class="nav-item d-none d-md-flex">
                        <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-primary"
                           target="_blank">Logout</a>
                    </div>
                @endif
            </div>
            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
               data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>
