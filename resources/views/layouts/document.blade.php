<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

 <div class="content-about-bottom-text">
    <h1>Dokumen Lainnya</h1>
     <p>Dokumen Kopegtel dapat diunduh dengan klik tautan di bawah ini</p>
</div>

<style>
        tr th{
            text-align:center;
        }
        .content-bottom-card-button{
           margin-left:30%;
        }
        
    </style>

<div class="container">
<table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
<thead>
   
     <tr>
         <th>Nama Dokumen</th>
         <th>Tanggal</th>
         <th>Format</th>
         <th>Action</th>
     </tr>
 </thead>
<tbody>
    @foreach ($document as $res)
     <tr>
         <td> {{ $res->fileName }}</td>
         <td>{{substr($res->created_at, 0, 10)}}</td>
         <td> {{ $res->fileType }}</td>
         <td>
            <div class="content-bottom-card-button">
                <a href="/Kopegtel-Risti/download/{{ $res->document_id }}">Downloads</a>
            </div>
        </td>
     </tr>
     @endforeach
</body>
</table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            responsive: true
        } );
     
        new $.fn.dataTable.FixedHeader( table );
    });
</script>



