<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Contacto desde el sitio web</h2>
    <div>
        <p><strong>Nombre:</strong>  {{ $data['name'] }}  </p>
        @isset($data['last_name'])
            <p><strong>Apellido:</strong> {{ $data['last_name'] }}</p>
        @endisset
        <p><strong>Email:</strong>  {{ $data['email'] }} </p>
        @if (isset($data['company']))
            <p><strong>Empresa:</strong> {{ $data['company'] }} </p>
        @endif
        @if (isset($data['mensaje']))
            <p><strong>Mensaje:</strong>  {{ $data['mensaje'] }} </p>
        @endif        
    </div>    
</body>
</html>