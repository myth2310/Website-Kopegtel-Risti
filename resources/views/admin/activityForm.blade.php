@extends('layouts.template.admin')

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card">
        <div class="card-header">
            <h3>Tambah Kegiatan Baru</h3>
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
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{isset($activity)?$activity->name:old('name')}}"
                    >
                    @error('name')
                        <small id="nameHelp" class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="" class="form-control-label">Date</label>
                    <input 
                        type="date" 
                        name="date" 
                        id="date" 
                        class="form-control @error('date') is-invalid @enderror" 
                        value="{{isset($activity)?$activity->date:old('date')}}"
                    >
                    @error('date')
                        <small id="dateHelp" class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>      

                <div class="form-group">
                    <label for="" class="form-control-label">Description</label>
                    <textarea 
                        name="description" 
                        id="exampleFormControlTextarea1" 
                        rows="3" 
                        placeholder="Enter description..."
                        class="form-control @error('description') is-invalid @enderror"
                    >{{isset($activity)?$activity->description:old('description')}}</textarea>
                    @error('description')
                        <small id="descriptionHelp" class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>          

                <div class="form-group">
                    <label class="form-control-label">Gambar</label>                            
                    <div class="custom-file">
                        <input 
                            type="file" 
                            name="image" 
                            class={{isset($activity)?'file-input':'custom-file-input'}}
                            id="customFileLang" 
                            lang="en"
                        >
                        <label 
                            class="custom-file-label" 
                            for="customFileLang"
                        > {{isset($activity)?$activity->image:('Pilih file')}} 
                        </label>
                    </div>                
                </div>

                <div class="form-group">
                    <a href="/activity" class="btn btn-secondary">
                    @if (Session::get('success'))
                        Kembali
                    @else
                        Batal
                    @endif
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
