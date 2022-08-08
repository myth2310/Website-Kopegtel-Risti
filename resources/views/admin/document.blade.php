@extends('layouts.template.admin')

@section('content')
<div 
    class="main-content"
    style="padding-left: 32px; padding-right: 32px; padding-top: 92px;"
>  
    @if (Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>                                                        
    @endif

    <div class="card">
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Dokumen</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="/document/create" class="btn btn-sm btn-primary btn-round btn-icon">               
                    <span class="btn-inner--text">Tambah Dokumen Baru</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal Upload</th>
                        <th>Tipe File</th>
                        <th>Status</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($result as $res)
                        <tr>
                            <td> {{ $res->fileName }} </td>
                            <td> {{ $res->created_at }} </td>
                            <td> {{ $res->fileType }} </td>
                            <td>                                                
                                @if ($res->status == "yes")
                                    <span class="badge badge-pill badge-primary">
                                        dapat diunduh
                                    </span>                                        
                                @else
                                    <span class="badge badge-pill badge-secondary">
                                        tidak dapat diunduh
                                    </span>                                                                                
                                @endif                                
                            </td>
                            <td class="table-actions">
                                <div class="row">
                                    <button
                                        onclick="window.location='{{ url('/document/edit/'.$res->document_id) }}'" 
                                        class="btn table-action"
                                    >
                                        <span class="iconify" data-icon="tabler:edit" style="font-size: 20px;"></span>
                                    </button>
                                    <form action="document/delete/{{$res->document_id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="btn table-action table-action-delete"
                                        >
                                            <span class="iconify" data-icon="tabler:trash" style="font-size: 20px;"></span>
                                        </button>
                                    </form>
                                </div>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>            
    </div>
</div>    
@endsection