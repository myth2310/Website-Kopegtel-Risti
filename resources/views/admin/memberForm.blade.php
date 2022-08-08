@extends('layouts.template.admin')

@section('content')
<div 
    class="container"
    style="padding-left: 200px; padding-top: 92px;"
>   
    <div class="card">
        <div class="card-header">
            <h3>Tambah Anggota Baru</h3>
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
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ isset($member)?$member->name:old('name') }}"
                    >
                    @error('name')
                        <small id="nameHelp" class="alert-danger">{{ $message }}</small>
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
                        <small id="emailHelp" class="alert-danger">{{ $message }}</small>
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
                        <small id="phoneHelp" class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                @if (isset($member))                    
                    <div class="form-group">
                        <label for="" class="form-control-label">Position</label>
                        <select class="form-control @error('position') is-invalid @enderror" id="position" name="position">
                            <option value="Anggota" {{($member->position == "Anggota" ? "selected": "")}}>Anggota</option>
                            <option value="Ketua" {{($member->position == "Ketua" ? "selected": "")}}>Ketua</option>
                            <option value="Sekretaris" {{($member->position == "Sekretaris" ? "selected": "")}}>Sekretaris</option>
                            <option value="Bendahara" {{($member->position == "Bendahara" ? "selected": "")}}>Bendahara</option>
                            <option value="Korbid Usaha 1" {{($member->position == "Korbid Usaha 1" ? "selected": "")}}>Korbid Usaha 1</option>
                            <option value="Korbid Usaha 2" {{($member->position == "Korbid Usaha 2" ? "selected": "")}}>Korbid Usaha 2</option>
                        </select>
                        @error('position')
                            <small id="position" class="alert-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="form-control-label">Status</label>
                        <div class="custom-control custom-radio mb-3 @error('status') is-invalid @enderror">
                            <input 
                                type="radio" 
                                id="customRadio1" 
                                name="status" 
                                class="custom-control-input"
                                value="Aktif"
                                {{$member->status == "Aktif" ? "checked":""}}
                            >
                            <label class="custom-control-label" for="customRadio1">Active</label>
                            </div>
                            <div class="custom-control custom-radio" >
                            <input 
                                type="radio" 
                                id="customRadio2" 
                                name="status" 
                                class="custom-control-input"
                                value="Pensiun"
                                {{$member->status == "Pensiun" ? "checked":""}}
                            >
                            <label class="custom-control-label" for="customRadio2">Inactive</label>
                        </div>
                        @error('status')
                            <small id="status" class="alert-danger">{{ $message }}</small>
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
                        class="form-control @error('address') is-invalid @enderror" 
                    >{{ isset($member)?$member->address:old('address') }}</textarea>
                    @error('address')
                        <small id="addressHelp" class="alert-danger">{{ $message }}</small>
                    @enderror
                </div>          

                <div class="form-group">
                    <a href="/member" class="btn btn-secondary">
                    @if (Session::get('success'))
                        Kembali
                    @else
                        Batal
                    @endif
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
