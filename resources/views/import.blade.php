<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Email</th>
            <th>Amount</th>
            <th>Email</th>
        </tr>
        @foreach($data as $t)
        <tr>
            <td>{{$t->id}}</td>
            <td>{{$t->user->name}}</td>
            <td>{{$t->user->email}}</td>
            <td>{{$t->amount}}</td>
            <td>{{$t->description}}</td>
        </tr>
        @endforeach
    </table>

<br><br>






    <form action="{{route('imports')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="import_file" />
        <br>
        <br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>