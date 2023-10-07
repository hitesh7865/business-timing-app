@include('Common.head')
@include('Common.header')

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        @include('Common.sidebar')
        @include('Parent.main')
        @include('Common.ofooter')
    </div>
</body>