<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>

<table class="" style="width: 100%;border:1px solid #ccc">
    <thead>
    <tr>
        <th colspan="4"> <p>Listes des anniversaires</p></th>
    </tr>
    <tr>
        <th>Pseudonyme</th>
        <th>Nom</th>
        <th>Premon</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
    <tr>
        <th>{{ $item->name}}</th>
        <th>{{ $item->last_name}}</th>
        <th>{{ $item->first_name}}</th>
        <th>{{ $item->email}}</th>
    </tr>

    @endforeach
    </tbody>
</table>

</body>
</html>
