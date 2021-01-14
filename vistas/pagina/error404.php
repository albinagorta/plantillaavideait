<style>
/*=============================================
ERROR 404, VERIFICAR
=============================================*/

.error404{
  color:#fe4f6b;

}

/*=============================================
ESCRITORIO GRANDE (LG revisamos en 1366px en adelante)
=============================================*/

@media (min-width:1200px){

  .col-lg-0{
    display: none;
  }

  .error404 h1{
    font-size:300px;
    text-shadow:8px 8px 1px #dadada;
  }

}

/*=============================================
ESCRITORIO MEDIANO O TABLET HORIZONTAL (MD revisamos en 1024px)
=============================================*/

@media (max-width:1199px) and (min-width:992px){

  .col-md-0{
    display: none;
  }

  .error404 h1{
    font-size:200px;
    text-shadow:6px 6px 1px #dadada;
  }

}

/*=============================================
ESCRITORIO PEQUEÑO O TABLET VERTICAL (SM revisamos en 768px)
=============================================*/

@media (max-width:991px) and (min-width:768px){

  .col-sm-0{
    display: none;
  }

  .error404 h1{
    font-size:150px;
    text-shadow:4px 4px 1px #dadada;
  }

}

/*=============================================
MOVIL (XS revisamos en 320px)
=============================================*/

@media (max-width:767px){

  .col-xs-0{
    display: none;
  }

  .error404 h1{
    font-size:75px;
    text-shadow:2px 2px 1px #dadada;
  }

}

</style>
<div class="container">
  
  <div class="row justify-content-md-center">
    
    <div class="col-xs-12 text-center error404">
      
      <h1 style="margin: initial;">404</h1>
      
      <h2>Oops! Página no encontrada</h2>

    </div>


  </div>


</div>