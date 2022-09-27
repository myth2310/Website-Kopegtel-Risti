@extends('layouts.template.admin')

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card">
        <div class="card-header">
            <h3>
                {{isset($banner)?"Ubah Banner":"Tambah Banner Baru"}} 
            </h3>
        </div>
        
        <div class="card-body">
            <form action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="_method" value="{{$method}}">
                <div class="form-group">
                    <label for="" class="form-control-label">Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        placeholder="Enter name..."
                        maxlength="60"
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{isset($banner)?$banner->name:old('name')}}"
                    >
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>                     

                @if (isset($banner))                    
                    <div class="form-group">
                        <label for="" class="form-control-label">Tampilkan foto ini di dashboard?</label>
                        <div class="custom-control custom-radio mb-3 @error('status') is-invalid @enderror">
                            <input 
                                type="radio" 
                                id="customRadio1" 
                                name="status" 
                                class="custom-control-input"
                                value="yes"
                                @if (isset($banner))
                                    {{$banner->status == "yes" ? "checked":""}}                                    
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
                                @if (isset($banner))
                                    {{$banner->status == "no" ? "checked":""}}                                    
                                @endif
                            >
                            <label class="custom-control-label" for="customRadio2">Tidak</label>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label class="form-control-label">Gambar</label>
                    @if (isset($banner))                        
                        <p>
                            Image uploaded: 
                            <strong> {{$banner->name}}{{substr($banner->image,-4)}} </strong>
                        </p>                      
                    @endif                       
                    <div class="custom-file">
                        <input 
                            type="file" 
                            name="image"
                            class="custom-file-input"
                            id="customFileLang" 
                            lang="en"
                        {{isset($banner)?"":"required"}}>                        
                        <label 
                            class="custom-file-label" 
                            for="customFileLang"
                        ></label>
                    </div>                
                </div>

                <div class="form-group">
                    <a href="/banner" class="btn btn-secondary">
                        Batal
                    </a>                            
                    <button type="submit" class="btn btn-primary"> 
                        {{isset($banner)?"Simpan":"Tambah Gambar"}}                            
                    </button>                           
                </div>                
            </form>
        </div>
    </div>      
</div>    
@endsection
