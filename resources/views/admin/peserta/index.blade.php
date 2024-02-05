@extends('admin.layouts.index')

@section('content')
    <div class="d-md-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <a href="#" class="btn btn-success order-last"><small>Tambah Data</small></a>
        <form class="d-flex col-md-5 mt-md-0 mt-3" role="search" method="get">
            <input class="form-control form-control-sm me-2" type="search" name="cari" value=""
                placeholder="Ketikkan Nama" aria-label="Pencarian">
            <button id="submit" class="btn btn-outline-success btn-sm w-25" disabled type="submit">Cari</button>
            <a href="#" class="btn btn-outline-danger btn-sm w-25 ms-2">Reset</a>
        </form>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-3 border-0 p-2 table-responsive-lg rounded-3 shadow-sm">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Sertifikat</th>
                            <th scope="col">Tema Pelatihan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>nana</td>
                            <td>12212112121</td>
                            <td class="text-capitalize">python</td>
                            <td class="d-flex gap-1">
                                <a href="#" class="badge text-bg-primary border-0"><span
                                        data-feather="file-text"></span></a>
                                <form action="#" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Apakah Yakin?')" type="submit"
                                        class="badge text-bg-danger border-0"><span data-feather="trash"></span></button>
                                </form>
                                <a href="#" class="badge text-bg-info text-light border-0"><span
                                        data-feather="edit"></span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-md-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <a href="#" class="btn btn-outline-dark order-last"><small>Tampilkan Semua    </small><i class="bi bi-caret-down-square"></i></a>
    </div>

    <script>
        $(document).on('change', function() {
            $("#submit").removeAttr('disabled');
        })
    </script>
@endsection
