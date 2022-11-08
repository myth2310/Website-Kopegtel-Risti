@extends('layouts.template.admin')

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card">
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
                    <label for="" class="form-control-label">Nama</label>
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
                

                @if (isset($member))                    
                    <div class="form-group">
                        <label for="" class="form-control-label">Jabatan</label>
                        <select class="form-control @error('position') is-invalid @enderror" id="position" name="position">
                            <option value="Anggota" {{($member->position == "Anggota" ? "selected": "")}}>Anggota</option>
                            <option value="Ketua" {{($member->position == "Ketua" ? "selected": "")}}>Ketua</option>
                            <option value="Sekretaris" {{($member->position == "Sekretaris" ? "selected": "")}}>Sekretaris</option>
                            <option value="Bendahara" {{($member->position == "Bendahara" ? "selected": "")}}>Bendahara</option>
                            <option value="Korbid Usaha 1" {{($member->position == "Korbid Usaha 1" ? "selected": "")}}>Korbid Usaha 1</option>
                            <option value="Korbid Usaha 2" {{($member->position == "Korbid Usaha 2" ? "selected": "")}}>Korbid Usaha 2</option>
                        </select>
                        @error('position')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="form-control-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="Aktif" {{($member->status == "Aktif" ? "selected": "")}}>Aktif</option>
                            <option value="Pensiun" {{($member->status == "Pensiun" ? "selected": "")}}>Pensiun</option>
                            <option value="Luar Biasa" {{($member->status == "Luar Biasa" ? "selected": "")}}>Luar Biasa</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                @endif

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
