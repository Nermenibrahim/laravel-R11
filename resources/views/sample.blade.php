<!DOCTYPE html>
<html>
<head>
    <title></title>

    <!--
	You can put your custom CSS if you wish
    -->
</head>
<body>
    <h3>from:{{ $data['Name'] }}</h1>
    <h3>email:{{ $data['email'] }}</h1>
    <h3>subject:{{ $data['subject'] }}</h2>
    <hr>
    <p>{{ $data['message'] }}</p>
</body>
</html>