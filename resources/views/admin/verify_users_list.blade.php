@extends('back.layout')

@section('main')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Activation Membres</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Activation Membres</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listes des utilisateurs en attente de verifications</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $item)

                          <tr>
                              <td >{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>
                                  <a href="{{url('/admin/verifyUser/'.$item->id)}}" class="btn btn-primary">Accept</a>
                                  <a href="{{url('/admin/rejectUser/'.$item->id)}}" class="btn btn-warning">Reject</a>
                              </td>
                          </tr>

                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Actions</th>
                    </tr>
                    </tfoot>
                  </table>
              </div>
               <!-- /.card-body -->
             </div>
              <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
      <!-- /.container-fluid -->
 </section>
 <!-- /.content -->
@endsection
