@extends('layouts.template.admin')

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card ml-4 mt-2">
        <div class="card-header">
            <h3>
                {{isset($document)?"Ubah Dokumen":"Tambah Dokumen Baru"}} 
            </h3>
        </div>

        <div class="card-body">
            <form action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="_method" value="{{$method}}">
                <div class="form-group">
                    <label for="" class="form-control-label">Nama Dokumen</label>
                    <input 
                        type="text" 
                        name="fileName" 
                        id="fileName" 
                        placeholder="Enter name..."
                        maxlength="60"
                        class="form-control @error('fileName') is-invalid @enderror" 
                        value="{{isset($document)?$document->fileName:old('fileName')}}"
                    >
                    @error('fileName')
                        <div class="invalid-feedback"> {{ $message }} </div>
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
                    @if (isset($document))                        
                        <p>
                            Document uploaded: 
                            <strong> {{$document->fileName}}.{{$document->fileType}} </strong>
                        </p>                      
                    @endif                       
                    <div class="custom-file">
                        <input 
                            type="file" 
                            name="file" 
                            class="custom-file-input"
                            id="customFileLang" 
                            lang="id"
                            value="asdsad"
                        {{isset($document)?"":"required"}}>
                        <label 
                            class="custom-file-label" 
                            for="customFileLang"
                        ></label>
                    </div>                
                </div>

                <div class="form-group">
                    <a href="/document" class="btn btn-secondary">
                        Batal
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
