<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Join</title>
</head>
<body>
    <h1>Join table</h1>

    {{-- <h1>Simple join with DB</h1> --}}
    {{-- <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>State</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->user_name }}</td>
                    <td>{{ $row->state }}</td>
                    <td>{{ $row->city_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

   <h1>Join Table with Models</h1>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>State</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as  $row)
            <tr>
                <td>{{ $row->user_name}}</td>
                <td>{{ $row->detail}}</td>
                <td>{{ $row->city }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
