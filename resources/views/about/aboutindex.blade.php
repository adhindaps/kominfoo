@extends("admin.index")
@section("content")
<div class="main-panel">
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form action="/aboutupdate" method="POST" enctype="multipart/form-data" >  
                        @csrf
                    <div class="card-title">Tentang Kami</div>
                    <input type="text" value="{{$data->id}}" name="id" class="form-control" id="inputPassword4" placeholder="" hidden>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto</label>
                        <img class="img mb-3" src="foto/{{ $data->foto }}" alt="" style="width: 100px;">
                        <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="squareInput">Judul</label>
                        <input type="text" value="{{$data->judul}}" name="judul" class="form-control input-square" id="squareInput" placeholder="Square Input">
                    </div>
                    <div class="form-group">
                        <label for="comment">Deskripsi</label>
                        <textarea class="form-control" id="editor" name="deskripsi" rows="5">
                            {!! $data->deskripsi !!}
                        </textarea>
                    </div>								
                </div>
                <div class="card-action">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
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