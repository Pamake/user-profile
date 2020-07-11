@extends('back.layout')
@section('css')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"  defer></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){

        fill_datatable();

        function fill_datatable(filter_gender = '', filter_country = '')
        {
            var dataTable = $('#customer_data').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "{{ route('customsearch.index') }}",
                    data:{filter_gender:filter_gender, filter_country:filter_country}

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

            if(filter_gender != '' &&  filter_gender != '')
            {
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_gender, filter_country);
            }
            else
            {
                alert('Select Both filter option');
            }
        });

        $('#reset').click(function(){
            $('#filter_gender').val('');
            $('#filter_country').val('');
            $('#customer_data').DataTable().destroy();
            fill_datatable();
        });

    });
</script>
@endsection
