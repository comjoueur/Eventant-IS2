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
<div><h1>Crear Actividad</h1></div>
<form action="{{route ('CrearActividad')}}" method="post">
{{csrf_field()}}
<div class="form-group">
  <div class="form-group">
    <label for="actividad">Nombre</label>
    <input type="text" class="form-control" id="evento" name="actividad" placeholder="Nombre de la actividad">
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
  <div class="form-group">
  <label for="encargado">Encargado</label>
    <select class="form-control" id="encargado" name="encargado">
    @foreach($encargados as $encargados)
      <option value="$encargados">{{$encargados}}</option>
    @endforeach
    </select>
  </div>
  <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("member").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                var input = document.createElement("input");
                input.type = "text";
                input.class = "form-control";
                input.name = "expositor" + i;
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
<input type="text" class="form-control" id="member" name="member" value="">Numero de expositores <br>
    <a href="#" id="filldetails" onclick="addFields()">Crear Campos</a>
    <div id="container"></div>
  <br>
  <br>
  <br>
  <div class="row">
  <div class="col-sm">
  <button type="submit" class="btn btn-success" style=" text-align: center;height:40px;width:200px;border-width: 0px;">Gestionar Actividades</button>
  </div>
  </div>
  <br>
</form>
</div>

</body>
</html>