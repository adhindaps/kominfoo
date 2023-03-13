@extends("admin.index")
@section("content")
<div class="main-panel">
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Pengumuman</div>
                </div>
                
                <div class="card-body">
                    <form action="/pengumumanupdate/{{ $data->id }}" method="POST" enctype="multipart/form-data" >  
                        @csrf
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto</label>
                        <img class="img mb-3" src="{{ asset('foto/' . $data->foto) }}" alt="" style="width: 100px;">
                        <input type="file"  id="foto" name="foto" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="squareInput">Nama Kegiatan</label>
                        <input type="text" name="namakegiatan" value="{{$data->namakegiatan}}" class="form-control input-square" id="squareInput" placeholder="nama kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="squareInput">Judul</label>
                        <input type="text" name="judul" value="{{$data->judul}}" class="form-control input-square" id="squareInput" placeholder="judul">
                    </div>
                    <div class="form-group">
                        <label for="comment">Catatan</label>
                        <textarea class="form-control" name="deskripsi" id="editor" rows="5">
                            {!! $data->deskripsi !!}
                        </textarea>
                    </div>								
                </div>
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
            </div>
        
        </div>
    </div>
</div>
</div>
@include('admin.footeradmin')
@endsection

@section('ck-editor')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection