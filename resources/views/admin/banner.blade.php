@extends('layouts.template.admin')

@section('content')
<div 
    class="main-content"
    style="padding-left: 32px; padding-right: 32px; padding-top: 92px;"
>  
    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text">
                {{ Session::get('success') }}
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::get('fail'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text">
                {{ Session::get('fail') }}
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>                        
    @endif

    <div class="card">
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Banner</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="/banner/create" class="btn btn-sm btn-primary btn-round btn-icon">               
                    <span class="btn-inner--text">Add New Image</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($result as $res)
                        <tr>
                            <td> {{ $res->name }} </td>
                            <td>
                                <img 
                                    style="max-width: 76px",
                                    object-fit="cover" 
                                    src="{{asset('storage/'.$res->image)}}"
                                > 
                            </td>
                            <td>                                                
                                @if ($res->status == "yes")
                                    <span class="badge badge-pill badge-primary">
                                        ditampilkan
                                    </span>                                        
                                @else
                                    <span class="badge badge-pill badge-secondary">
                                        disembunyikan
                                    </span>                                                                                
                                @endif                                
                            </td>
                            <td class="table-actions">
                                <div class="row">
                                    <button
                                        onclick="window.location='{{ url('/banner/edit/'.$res->content_id) }}'" 
                                        class="btn table-action"
                                    >
                                        <span class="iconify" data-icon="tabler:edit" style="font-size: 20px;"></span>
                                    </button>
                                    <form action="banner/delete/{{$res->content_id}}" method="POST">
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