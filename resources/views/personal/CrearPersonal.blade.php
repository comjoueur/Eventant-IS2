<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</head>


<body>
@include('layout.nav-menu')
<br>
<div class="container">
<div><h1>Agregar Trabajador</h1></div>
<form action="{{route ('CrearPersonal')}}" method="post">
{{csrf_field()}}
  <input name="id_evento" value="{{$data}}" type="hidden">
  <div class="form-group">
    <label for="dni">DNI</label>
    <input type="number" class="form-control" id="dni" name="dni">
  </div>
  <div class="form-group">
  <label for="nombre">Nombre</label>
    <input class="form-control" id="nombre" name="nombre">
  </div>
  <div class="form-group">
  <label for="apellido">Apellido</label>
    <input class="form-control" id="apellido" name="apellido" type="text">
  </div>
  <div class="form-group">
  <label for="correo">Correo</label>
    <input class="form-control" id="correo" name="correo" type="email">
  </div>
  <div class="form-group">
  <label for="rol" >Rol</label>
    <select class="form-control" name="rol">
      <option value="Encargado">Encargado</option>
      <option value="Organizador">Organizador</option>
      <option value="Colaborador">Colaborador</option>
    </select>
  </div>
  <div class="form-group">
  <label for="usuario">Usuario</label>
    <input class="form-control" id="usuario" name="usuario" type="text">
  </div>
  <div class="form-group">
  <label for="contrasena">Contraseña</label>
    <input class="form-control" id="contrasena" name="contra" type="password">
  </div>
  </div>
  <br>
  <div class="row">
  <div class="col-4">
  </div>
  <div class="col-4">
  <button type="submit" class="btn btn-success" style=" text-align: center;height:40px;width:200px;border-width: 0px;">Agregar</button>
  </div>
  </div>
  <br>
</form>
</div>
</body>

</html>