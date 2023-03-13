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
                        
                               <a href="/deletepengumuman/{{ $data->id }}" class="btn btn-danger deletepengumuman"
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
        var pengumumanid = $(this).attr('data-id');
        var pengumuman = $(this).attr('data-pengumuman');
        Swal.fire({
            title: 'Apakah Kamu yakin?',
            text: "Menghapus pengumuman " + pengumuman + "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/deletepengumuman/" + pengumumanid + ""
                Swal.fire(
                    'Terhapus!',
                    'data ' + pengumuman + ' terhapus',
                    'success'
                )
            }
        })
    });
</script>
@endsection