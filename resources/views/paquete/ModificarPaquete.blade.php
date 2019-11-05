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
<div><h1>Modificar Paquete</h1></div>
<form action="{{route ('ModificarPaquete')}}" method="post">
{{csrf_field()}}
  <div class="form-group">
  <label for="nombre">Nombre</label>
    <input class="form-control" id="nombre" name="nombre">
  </div>
  <div class="form-group">
  <label for="PrecioEstudiante">Precio Estudiante</label>
    <input class="form-control" id="PrecioEstudiante" name="PrecioEstudiante" type="text">
  </div>
  <div class="form-group">
  <label for="PrecioProfesional">Precio Profesional</label>
    <input class="form-control" id="PrecioProfesional" name="PrecioProfesional" type="email">
  </div>
  <div class="form-group">
  <label for="PrecioColaborador">Precio Colaborador</label>
    <input class="form-control" id="PrecioColaborador" name="PrecioColaborador" type="text">
  </div>
  <div class="form-group">
    Actividades:<br>
    @foreach ($actividades as $actividad)
    <li class="list-group-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="$actividad[0]" id="$actividad[0]">
        <label class="form-check-label" for="$actividad[0]">{{ $actividad[1] }} </label>
    </div>
    </li>
    @endforeach

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