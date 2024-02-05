@extends('admin.layouts.index')

@section('content')
    <div class="d-md-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <a href="#" class="btn btn-success order-last"><small>Tambah Sertifikat</small></a>
        <form class="d-flex col-md-5 mt-md-0 mt-3" role="search" method="get">
    </div>

        <div class="row">
            <div class="col">
                <div class="card mb-3 border-0 p-2 table-responsive-lg rounded-3 shadow-sm">
                    
                </div>
            </div>
        </div>

    <script>
        $(document).on('change', function() {
            $("#submit").removeAttr('disabled');
        })
    </script>
@endsection
