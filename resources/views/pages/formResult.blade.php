<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sampleForm</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<h1 class="text-center">正しい値が送信されました。</h1>
<table class="col-md-4 col-md-offset-4">
    <tr style="border-bottom: solid 1px;">
        <th>name : </th>
        <td>{{$name}}</td>
    </tr>
    <tr style="border-bottom: solid 1px;">
        <th>email : </th>
        <td>{{$email}}</td>
    </tr>
    <tr style="border-bottom: solid 1px;">
        <th>password : </th>
        <td>{{$password}}</td>
    </tr>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>