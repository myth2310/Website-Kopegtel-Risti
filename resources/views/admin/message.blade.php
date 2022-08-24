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
                    <h3 class="mb-0">Pesan</h3>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>Nama Pengirim</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($result as $res)
                        <tr>
                            <td> {{ $res->name }} </td>
                            <td> {{ $res->email }} </td>
                            <td> {{ $res->subject }} </td>
                            <td style=
                                "word-wrap: break-all; 
                                width: 160px; ;"
                            > 
                                {{ $res->message }} 
                            </td>
                            <td class="table-actions">
                                <div class="row">
                                    {{-- Delete --}}
                                    <button 
                                        class="btn table-action table-action-delete delete"
                                        data-id="{{$res->message_id}}"
                                    >
                                        <form 
                                            action="message/delete/{{$res->message_id}}" 
                                            id="delete{{$res->message_id}}"
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
