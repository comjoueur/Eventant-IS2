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
  <h2>Gestionar Materiales del Evento</h2>
  <form  action="{{route ('OpcionMaterial')}}" method="post" >
    {{csrf_field()}}
  <input type="hidden" name='id_evento' value={{$id_evento}}>
    <table class="table">
  <thead>
    <tr>
    <th scope="col" style="font-variant: all-small-caps;"></th>
      <th scope="col">#</th>
      <th scope="col" style="font-variant: all-small-caps;">Material</th>
      <th scope="col" style="font-variant: all-small-caps;">Descripcion</th>
      <th scope="col" style="font-variant: all-small-caps;">Cantidad</th>
    </tr>
  </thead>
  <tbody>
    @foreach($materiales as $data)
      <tr>
      <?php
        if($data->count==1){
          echo '<td><input type="radio" id="radios" name="material" value='.$data->id_mat.' checked></td>';
        }
        else{
          echo '<td><input type="radio" id="radios" name="material" value='.$data->id_mat.'></td>';
        }
        ?>
        <th scope="row">{{$data->count}}</th>
        <td>{{$data->nombre}}</td>
        <td>{{$data->descripcion}}</td>
        <td>{{$data->cantidad}}</td>
      </tr>
   @endforeach
  </tbody>
</table>
<br>
<div class="container">
<div class="row">
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="crear" style="text-align: center;height:40px;width:200px;border-width: 0px;" value="crear">Agregar Nuevo material</button>
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="modificar" style=" text-align: center;height:40px;width:200px;border-width: 0px;" value="modificar">Modificar material</button>
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="eliminar" style=" text-align: center;height:40px;width:200px;border-width: 0px;" value="eliminar">Eliminar material</button>
</div>
</div>
</div>


  </form>

  <form action="{{route ('gestionarEvento')}}" method="get">
{{csrf_field()}}
<div class="container">
<div class="row">
<div class="col-4">
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-success" type="submit" value="crear" style="text-align: center;height:60px;width:200px;border-width: 0px;">Regresar a Gestionar Eventos</button>
</div>
</div>
</div>
</form>


</div>

</body>
</html>