<div class="row">
    <div class="card bg-light">
        <div class=" text-center border-bottom-0">
           <b> {{ $user->userDetail->first_name . ' - ' . $user->userDetail->last_name }} </b>
        </div>
        <div>
            <div class="row">
                <div class="p-3 col-7">
                    <h2 class="lead"><b>{{ $user->userDetail->job_title}}</b></h2>
                    <p class="text-muted text-sm"><b>Date annivesrsaire : </b> {{ $user->userDetail->date_of_birth}} </p>
                    <p class="text-muted text-sm"><b>Profession : </b> {{ $user->userDetail->profession}} </p>
                    <p class="text-muted text-sm"><b>Experience : </b> {{ $user->userDetail->experience}} </p>
                    <p class="text-muted text-sm"><b>Compétences : </b> {{ $user->userDetail->name_skills}} </p>
                    <p class="text-muted text-sm"><b>Status Marital : </b> {{ $user->userDetail->marital_status}} </p>
                    <p class="text-muted text-sm"><b>Enfants : </b> {{ $user->userDetail->child_number}} </p>
                    <p class="text-muted text-sm"><b>Promotion : </b> {{ $user->userDetail->promotion}} </p>
                    <p class="text-muted text-sm"><b>Filiere : </b> {{ $user->userDetail->filiere}} </p>
                    <p class="text-muted text-sm"><b>Sexe : </b> {{ $user->userDetail->gender}} </p>
                    <p class="text-muted text-sm"><b>Sport : </b> {{ $user->userDetail->sport}} </p>
                    <p class="text-muted text-sm"><b>Loisirs : </b> {{ $user->userDetail->hobbies}} </p>
                    <p class="text-muted text-sm"><b>Extra : </b> {{ $user->userDetail->activities}} </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-city"></i></span> <b>Ville :</b> {{ $user->userDetail->city}}</li><br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-flag"></i></span> <b>Pays :</b> {{ $user->userDetail->country}}</li><br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Tél :</b> {{ $user->userDetail->phone_number}}</li><br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-open"></i></span> <b>Email :</b> {{ $user->email}}</li>
                    </ul>
                </div>
                <div class="col-5 text-center">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="" class="img-circle img-fluid">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-info">
                <a class="">
                    <i class="fas fa-comments"></i>
                    {{ $user->userDetail->notes}}
                </a>
            </div>
        </div>
    </div>
</div>
