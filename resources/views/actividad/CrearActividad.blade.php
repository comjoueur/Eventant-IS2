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
    @foreach($encargados as $data)
      <option value="$data">{{$data}}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
  <label>Expositor(es)</label>
  <script>
  
  $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div class="form-group"><input type="text" name="expositor[]"/><button href="#" class="delete"> Delete</button></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container1">
    <button class="add_form_field">Agregar Expositor &nbsp; 
      <span style="font-size:16px; font-weight:bold;">+ </span>
    </button>
    <div class="form-group"><input type="text" name="expositor[]"></div>
</div>

</div>
  <br>

  <div class="form-group">
  <label>Ambiente</label>
  <script>
  
  $(document).ready(function() {
    var max_fields1 = 10;
    var wrapper1 = $(".container2");
    var add_button1 = $(".add_form_field2");

    var x1 = 1;
    $(add_button1).click(function(e1) {
        e1.preventDefault();
        if (x1 < max_fields1) {
            x1++;
            $(wrapper1).append('<div><br> <div class="card"> <div class="card-body"> <div class="form-group"> <label> Fecha <label> <input type="date" name="fecha[]"></div> <div class="form-group"><label> Hora <label> <input type="time" name="hora[]"> </div> <div class="form-group"> <label for="encargado1">Ambiente</label> <select class="form-control" id="ambie" name="ambie[]"> @foreach($ambientes as $amb) <option value="$amb">{{$amb}}</option> @endforeach </select> </div> </div> </div> <button href="#" class="delete"> Delete</button></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper1).on("click", ".delete", function(e1) {
        e1.preventDefault();
        $(this).parent('div').remove();
        x1--;
    })
});
</script>
<div class="container2">
    <button type="button" class="add_form_field2">Agregar Fecha y ambiente &nbsp; 
      <span style="font-size:16px; font-weight:bold;">+ </span>
    </button>
    <br>
    <br>
    <div class="card">
    <div class="card-body">
    <div class="form-group">
    <label> Fecha <label>
    <input type="date" name="fecha[]">
    </div>
    <div class="form-group">
    <label> Hora <label>
    <input type="time" name="hora[]">
    </div>
    <div class="form-group">
      <label for="encargado1">Ambiente</label>
      <select class="form-control" id="ambie" name="ambie[]">
        @foreach($ambientes as $amb)
          <option value="$amb">{{$amb}}</option>
        @endforeach
      </select>
    </div>
    </div>
    </div>
  </div>
  </div>
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