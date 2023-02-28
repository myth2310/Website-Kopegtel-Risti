<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('layouts.template.admin')

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card ml-4 mt-2">
        <div class="card-header">
            <h3>
                {{isset($member)?"Ubah Anggota":"Tambah Anggota baru"}} 
            </h3>
        </div>
        
        <div class="card-body">
            <form action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="_method" value="{{$method}}">
                <div class="form-group">
                    <label for="" class="form-control-label">Nama Anggota</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        placeholder="Enter name..."
                        maxlength="60"
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ isset($member)?$member->name:old('name') }}"
                    >
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="" class="form-control-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="name@example.com"
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ isset($member)?$member->email:old('email') }}"
                    >
                    @error('email')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>      

                <div class="form-group">
                    <label for="" class="form-control-label">Nomor Telepon</label>
                    <input 
                        type="tel" 
                        name="phone" 
                        id="phone" 
                        placeholder="+62"
                        class="form-control @error('phone') is-invalid @enderror" 
                        value="{{ isset($member)?$member->phone:old('phone') }}"
                    >
                    @error('phone')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Posisi</label>
                     <select class="form-select" aria-label="Default select example" name="position">
                        <option selected>Pilih Posisi</option>
                        <option value="Ketua">Ketua</option>
                        <option value="Wakil">Wakil</option>
                        <option value="Sekertaris">Sekertaris</option>
                        <option value="Bendahara">Bendahara</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                     <select class="form-select" aria-label="Default select example" name="status">
                        <option selected>Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Pensiun">Pensiun</option>
                    </select>
                </div>

                

                <div class="form-group">
                    <label for="" class="form-control-label">Alamat</label>
                    <textarea 
                        name="address" 
                        id="exampleFormControlTextarea1" 
                        rows="3" 
                        placeholder="Enter address..."
                        maxlength="60"
                        class="form-control @error('address') is-invalid @enderror" 
                    >{{ isset($member)?$member->address:old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>          

                <div class="form-group">
                    <label class="form-control-label">Foto</label>   
                    @if (isset($member))                        
                        <p>
                            Image uploaded: 
                            <strong> PasFoto_{{$member->name}}{{substr($member->image,-4)}} </strong>
                        </p>                      
                    @endif   
                    <div class="custom-file">
                        <input 
                            type="file" 
                            name="image" 
                            class="custom-file-input"
                            id="customFileLang" 
                            lang="en"
                        {{isset($member)?"":"required"}}>
                        <label 
                            class="custom-file-label text-truncate selected" 
                            for="customFileLang"
                        ></label>
                    </div>                
                    @error('image')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="/member" class="btn btn-secondary">
                        Batal
                    </a>                            
                    <button type="submit" class="btn btn-primary"> 
                        {{isset($member)?"Simpan":"Tambah Anggota"}}                            
                    </button>                            
                </div>                
            </form>
        </div>
    </div>      
</div>    
@endsection
