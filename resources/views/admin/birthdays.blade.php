@extends('back.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.css" media='print'>
@endsection
@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Liste des anniversaires par journée</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item active">Liste des anniversaires</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="custom-panel">
                <div class="custom-panel-heading">birthdays</div>
                <div id="birthday-calendar"></div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{url('vendor/moment/moment.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        var sources = [];
        });
        var sources = [];
        $('#birthday-calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '{{get_current_date()}}',
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            viewRender: function(view, element) {
                var date = $('#birthday-calendar').fullCalendar('getDate');
                date = moment(date).format('YYYY-MM-DD');
                if(sources.indexOf(date) == -1) {
                    sources.push(date);
                    $.ajax({
                        url: "{{route('admin.user.birthdays')}}",
                        data: {date: date},
                        success: function(events) {
                            $('#birthday-calendar').fullCalendar('addEventSource', events);
                        }
                    });
                }
            }
    });
</script>

@endsection
