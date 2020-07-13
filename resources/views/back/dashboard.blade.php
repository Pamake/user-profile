@extends('back.layout')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tableau de board</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Membres inscris</span>
                        <span class="info-box-number">{{ $usersCount}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-birthday-cake" style="color:black"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Nombre anniversaire de ce mois</span>
                            <span class="info-box-number" id="count_birthdays"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- /.card -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Derniers membres</h3>

                                <div class="card-tools">
                                    <span class="badge badge-danger"> 8 Nouveau Members</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                 @foreach($lastRecords as $lastRecord)
                                    <li>

                                        <img src="{{ asset('storage/' . $lastRecord->avatar) }}" alt="User Image">
                                        <a class="users-list-name" href="#">{{$lastRecord->name}}</a>
                                        <span class="users-list-date">Today</span>
                                    </li>
                                 @endforeach
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="javascript::">View All Users</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>
@endsection
@section('js')
<script>
    $(document).ready(function() {

        var sources = [];
        });
        var sources = [];
        var currentDate = {{get_current_date()}};
        var now = new Date();
        var todayDate = new Date().toISOString().slice(0,10);
         $.ajax({
            url: "{{route('admin.user.birthdays.month')}}",
            type: "GET",
            data: {date: todayDate},
            success: function(data) {
                $('#count_birthdays').append(data);
            }
        });
</script>

@endsection
