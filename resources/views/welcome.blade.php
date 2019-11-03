<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</head>


<body>
@include('layout.nav-menu')


<div class="container-slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
      <div class="carousel-item active" style="height: 100%;">
        <img class="d-block w-100" src="{{ asset('img/slides1.jpg') }}" alt="First slide" style="position: absolute;top: 0;left: 0;height: 100%;">
        <div class="carousel-caption d-none d-md-block">
          <h1 style="font-variant: all-small-caps;">Bienvenido a EventAnt</h1>
          <h3 style="font-variant: all-small-caps;">Comienza a diseñar tu evento</h3>
        </div>
      </div>
      <div class="carousel-item" style="height: 100%;">
        <img class="d-block w-100" src="{{ asset('img/slides2.jpg') }}" alt="Second slide" style="position: absolute;top: 0;left: 0;height: 100%;">
        <div class="carousel-caption d-none d-md-block">
          <h1 style="font-variant: all-small-caps;">Bienvenido a EventAnt</h1>
          <h3 style="font-variant: all-small-caps;">Crea tu eventos de manera eficiente y rápida</h3>
        </div>
      </div>
      <div class="carousel-item" style="height: 100%;">
        <img class="d-block w-100" src="{{ asset('img/slides5.jpg') }}" alt="Third slide" style="position: absolute;top: 0;left: 0;height: 100%;">
        <div class="carousel-caption d-none d-md-block">
          <h1 style="font-variant: all-small-caps;">Bienvenido a EventAnt</h1>
          <h3 style="font-variant: all-small-caps;">Organiza la logística de tu evento de manera sencilla</h3>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>

</body>
</html>
