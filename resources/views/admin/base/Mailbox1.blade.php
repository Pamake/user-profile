@extends('back.layout')
@section('css')
<!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('main')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Ecrire</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
          <li class="breadcrumb-item active">Ecrire</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
      <!-- /.col -->
      <div class="col-md-12">
      <form id="contact-form" method="post" action="/admin/mailbox">
          @csrf
          @if(session()->has('message'))
          <div class="alert alert-success">
              <strong>Success: </strong>{{ session()->get('message') }}
          </div>
          @endif
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Ecrire un nouveau message</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="category">Categories</label>
                    <select id="category" class="form-control" name="category">
                        <option value="one">Chosir la liste de diffusions</option>
                        <option value="all">Tous les membres</option>
                    </select>
                </div>
                <div class="text-danger">
                    {{ $errors->first('category') }}
                </div>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Subject:">
            </div>
             <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="form_email">Email</label>
                        <div id="help"></div>
                        <input id="form_email" type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}" data-error="Valid email is required.">
                    </div>
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_message">Message *</label>
                        <textarea id="compose-textarea" name="message" class="form-control" style="height: 500px" placeholder="Email content here" rows="4" data-error="Please, leave us a message."></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="text-danger">
                        {{ $errors->first('message') }}
                    </div>
                </div>

            </div>
            <div class="row">
            <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Envoyer</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Annuler</button>
              </div>
              <!-- /.card-footer -->
            </div>
        </div>
        <!-- /.card -->
       </form>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
@section('js')
<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Page Script -->
<script>
    $(function () {
        //Add text editor
        $('#compose-textarea').summernote()
    })
</script>
@endsection
