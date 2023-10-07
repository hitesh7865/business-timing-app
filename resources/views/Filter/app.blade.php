@include('Common.head')
@include('Common.header')
<body class="sb-nav-fixed">
<div id="layoutSidenav">
@include('Common.sidebar')
@include('Filter.main')
@include('Common.ofooter')
</div>
@include('Common.footer')
<script>
    $(document).ready(function() {
        $('#filterTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>
</body>