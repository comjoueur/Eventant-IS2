<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</head>


<body>
@include('layout.nav-menu')

<div class="container">
  <br>
  <h2>Personal</h2>
  <form  action="{{route ('OpcionPersonal')}}" method="post" >
    {{csrf_field()}}
    <input name="id_evento" value={{$id_evento}} type="hidden">
    <table class="table">
  <thead>
    <tr>
    <th scope="col" style="font-variant: all-small-caps;"></th>
      <th scope="col">#</th>
      <th scope="col" style="font-variant: all-small-caps;">Nombre</th>
      <th scope="col" style="font-variant: all-small-caps;">Apellido</th>
      <th scope="col" style="font-variant: all-small-caps;">Rol</th>
      <th scope="col" style="font-variant: all-small-caps;">Correo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($personal as $data)
      <tr>
      <?php
        if($data->count==1){
          echo '<td><input type="radio" id="radios" name="id_trab" value='.$data->id_trab.' checked></td>';
        }
        else{
          echo '<td><input type="radio" id="radios" name="id_trab" value='.$data->id_trab.'></td>';
        }
        ?>
        <th scope="row">{{$data->count}}</th>
        <td>{{$data->nombre}}</td>
        <td>{{$data->apellido}}</td>
        <td>{{$data->rol}}</td>
        <td>{{$data->correo}}</td>
      </tr>
   @endforeach
  </tbody>
</table>
<br>
<div class="container">
<div class="row">
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="crear" style="text-align: center;height:40px;width:200px;border-width: 0px;" value="crear">Agregar Nuevo Personal</button>
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="modificar" style=" text-align: center;height:40px;width:200px;border-width: 0px;" value="modificar">Modificar Personal</button>
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="eliminar" style=" text-align: center;height:40px;width:200px;border-width: 0px;" value="eliminar">Eliminar Personal</button>
</div>
</div>
</div>


  </form>
<form action="{{route ('GestionarActividad')}}" method="post">
{{csrf_field()}}
<div class="container">
<div class="row">
<div class="col-4">
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-success" type="submit" value="crear" style="text-align: center;height:60px;width:200px;border-width: 0px;">Gestionar Actividades del Evento</button>
</div>
</div>
</div>
</form>
</div>

</body>
</html>