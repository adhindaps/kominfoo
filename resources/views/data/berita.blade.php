@extends("admin.index")
@section("content")
<div class="main-panel">
    <div class="content">
<div class="card">
    <div class="card-header">
        <div class="card-title">Table Berita</div>
        <a href="/beritacreate" class="btn btn-primary" >Tambah </a> 
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto </th>
                        <th>Nama Berita</th>
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
                        <td>{{ $data->namaberita }}</td>
                        <td>{!! $data->catatan !!}</td>
                        <td><a href="/beritaedit/{{ $data->id }}" class="btn btn-warning">
                            <i class="la la-pencil"></i></a>
                        
                               <a href="#" class="btn btn-danger deleteberita"
                            data-id="{{ $data->id }}"
                            data-berita="{{ $data->berita }}">
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
    $('.deleteberita').click(function() {
        var beritaid = $(this).attr('data-id');
        var berita = $(this).attr('data-berita');
        Swal.fire({
            title: 'Apakah Kamu yakin?',
            text: "Menghapus berita " + berita + "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/deleteberita/" + beritaid + ""
                Swal.fire(
                    'Terhapus!',
                    'data ' + berita + ' terhapus',
                    'success'
                )
            }
        })
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection