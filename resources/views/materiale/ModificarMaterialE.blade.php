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
<div><h1>Modificar Material</h1></div>
<form action="{{route ('ModificarMaterialE')}}" method="post">
<input type="hidden" name="id_amb" value={{$data->id_amb}}>
<input type="hidden" name="id_mat" value={{$data->id_mat}}>
{{csrf_field()}}
  <div class="form-group">
    <label for="ambiente">Nombre</label>
    <input type="text" class="form-control" id="materiale" name="materiale" value="{{$data->nombre}}">
  </div>
  <div class="form-group">
  <label for="capacidad">Cantidad</label>
    <input class="form-control" id="cantidad" name="cantidad" type="number" value={{$data->cantidad}}>
  </div>
  <label for="descripcion">Descripción</label>
    <input class="form-control" id="descripcion" name="descripcion" type="text" value="{{$data->descripcion}}">
  </div>
  <br>
  <div class="row">
  <div class="col-4">
  </div>
  <div class="col-4">
  <button type="submit" class="btn btn-success" style=" text-align: center;height:40px;width:200px;border-width: 0px;">Modificar Material</button>
  </div>
  </div>
  <br>
</form>
</div>
</body>

</html>