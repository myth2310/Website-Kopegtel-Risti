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
                <div class="col-6">
                    <h3 class="mb-0">Produk</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="/product/create" class="btn btn-sm btn-primary btn-round btn-icon">               
                    <span class="btn-inner--text">Tambah Produk Baru</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($result as $res)
                        <tr>
                            <td> {{ $res->name }} </td>
                            <td style=
                                "max-width: 240px; 
                                word-wrap: break-word;
                                overflow: hidden;"                    
                            >  
                                {{ $res->description }} 
                            </td>
                            <td>                               
                                <img  
                                    style="max-width: 76px",  
                                    object-fit="cover" 
                                    alt="Gambar Produk"
                                    src="{{asset('storage/'.$res->image)}}"
                                > 
                            </td>
                            <td class="table-actions">
                                <div class="row">
                                    {{-- Edit --}}
                                    <button
                                        onclick="window.location='{{ url('/product/edit/'.$res->product_id) }}'" 
                                        class="btn table-action"
                                    >
                                        <span class="iconify" data-icon="tabler:edit" style="font-size: 20px;"></span>
                                    </button>

                                    {{-- Delete --}}
                                    <button 
                                        class="btn table-action table-action-delete delete"
                                        data-id="{{$res->product_id}}"
                                    >
                                        <form 
                                            action="product/delete/{{$res->product_id}}" 
                                            id="delete{{$res->product_id}}"
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
                                </div>
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
