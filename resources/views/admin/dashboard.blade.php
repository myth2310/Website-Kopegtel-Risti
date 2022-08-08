@extends('layouts.template.admin')

@section('content')
<div 
    class="main-content"
    style="padding-left: 32px; padding-right: 32px; padding-top: 92px;"
>        
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">      
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">
                                Total Anggota
                            </h5>
                            <span class="h1 font-weight-bold mb-0">
                                {{$total_member}}
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape text-white bg-red">
                                <span 
                                    class="iconify" 
                                    data-icon="majesticons:users" 
                                    style="color: #f0f0f0; font-size: 24px;"
                                ></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <div class="col">                           
            <div class="card">
                <div class="card-body">      
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">
                                Total Produk
                            </h5>
                            <span class="h1 font-weight-bold mb-0">
                                {{$total_product}}
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape text-white bg-blue">
                                <span 
                                    class="iconify" 
                                    data-icon="majesticons:box" 
                                    style="color: #f0f0f0; font-size: 24px;"
                                ></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">      
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">
                                Anggota Aktif
                            </h5>
                            <span class="h1 font-weight-bold mb-0">
                                {{$active_member}}
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape text-white bg-green">
                                <span 
                                    class="iconify" 
                                    data-icon="majesticons:users" 
                                    style="color: #f0f0f0; font-size: 24px;"
                                ></span>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <div class="col">                           
            <div class="card">
                <div class="card-body">      
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">
                                Anggota Pensiunan
                            </h5>
                            <span class="h1 font-weight-bold mb-0">
                                {{$inactive_member}}
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape text-white bg-orange">
                                <span 
                                    class="iconify" 
                                    data-icon="majesticons:users" 
                                    style="color: #f0f0f0; font-size: 24px;"
                                ></span>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Anggota</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="/member" class="btn btn-sm btn-primary btn-round btn-icon">               
                    <span class="btn-inner--text">Lihat Semua</span>
                    </a>
                </div>
            </div>
        </div>            
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($member as $res)
                        <tr>
                            <td> {{ $res->name }} </td>
                            <td> {{ $res->email }} </td>
                            <td> {{ $res->phone }} </td>
                            <td> {{ $res->address }} </td>
                            <td> {{ $res->position }} </td>
                            <td> {{ $res->status }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>

    <div class="card">
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Kegiatan</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="/activity" class="btn btn-sm btn-primary btn-round btn-icon">               
                    <span class="btn-inner--text">Lihat Semua</span>
                    </a>
                </div>
            </div>
        </div>        
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($activity as $res)
                        <tr>
                            <td> {{ $res->name }} </td>
                            <td> {{ $res->date }} </td>
                            <td> {{ $res->description }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>            
    </div>
</div>
@endsection