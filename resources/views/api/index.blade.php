@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">GET User Dari API</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('users.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="usersTable">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        isi()
    })

    function isi() {
        $.ajax({
        method: 'GET',
        url: 'http://localhost:8000/api/user-api',
        dataType: 'json',
        success: function(result) {
            console.log(result);
            var data='';    
  
            //perulangan untuk pasrng data JSON ke HTML
            $.each(result.data, function(i, item){
                data+='<tr>';
                  data+='<td>'+item.id+'</td>';
                  data+='<td>'+item.name+'</td>';
                  data+='<td>'+item.email+'</td>';
                  data+='<td><button class="btn btn-info btn-edit"  data-toggle="modal" data-target="">edit</button>';
                data+='</tr>';
            });
  
            //memasukan ke element HTML
            $('#usersTable').html(data);
        }
    });
    }
</script>
@endpush