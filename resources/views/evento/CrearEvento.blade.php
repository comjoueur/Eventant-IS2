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
<div><h1>Crear Evento</h1></div>
<form action="{{route ('CrearEvento')}}" method="post">
{{csrf_field()}}
<div class="form-group">
  <label for="recinto">Recinto</label>
    <select class="form-control" id="recinto" name="recinto">
    @foreach($recintos as $data)
      <option value={{$data->id_amb}}>{{$data->nombre}}</option>
    @endforeach
    </select>
    <small id="emailHelp" class="form-text text-muted">¿No encuentras el recinto adecuado para tu evento?, Créalo haciendo <a href="gestionarRecinto">click aquí</a></small>
  </div>
  <div class="form-group">
    <label for="evento">Nombre</label>
    <input type="text" class="form-control" id="evento" name="evento">
  </div>
  <div class="form-group">
    <label for="fechainicio">Fecha de Inicio</label>
    <input type="date" class="form-control" id="fechainicio" name="fechainicio">
  </div>
  <div class="form-group">
    <label for="fechafinal">Fecha de Fin</label>
    <input type="date" class="form-control" id="fechafinal" name="fechafinal">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion">
  </div>
  <br>
  <div class="row">
  <div class="col-sm">
  <button type="submit" class="btn btn-success" style=" text-align: center;height:40px;width:200px;border-width: 0px;">Gestionar Personal</button>
  </div>
  </div>
  <br>
</form>
</div>
</body>

</html>