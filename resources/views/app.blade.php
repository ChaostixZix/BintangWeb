@include('header')
<body class="">
<div id="app" class="page">
    <div class="flex-fill">
        @include('right_menu')
        @include('navbar')
        <div class="my-3 my-md-5">
            <div class="container">
                <router-view></router-view>
            </div>
        </div>
    </div>
    @include('footer')
</div>
</body>

