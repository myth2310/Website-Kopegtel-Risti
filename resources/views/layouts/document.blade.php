
<div class="dokument">
        <h2>Dokumen Lainnya</h2>
        <p>Dokumen Kopegtel dapat diunduh dengan klik tautan di bawah ini</p>
        <table>
            <tr>
                <th>Nama Dokumen</th>
                <th>Tanggal</th>
                <th>Format</th>
                <th>Aksi</th>
            </tr>
            @foreach ($document as $res)
            <tr>
                <td>{{ $res->fileName }}</td>
                <td>{{\Carbon\Carbon::parse($res->created_at)->format('l, d F Y')}}</td>
                <td>{{ $res->fileType }}</td>
                <td>
                    <a href="/download/{{ $res->document_id }}">Download</a>
                </td>
            </tr>
         @endforeach
            
        </table>
    </div>


