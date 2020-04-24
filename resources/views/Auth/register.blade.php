<!doctype html>
<html lang="en" dir="ltr">
<head>
    <link href="{{ asset('tabler') }}/assets/css/dashboard.css" rel="stylesheet" />
    <script src="{{ asset('tabler') }}/assets/js/dashboard.js"></script>
    <link href="{{ asset('tabler') }}/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="{{ asset('tabler') }}/assets/plugins/charts-c3/plugin.js"></script>
    <link href="{{ asset('tabler') }}/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="{{ asset('tabler') }}/assets/plugins/maps-google/plugin.js"></script>
    <script src="{{ asset('tabler') }}/assets/plugins/input-mask/plugin.js"></script>
    <script src="{{ asset('tabler') }}/assets/plugins/datatables/plugin.js"></script>
</head>
<body class="">
<div class="page">
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <h2>Thawalib</h2>
                    </div>
                    <form class="card" action="{{ route('daftar') }}" method="post">
                        <div class="card-body p-6">
                            <div class="card-title">Create new account</div>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input name="username" type="text" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nisn Siswa</label>
                                <input name="nisn" type="number" class="form-control" placeholder="Nisn">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        Already have account? <a href="{{ route('loginPage') }}">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
