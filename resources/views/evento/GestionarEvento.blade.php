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
<form action="{{route ('OpcionEvento')}}" method="post" >
    {{csrf_field()}}
    <br>
    <h2>Eventos Próximos y en Curso</h2>
    <br>

    <table class="table">
  <thead>
    <tr>
    <th scope="col" style="font-variant: all-small-caps;"></th>
      <th scope="col">#</th>
      <th scope="col" style="font-variant: all-small-caps;">Nombre</th>
      <th scope="col" style="font-variant: all-small-caps;">Inicio</th>
      <th scope="col" style="font-variant: all-small-caps;">Fin</th>
      <th scope="col" style="font-variant: all-small-caps;">Descripción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($eventsA as $events)
      <tr>
      <?php
        if($events->count==1){
          echo '<td><input type="radio" id="radios" name="evento" value='.$events->id_evento.' checked></td>';
        }
        else{
          echo '<td><input type="radio" id="radios" name="evento" value='.$events->id_evento.'></td>';
        }
        ?>
        <th scope="row">{{$events->count}}</th>
        <td>{{$events->nombre}}</td>
        <td>{{$events->fechainicio}}</td>
        <td>{{$events->fechaFin}}</td>
        <td>{{$events->descripcion}}</td>
      </tr>
   @endforeach
  </tbody>
</table>
<br>
<div class="container">
<div class="row">
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="crear" style="text-align: center;height:40px;width:200px;border-width: 0px;">Crear Nuevo Evento</button>
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="adaptar" style="text-align: center;height:40px;width:200px;border-width: 0px;">Adaptar Evento</button>
</div>
<div class="col-4">
<button name="botonopcion" class="btn btn-primary" type="submit" value="modificar" style=" text-align: center;height:40px;width:200px;border-width: 0px;">Modificar Evento</button>
</div>
</div>
</div>
  </form>
</div>





<div class="container">
<form action="{{route ('OpcionEvento')}}" method="post" >
{{csrf_field()}}
    <br>
      <h2>Eventos Pasados</h2>
    <br>

    <table class="table">
  <thead>
    <tr>
    <th scope="col" style="font-variant: all-small-caps;"></th>
      <th scope="col">#</th>
      <th scope="col" style="font-variant: all-small-caps;">Nombre</th>
      <th scope="col" style="font-variant: all-small-caps;">Inicio</th>
      <th scope="col" style="font-variant: all-small-caps;">Fin</th>
      <th scope="col" style="font-variant: all-small-caps;">Descripción</th>
    </tr>
  </thead>
  <tbody>
  @foreach($eventsP as $events)
      <tr>
      <?php
        if($events->count==1){
          echo '<td><input type="radio" id="radios" name="evento" value="'.$events->id_evento.'" checked></td>';
        }
        else{
          echo '<td><input type="radio" id="radios" name="evento" value="'.$events->id_evento.'"></td>';
        }
        ?>
        <th scope="row">{{$events->count}}</th>
        <td>{{$events->nombre}}</td>
        <td>{{$events->fechainicio}}</td>
        <td>{{$events->fechaFin}}</td>
        <td>{{$events->descripcion}}</td>
      </tr>
   @endforeach
  </tbody>
</table>
<br>
<div class="container">
<div class="row">
<div class="col-sm">
<button name="botonopcion" class="btn btn-primary" type="submit" value="adaptar" style=" text-align: center;height:40px;width:200px;border-width: 0px;">Adaptar Evento</button>
</div>
</div>
</div>
  </form>
</div>
<br>
</body>
</html>