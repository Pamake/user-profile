@extends('back.layout')
@section('css')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('main')
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listes des Membres</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item active">Listes des Membres</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <table class="table table-bordered" id="user_datatable">
        <thead>
        <tr>
            <th width="20px">Id</th>
            <th>Photo</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th width="220px">Email</th>
            <th width="200px">Pays de résidence</th>
            <th width="200px">Actions</th>
        </tr>
        </thead>
    </table>
</section>

@include('partials.edit')
@include('partials.view')
@include('partials.delete')

@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- Datatable -->
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.flash.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#user_datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.user') }}",
            search: {
                caseInsensitive: false,
            },
            columns: [
                { data: 'id', name: 'users.id' },
                { data: 'avatar', name: 'users.avatar',
                    render: function( data, type, full, meta ) {
                        return "<img src={{ URL::to('/') }}/storage/" + data + " width='50' class='img-thumbnail' />";
                    },
                    orderable: false
                },
                { data: 'first_name', name: 'user_details.first_name' },
                { data: 'last_name', name: 'user_details.last_name' },
                { data: 'email', name: 'users.email' },
                { data: 'country', name: 'user_details.country' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });


        var user_id;
        $(document).on('click', '.view', function(){

            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('href'),
                data: $(this).serialize()
            }).done((data) => {
                    $('#detail').html(data);
                    $('#modal-lg').modal('show');
                }).fail((data) => {
                    console.log(data);
                });
  });

        $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');

            $('#modal-danger').modal('show');
        });

        $('#ok_button').click(function(){
            var id= user_id;
            var url = "{{URL('admin/users/destroy')}}";
            var dltUrl = url+"/"+id;
            $.ajax({
                url: dltUrl,
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(data)
                {
                    setTimeout(function(){
                        $('#modal-danger').modal('hide');
                        $('#user_datatable').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });
    });
</script>

@endsection
