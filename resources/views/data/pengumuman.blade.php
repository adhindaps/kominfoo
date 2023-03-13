@extends("admin.index")
@section("content")
<div class="main-panel">
    <div class="content">
<div class="card">
    <div class="card-header">
        <div class="card-title">Table Pengumuman</div>
        <a href="/pengumumancreate" class="btn btn-primary" >Tambah </a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto </th>
                        <th>Nama Kegiatan</th>
                        <th>Judul</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <th scope="data">{{ $no++ }}</th>
                        <td><img alt=" " src="foto/{{ $data->foto }}"width="100px" ></td>
                        <td>{{ $data->namakegiatan }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{!! $data->deskripsi !!}</td>
                        <td><a href="/pengumumanedit/{{ $data->id }}" class="btn btn-warning">
                            <i class="la la-pencil"></i></a>

                               <a href="#" class="btn btn-danger deletepengumuman"
                            data-id="{{ $data->id }}"
                            data-pengumuman="{{ $data->pengumuman }}">
                            <i class="la la-trash-o"></i></a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>
</div>
@include('admin.footeradmin')
<script>
    $('.deletepengumuman').click(function() {
        var beritaid = $(this).attr('data-id');
        var berita = $(this).attr('data-berita');

        swal({
                title: "Apakah kamu yakin?",
                text: "Kamu akan menghapus berita " + berita + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletepengumuman/" + beritaid + ""
                    swal("Data berhasil dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
