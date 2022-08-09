@extends('layouts.template.admin')

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card">
        <div class="card-header">
            <h3>Tambah Dokumen Baru</h3>
        </div>

        <div class="card-body">
            <form action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="_method" value="{{$method}}">
                <div class="form-group">
                    <label for="" class="form-control-label">Name</label>
                    <input 
                        type="text" 
                        name="fileName" 
                        id="fileName" 
                        placeholder="Enter name..."
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{isset($document)?$document->fileName:old('fileName')}}"
                    >
                    @error('fileName')
                        <small id="nameHelp" class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>  
                
                @if (isset($document))            
                    <div class="form-group">
                        <label for="" class="form-control-label">Dokumen ini dapat diunduh?</label>
                        <div class="custom-control custom-radio mb-3 @error('status') is-invalid @enderror">
                            <input 
                                type="radio" 
                                id="customRadio1" 
                                name="status" 
                                class="custom-control-input"
                                value="yes"
                                @if (isset($document))
                                    {{$document->status == "yes" ? "checked":""}}                                    
                                @endif
                            >
                            <label class="custom-control-label" for="customRadio1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio" >
                            <input 
                                type="radio" 
                                id="customRadio2" 
                                name="status" 
                                class="custom-control-input"
                                value="no"
                                @if (isset($document))
                                    {{$document->status == "no" ? "checked":""}}                                    
                                @endif
                            >
                            <label class="custom-control-label" for="customRadio2">Tidak</label>
                        </div>
                        @error('status')
                            <small id="nameHelp" class="alert-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endif

                <div class="form-group">
                    <label class="form-control-label">Dokumen</label>
                    <div class="custom-file">
                        <input 
                            type="file" 
                            name="file" 
                            class={{isset($document)?'file-input':'custom-file-input'}}
                            id="customFileLang" 
                            lang="id"
                            value="asdsad"
                        >
                        <label 
                            class="custom-file-label" 
                            for="customFileLang"
                        > {{isset($document)?$document->file:old('file', 'Pilih file')}} 
                        </label>
                    </div>                
                </div>

                <div class="form-group">
                    <a href="/document" class="btn btn-secondary">
                    @if (Session::get('success'))
                        Kembali
                    @else
                        Batal
                    @endif
                    </a>                            
                    <button type="submit" class="btn btn-primary"> 
                        {{isset($document)?"Simpan":"Tambah Dokumen"}}                            
                    </button>                            
                </div>                
            </form>
        </div>
    </div>      
</div>    
@endsection
