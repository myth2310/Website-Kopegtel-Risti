@extends('layouts.template.admin')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card ml-4 mt-2">
        <div class="card-header">
            <h3>
                {{isset($activity)?"Ubah Kegiatan":"Tambah Kegiatan Baru"}} 
            </h3>
        </div>
        
        <div class="card-body">
            <form action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="_method" value="{{$method}}">
                <div class="form-group">
                    <label for="" class="form-control-label">Nama Kegiatan</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        placeholder="Enter name..."
                        maxlength="200"
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{isset($activity)?$activity->name:old('name')}}"
                    >
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="" class="form-control-label">Tanggal</label>
                    <input 
                        type="date" 
                        name="date" 
                        id="date" 
                        class="form-control @error('date') is-invalid @enderror" 
                        value="{{isset($activity)?$activity->date:old('date')}}"
                    >
                    @error('date')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>        

                <div class="form-group">
                    <label for="" class="form-control-label">Deskripsi</label>
                    <input id="description" type="hidden" name="description" class="form-control @error('description') is-invalid @enderror"
                    value="{{isset($activity)?$activity->description:old('description')}}">
                    <trix-editor input="description"></trix-editor>
                    {{-- <textarea 
                        name="description" 
                        id="exampleFormControlTextarea1" 
                        rows="3" 
                        maxlength="3000"
                        placeholder="Enter description..."
                        class="form-control @error('description') is-invalid @enderror"
                    >{{isset($activity)?$activity->description:old('description')}}</textarea> --}}
                    @error('description')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>          

                <div class="form-group">
                    <label class="form-control-label">Gambar</label>      
                    @if (isset($activity))                        
                        <p>
                            Image uploaded:
                            <strong> {{$activity->name}}{{substr($activity->image,-4)}} </strong>
                        </p>                       
                    @endif
                    <div class="custom-file">
                        <input 
                            type="file" 
                            name="image" 
                            class="custom-file-input"
                            id="customFileLang" 
                            lang="en"
                        {{isset($activity)?"":"required"}}>
                        <label 
                            class="custom-file-label" 
                            for="customFileLang"
                        > </label>
                    </div>                
                </div>

                <div class="form-group">
                    <a href="/activity" class="btn btn-secondary">
                        Batal
                    </a>                            
                    <button type="submit" class="btn btn-primary"> 
                        {{isset($activity)?"Simpan":"Tambah Kegiatan"}}                            
                    </button>                            
                </div>                
            </form>
        </div>
    </div>      
</div>    
@endsection
