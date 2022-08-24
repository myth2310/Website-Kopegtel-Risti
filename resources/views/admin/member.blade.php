@extends('layouts.template.admin')

@section('content')
<div 
    class="main-content"
    style="padding-left: 32px; padding-right: 32px; padding-top: 92px;"
>  
    @if (Session::get('success'))
    <script>
        var message = "<?php echo Session::get('success') ?>";
        window.onload = event => {
            successAlert( message );
        };
    </script>
    @endif

    <div class="card">
        <div class="card-header border-0">
            <div class="row">
                <div class="col-8">
                    <h3 class="mb-0">Anggota</h3>
                </div>                    
                <div class="col-4 text-right">
                    <a href="/member/download" class="btn btn-sm btn-outline-primary btn-round btn-icon" data-toggle="sweet-alert" data-sweet-alert="confirm">               
                        <span class="btn-inner--text">
                            Download Data
                        </span>
                    </a>
                    <a href="/member/create" class="btn btn-sm btn-primary btn-round btn-icon">               
                        <span class="btn-inner--text">
                            Tambah Anggota Baru
                        </span>
                    </a>
                </div>
            </div>
        </div>            
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($result as $res)
                        <tr>
                            <td> {{ $res->name }} </td>
                            <td> {{ $res->email }} </td>
                            <td> {{ $res->phone }} </td>
                            <td> {{ $res->address }} </td>
                            <td> {{ $res->position }} </td>
                            <td> 
                                <img 
                                    style="max-width: 76px", 
                                    object-fit="cover" 
                                    alt="Pas Foto"
                                    src="{{asset('storage/'.$res->image)}}"
                                > 
                            </td>
                            <td>                                                
                                @if ($res->status == "Aktif")
                                    <span class="badge badge-pill badge-success">
                                        {{ $res->status }} 
                                    </span>                                        
                                @elseif ($res->status == "Pensiun")
                                    <span class="badge badge-pill badge-secondary">
                                        {{ $res->status }} 
                                    </span>                                                                                
                                @else
                                    <span class="badge badge-pill badge-info">
                                        {{ $res->status }} 
                                    </span>                                                                                
                                @endif                                
                            </td>
                            <td class="table-actions">     
                                {{-- Edit --}}                           
                                <button
                                    onclick="window.location='{{ url('/member/edit/'.$res->member_id) }}'" 
                                    class="btn table-action"
                                >
                                    <span class="iconify" data-icon="tabler:edit" style="font-size: 20px;"></span>
                                </button>

                                {{-- Delete --}}
                                <button
                                    class="btn table-action table-action-delete delete"
                                    data-id="{{$res->member_id}}"
                                >
                                    <form 
                                        action="member/delete/{{$res->member_id}}" 
                                        id="delete{{$res->member_id}}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <span 
                                        class="iconify" 
                                        data-icon="tabler:trash" 
                                        style="font-size: 20px; margin: 0px">
                                    </span>
                                </button>                             
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>            
    </div>
</div>    

@include('layouts.sweetalert')

@endsection
