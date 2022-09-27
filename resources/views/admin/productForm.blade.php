@extends('layouts.template.admin')

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card">
        <div class="card-header">
            <h3>
                {{isset($product)?"Ubah Produk":"Tambah Produk Baru"}} 
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
                        value="{{isset($product)?$product->name:old('name')}}"
                    >
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>  

                <div class="form-group">
                    <label for="" class="form-control-label">Description</label>
                    <textarea 
                        name="description" 
                        id="exampleFormControlTextarea1" 
                        rows="3" 
                        maxlength="150"
                        placeholder="Enter description..."
                        class="form-control @error('description') is-invalid @enderror"
                    >{{isset($product)?$product->description:old('description')}}</textarea>
                    @error('description')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>          

                <div class="form-group">
                    <label class="form-control-label">Gambar</label>
                    @if (isset($product))                        
                        <p>
                            Image uploaded: 
                            <strong> {{$product->name}}{{substr($product->image,-4)}} </strong>
                        </p>                      
                    @endif                      
                    <div class="custom-file">
                        <input 
                            type="file" 
                            name="image" 
                            class="custom-file-input"
                            id="customFileLang" 
                            lang="en"
                        {{isset($product)?"":"required"}}>
                        <label 
                            class="custom-file-label" 
                            for="customFileLang"
                        ></label>
                    </div>                
                </div>

                <div class="form-group">
                    <a href="/product" class="btn btn-secondary">
                        Batal
                    </a>                            
                    <button type="submit" class="btn btn-primary"> 
                        {{isset($product)?"Simpan":"Tambah Produk"}}                            
                    </button>                            
                </div>                
            </form>
        </div>
    </div>      
</div>    
@endsection
