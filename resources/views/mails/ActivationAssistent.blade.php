<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>



      <h2>"Verificación por correo electrónico de Red Medica"</h2>

      <p>Un Cordial saludo: {{$assistant->name}} {{$assistant->lastName}}, Para Confirmar su registro en MedicosSi debe Ingresar a la Ruta: </p><a href="{{route('confirmAssistant',['id'=>$user->id,'code'=>$code])}}">{{route('confirmAssistant',['id'=>$user->id,'code'=>$code])}}</a>

      <p>Si usted no Solicito una cuenta en MédicosSi, Simplemente omita el mensaje; de este modo la cuenta no sera verificada.</p>


</body>
</html>
