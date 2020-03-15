<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                        <router-link :to="{ name: 'dashboard' }" class="nav-link"><i class="fe fe-home"></i> Home
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'ket_data_siswa' }" class="nav-link"><i class="fe fe-edit"></i> Daftar
                            Ulang
                        </router-link>
                    </li>
                    @if(\Illuminate\Support\Facades\Session::get('level') == 1)
                        <li class="nav-item">
                            <router-link :to="{ name: 'data_siswa' }" class="nav-link"><i class="fe fe-users"></i> Data
                                Siswa
                            </router-link>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
