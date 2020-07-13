@extends('back.layout')
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
                <h1>Contacts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($data as $user)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                         <h2 class="lead"><b>{{ $user->first_name . ' - ' . $user->last_name }}</b></h2>

                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="lead"><b>{{ $user->job_title}}</b></h5>
                                    <p class="text-muted text-sm"><b>About: </b> {{ $user->profession}} </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $user->address}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{ $user->phone_number}}</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <button type="button" name="view" id="{{ $user->id }}" href="{{ route('detail', $user->id) }}" class=" view btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> Voir Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                <div class="pagination justify-content-center m-0  ">
                    {{ $data->links() }}
                </div>
            </nav>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@include('partials.view')
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready( function () {

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
});
</script>
@stop
