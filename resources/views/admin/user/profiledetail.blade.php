<div class="row">
    <div class="card bg-light">
        <div class=" text-center border-bottom-0">
            {{ $user->userDetail->job_title}}
        </div>
        <div>
            <div class="row">
                <div class="p-3 col-7">
                    <h2 class="lead"><b>{{ $user->userDetail->first_name . ' - ' . $user->userDetail->last_name }}</b></h2>
                    <p class="text-muted text-sm"><b>Date annivesrsaire: </b> {{ $user->userDetail->date_of_birth}} </p>
                    <p class="text-muted text-sm"><b>Profession: </b> {{ $user->userDetail->profession}} </p>
                    <p class="text-muted text-sm"><b>Experience: </b> {{ $user->userDetail->experience}} </p>
                    <p class="text-muted text-sm"><b>Skills: </b> {{ $user->userDetail->name_skills}} </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $user->userDetail->address}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-city"></i></span> Ville: {{ $user->userDetail->city}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-flag"></i></span> Pays: {{ $user->userDetail->country}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{ $user->userDetail->phone_number}}</li>
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
                    {{ $user->userDetail->comments}}
                </a>
            </div>
        </div>
    </div>
</div>
