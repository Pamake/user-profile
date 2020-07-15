@extends('back.layout')
@section('css')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('main')

 <section class="content">
      <div class="container-fluid">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="form-group">
            <select name="filter_gender" id="filter_gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="Femme">Femme</option>
                <option value="Homme">Homme</option>
                <option value="Autres">Autres</option>
            </select>
        </div>
        <div class="form-group">
            <select name="filter_country" id="filter_country" class="form-control" required>
                <option value="">Select Country</option>
                @foreach($country_name as $country)

                <option value="{{ $country->country }}">{{ $country->country }}</option>

                @endforeach
           </select>
        </div>
        <div class="form-group">
                <select name="filter_filiere" id="filter_filiere" class="form-control">
                    <option value="">Selectionner une filiere</option>
                    @foreach($filiere_name as $filiere)

                    <option value="{{ $filiere->filiere }}">{{ $filiere->filiere }}</option>

                    @endforeach
               </select>
         </div>

        <div class="form-group" align="center">
            <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

            <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<br />
<div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Filiere</th>
            <th>Ville</th>
            <th>Pays</th>
        </tr>
        </thead>
    </table>
</div>
</div>
</section>
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
<script>
    $(document).ready(function(){

        fill_datatable();

        function fill_datatable(filter_gender = '', filter_country = '', filter_filiere = '')
        {

               var dataTable = $('#customer_data').DataTable({

                            processing: true,
                            serverSide: true,
                            ordering: true,
                             searching:true,
                             select: true,
                             ajax:{
                                    url: "{{ route('customsearch.index') }}",
                                    data:{filter_gender:filter_gender, filter_country:filter_country,filter_filiere:filter_filiere}

                                },
                            search: {
                                caseInsensitive: false,
                            },
                            columns: [
                                {
                                    data:'first_name',
                                    name:'user_details.first_name'
                                },
                                {
                                    data:'last_name',
                                    name:'user_details.last_name'
                                },
                                {
                                    data:'email',
                                    name:'users.email'
                                },
                                {
                                    data:'gender',
                                    name:'user_details.gender'
                                },
                                {
                                    data:'filiere',
                                    name:'user_details.filiere'
                                },
                                {
                                    data:'city',
                                    name:'user_details.city'
                                },
                                {
                                    data:'country',
                                    name:'user_details.country'
                                }
                            ]
                        });
        }

        $('#filter').click(function(){
            var filter_gender = $('#filter_gender').val();
            var filter_country = $('#filter_country').val();
            var filter_filiere = $('#filter_filiere').val();

            if(filter_gender != '' || filter_country != '' || filter_filiere != '')
            {
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_gender, filter_country, filter_filiere);
            }
            else
            {
                alert('Selectionner au moins une option');
            }
        });

        $('#reset').click(function(){
            $('#filter_gender').val('');
            $('#filter_country').val('');
            $('#filter_filiere').val('');
            $('#customer_data').DataTable().destroy();
            fill_datatable();
        });

    });
</script>
@endsection
