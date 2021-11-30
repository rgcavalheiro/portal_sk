<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lista de Produtos</h1>
        <h4 class="h4">Vigência <?php echo date('d/m/Y ', time());?></h4>

    </div>



    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="grid">
            <thead>
                <tr>
                    <th width="100px">Img</th>
                    <th width="100px">Produto</th>
                    <th width="100px">Características</th>
                    <th width="100px">Pedido Mínimo</th>
                    <th width="100px">Pedido Máximo</th>
                    <th width="100px">Preço Unitário</th>                    
                    <th width="100px">ID</th>
                    <th width="100px"></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>



</main>


<style type="text/css">
.slidecontainer {
  width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
  -webkit-appearance: none;  /* Override default CSS styles */
  appearance: none;
  width: 100%; /* Full-width */
  height: 25px; /* Specified height */
  background: #d3d3d3; /* Grey background */
  outline: none; /* Remove outline */
  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
  transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
  opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
.slider::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #04AA6D; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #04AA6D; /* Green background */
  cursor: pointer; /* Cursor on hover */
}
</style>


<?php 


if(isset($_SESSION['next_item'])){
  $next_item = $_SESSION['next_item'];

}else{
  $_SESSION['next_item'] = 1;
  $next_item = 1;
}




?>

<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Encomendar item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <form id="addItem" action="">



          <div class="mb-3 row">
            <label for="produto" class="col-md-3 form-label">Produto</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="descprod" name="produto" disabled>
              <input type="hidden" name="id" id="id" value="<?=$next_item?>">
              <input type="hidden" name="codprod" id="codprod" value="">
              <input type="hidden" name="codvigencia" id="codvigencia" value="">
          </div>
      </div>



      <div class="mb-3 row">
        <label for="quantidade" class="col-md-3 form-label">Quantidade</label>
        <div class="col-md-9">
          <div class="slidecontainer">
            <input type="range" min="1" max="100" value="1" step="1" class="slider" id="quantidade">
            <div id="demo">

            </div>
        </div>
    </div>
</div>

<div class="mb-3 row">
    <label for="total" class="col-md-3 form-label">Preço Unitário</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="vlrunitario" value="" name="vlrunitario" disabled>
       <input type="hidden" name="vlrunitario" id="_vlrunitario" value="">
  </div>
</div>


<div class="mb-3 row">
    <label for="total" class="col-md-3 form-label">Total</label>
    <div class="col-md-9">
       
        <input type="text" class="form-control" id="total" value="9.99" name="total" disabled>
    </div>
</div>





<div class="modal-footer">
  <button type="submit" class="btn btn-primary">Confirmar</button>
</div>


</form> 
</div>

</div>
</div>
</div>
<!-- END Add user Modal -->




<script type="text/javascript">
    var slider = document.getElementById("quantidade");
    var output = document.getElementById("demo");
    var total = document.getElementById("total");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value; 
         total_mask = this.value * document.getElementById("_vlrunitario").value;
       var f = total_mask.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
  document.getElementById("total").value = f;
}




</script>