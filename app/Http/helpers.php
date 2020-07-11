<?php

function gender($gender)
{
    $genders = [
        'm' => 'Male',
        'f' => 'Female'
    ];
    return $genders[$gender];
}

function format_price($price)
{
    return 'EUR '.$price;
}


function get_current_date()
{
    return Carbon\Carbon::now()->format('Y-m-d');
}

function checkValidity($id)
{
    if($id != Auth::user()->id) {
        abort(403, 'Unauthorized action.');
    }
}

function format_hours($hours)
{
    return $hours.' hrs';
}
