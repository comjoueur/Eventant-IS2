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
  <h2>Paquetes</h2>
  <form  action="{{route ('OpcionPaquete')}}" method="post" >
    {{csrf_field()}}
  <input name="id_evento" type="hidden" value={{$id_evento}} >
    <table class="table">
  <thead>
    <tr>
    <th scope="col" style="font-variant: all-small-caps;"></th>
      <th scope="col">#</th>
      <th scope="col" style="font-variant: all-small-caps;">Paquete</th>
      <th scope="col" style="font-variant: all-small-caps;">Actividades</th>
    </tr>
  </thead>
  <tbody>
    @foreach($paquetes as $data)
      <tr>
      <?php
        if($data->count==1){
          echo '<td><input type="radio" id="radios" name="paquete" value='.$data->id_paquete.' checked></td>';
        }
        else{
          echo '<td><input type="radio" id="radios" name="paquete" value='.$data->id_paquete.'></td>';
        }
        ?>
        <th scope="row">{{$data->count}}</th>
        <td>{{$data->nombre}}</td>
        <td>
        @foreach($data->actividades as $actividad)
            {{$actividad->nombre}} <br>
        @endforeach
        </td>
      </tr>
   @endforeach
  </tbody>
</table>
<br>
<div class="container">
<div class="row">
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="crear" style="text-align: center;height:40px;width:200px;border-width: 0px;" value="crear">Agregar Nuevo Paquete</button>
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="modificar" style=" text-align: center;height:40px;width:200px;border-width: 0px;" value="modificar">Modificar Paquete</button>
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="eliminar" style=" text-align: center;height:40px;width:200px;border-width: 0px;" value="eliminar">Eliminar Paquete</button>
</div>
</div>
</div>


  </form>
<form action="{{route ('GestionarMaterial')}}" method="post">
{{csrf_field()}}
<div class="container">
<div class="row">
<div class="col-4">
</div>
<input name="id_evento" type="hidden" value={{$id_evento}} >
<div class="col-4">
<button name="botonopcion" class="btn btn-success" type="submit" value="crear" style="text-align: center;height:60px;width:200px;border-width: 0px;">Gestionar Materiales del Evento</button>
</div>
</div>
</div>
</form>
</div>

</body>
</html>