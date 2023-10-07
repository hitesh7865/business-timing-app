@include('new-layouts.head')
@include('new-layouts.header')

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        @include('new-layouts.sidebar')
        @include('business.partials.edit')
        @include('new-layouts.ofooter')
    </div>
</body>
