@extends('back.layout')
@section('main')
@section('css')
@include('lui-croppie::partials.css')
 <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- Styles -->
        <style>

  </style>
@stop
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile de {{$user->name}} </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}" >Accueil</a></li>
                    <li class="breadcrumb-item active">{{$user->name}} Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if (session('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('message') }}
        </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('warning') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        @if (!empty($user->userDetail))
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset('storage/' . $user->avatar) }}"
                                 alt="User profile picture">
                        </div>
                        @else

                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset('storage/' . $user->avatar) }}"
                                 alt="User profile picture">
                        </div>
                        @endif
                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-center">{{$user->userDetail->profession}}</p>
                        <p class="card-text">
                        <ul>
                            <li>Nom: {{  $user->userDetail->first_name.' '.$user->userDetail->last_name, }}</li>
                            <li>Email: {{ $user->email }}</li>
                            <li>Date Anniversaire: {{ $date_birthday }}</li>
                        </ul>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Apropos de Moi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Expérience</strong>

                        <p class="text-muted">
                            {{ $user->userDetail->experiences }}
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">{{ $user->userDetail->city }}, {{ $user->userDetail->country }}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Compétences</strong>

                        <p class="text-muted">
                            {{ $user->userDetail->name_skills }}
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">{{ $user->userDetail->notes }}</p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Activités</strong>
                            <p class="text-muted text-sm"><b>Sport : </b> {{ $user->userDetail->sport}} </p>
                            <p class="text-muted text-sm"><b>Loisir : </b> {{ $user->userDetail->hobbies}} </p>
                            <p class="text-muted text-sm"><b>Extra : </b> {{ $user->userDetail->activities}} </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">

                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Gestion image profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Information personnelle</a></li>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- /.tab-pane -->


                            <div class="active tab-pane" id="activity">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="box box-primary" >
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Gestion image profile</h3>
                                                <div class="box-tools pull-right">
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                @include('lui-croppie::bootstrap3.default')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">

                            </div>
                            <div class="tab-pane" id="settings">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form id="settings" class="form-horizontal" method="POST" action="{{ route('admin.profile_update', $user->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row {{$errors->has('job_title')?'has-error':''}}">
                                        <label for="inputName" class="col-sm-2 col-form-label">Fonction occupé*</label>
                                        <div class="col-sm-10">
                                            <input type="text"  id="job_title" name="job_title" class="form-control"  placeholder="Fonction occupé*" value="{{ old( 'job_title', $user->userDetail->job_title) }}">
                                            <span class="text-danger">{{$errors->first('job_title')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('profession')?'has-error':''}}">
                                        <label for="inputName" class="col-sm-2 col-form-label">Profession*</label>
                                        <div class="col-sm-10">
                                            <input type="text"  id="profession" name="profession" class="form-control"  placeholder="Profession" value="{{ old( 'profession', $user->userDetail->profession) }}">
                                            <span class="text-danger">{{$errors->first('profession')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('first_name')?'has-error':''}}">
                                        <label for="inputName" class="col-sm-2 col-form-label">Prénom*</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="first_name" name="first_name" class="form-control"  placeholder="Prénom*" value="{{ old( 'first_name', $user->userDetail->first_name) }}">
                                            <span class="text-danger">{{$errors->first('first_name')}}</span>
                                        </div>
                                        <label for="inputName" class="col-sm-1 col-form-label">Nom*</label>
                                        <div class="col-sm-5">
                                            <input type="text" id="last_name" name="last_name" class="form-control"  placeholder="Name*" value="{{ old( 'last_name', $user->userDetail->last_name) }}">
                                            <span class="text-danger">{{$errors->first('last_name')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="marital_status_id" class="col-sm-2 col-form-label">Statut Marital</label>
                                        <div class=" col-sm-4">
                                            <select id="marital_status" name="marital_status" class="form-control custom-select">
                                                <option value="{{ old( 'marital_status', $user->userDetail->marital_status) }}">{{ old( 'marital_status', $user->userDetail->marital_status) }}</option>
                                                <option value="Marié(e)">Marié(e)</option>
                                                <option value="Célibataire">Célibataire</option>
                                                <option value="Veuf/Veuve">Veuf/Veuve</option>
                                            </select>
                                        </div>
                                        <label for="child_number_id" class="col-sm-2 col-form-label">Nombre enfants</label>
                                        <div class="col-sm-1">
                                            <select id="child_number_id" name="child_number" class="form-control custom-select">
                                                <option value="{{ old( 'child_number', $user->userDetail->child_number) }}">{{ old( 'child_number', $user->userDetail->child_number) }}</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">8</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('email')?'has-error':''}}">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email"id="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old( 'email', $user->email) }}">
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Promotion</label>
                                        <div class="col-sm-2">
                                            <select id="promotion" name="promotion" class="form-control custom-select">
                                            @foreach ($calling_promotions as $promotion => $value)
                                                <option value="{{ old( 'promotion', $value['name']) }}"
                                                    @if (!is_null($user) && $user->userDetail->promotion)
                                                    {{ $user->userDetail->promotion == $value['name'] ? 'selected' : '' }}
                                                    @endif>{{ $value['name'] }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <label for="filiere" class="col-sm-1 col-form-label">filiere</label>
                                        <div class="col-sm-4">
                                            <select id="filiere" name="filiere" class="form-control custom-select">
                                            @foreach ($calling_sectors as $sector => $value)
                                                <option value="{{ old( 'filiere', $value['name']) }}"
                                                    @if (!is_null($user) && $user->userDetail->filiere)
                                                    {{ $user->userDetail->filiere == $value['name'] ? 'selected' : '' }}
                                                    @endif>{{ $value['name'] }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <label for="sexe" class="col-sm-1 col-form-label">Sexe:</label>
                                        <div class="col-sm-2 {{$errors->has('gender')?'has-error':''}}">
                                            <select class="form-control custom-select" id="gender" name="gender">
                                                <option value="{{ old( 'gender', $user->userDetail->gender) }}">{{ old( 'gender', $user->userDetail->gender) }}</option>
                                                <option value="Femme">Femme</option>
                                                <option value="Homme">Homme</option>
                                                <option value="Autres">Autres</option>
                                            </select>
                                            <span class="text-danger">{{$errors->first('gender')}}</span>
                                        </div>

                                    </div>
                                    <div class="form-group row {{$errors->has('date_of_birth')?'has-error':''}}">
                                        <label for="inputName" class="col-sm-2 col-form-label">Date Naissance</label>
                                        <div class="input-group  col-sm-3" >
                                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old( 'date_of_birth', $user->userDetail->date_of_birth) }}">
                                            <span class="text-danger">{{$errors->first('date_of_birth')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('sport')?'has-error':''}}">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Activités</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="sport" name="sport" placeholder="Sport" value="{{ old( 'sport', $user->userDetail->sport) }}">
                                            <span class="text-danger">{{$errors->first('sport')}}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="hobbies" name="hobbies" placeholder="Loisirs" value="{{ old( 'hobbies', $user->userDetail->hobbies) }}">
                                            <span class="text-danger">{{$errors->first('hobbies')}}</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="activities" name="activities" placeholder="Extra" value="{{ old( 'activities', $user->userDetail->activities) }}">
                                            <span class="text-danger">{{$errors->first('activities')}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row {{$errors->has('experiences')?'has-error':''}}">
                                        <label for="experiences" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="experiences" name="experiences" placeholder="Experience" value="{{ old( 'experiences', $user->userDetail->experiences) }}">{{ old( 'experiences', $user->userDetail->experiences) }}</textarea>
                                            <span class="text-danger">{{$errors->first('experiences')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('name_skills')?'has-error':''}}">
                                        <label for="name_skills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name_skills" name="name_skills" placeholder="Compétences" value="{{ old( 'name_skills', $user->userDetail->name_skills) }}">
                                            <span class="text-danger">{{$errors->first('name_skills')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('notes')?'has-error':''}}">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Notes</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Notes" value="{{ old( 'notes', $user->userDetail->notes) }}">{{ old( 'notes', $user->userDetail->notes) }}</textarea>
                                            <span class="text-danger">{{$errors->first('notes')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('calling_code')?'has-error':''}}">
                                        <label for="calling_code" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-3">
                                            <select name="calling_code" id="calling_code" class="form-control custom-select select2">
                                                @foreach ($calling_codes as $code => $value)
                                                <option value="{{ old( 'calling_code', $value['dial_code']) }}"
                                                        @if (!is_null($user) && $user->userDetail->calling_code)
                                                    {{  $user->userDetail->calling_code == $value['dial_code'] ? 'selected' : '' }}
                                                    @endif>{{ old( 'calling_code',  $value['dial_code'] . ' - ' . $value['name']) }}</option>
                                                    <span class="text-danger">{{$errors->first('calling_code')}}</span>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group {{$errors->has('phone_number')?'has-error':''}}">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="tel" class="form-control" id="phone_number"  pattern='^\+?\d{0,13}'  name="phone_number" placeholder="votre numero de telephone" value="{{ old( 'phone_number', $user->userDetail->phone_number) }}">
                                                <span class="text-danger">{{$errors->first('phone_number')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('city')?'has-error':''}}">
                                        <label for="country" class="col-sm-2 col-form-label">Villes et Pays</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="city" id="city" class="form-control" placeholder="villes" value="{{ old( 'city', $user->userDetail->city) }}">
                                            <span class="text-danger">{{$errors->first('city')}}</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="country" id="country" class="form-control custom-select select2">
                                                @foreach ($calling_codes as $code => $value)
                                                <option value="{{ old( 'country', $value['name']) }}"
                                                        @if (!is_null($user) && $user->userDetail->country)
                                                    {{ $user->userDetail->country == $value['name'] ? 'selected' : '' }}
                                                    @endif>{{ old( 'country', $value['name']) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row {{$errors->has('is_sign')?'has-error':''}}">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="is_sign"  name="is_sign" value="1"  {{ old('is_sign') ? 'checked':0 }} required > I agree to the <a href="#">terms and conditions</a>
                                                    <span class="text-danger">{{$errors->first('is_sign')}}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Soumettre</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('js')
@include('lui-croppie::partials.js')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#date_of_birth').datepicker({
                 format: 'yyyy-mm-dd',
                   uiLibrary: 'bootstrap'

        });
    });

</script>

<script type="text/javascript">
$(document).ready(function() {

    $('#settings').validate({ // <- initialize the plugin on this form
        ignore: [],  // <- proper format to set ignore to "nothing"
        invalidHandler:  function(event, validator) {
            $(".tab-content").find("div.tab-pane:hidden:has(div.has-error)").each(function (index, tab) {
                var id = $(tab).attr("id");
                $('a[href="#' + id + '"]').tab('show');
            });
        },
        // ... the rest of your validate() options
    });

});
</script>
@stop
