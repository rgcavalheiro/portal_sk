<script type="text/javascript">




var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var json = this.responseText;
    var json = JSON.parse(json);


   
  const options = {
    valueNames: ['img','descprod','caracteristicas','qtdminima','qtdmaxima','vlrunitario','id','botao'],
    item: 'myitem',
    page: 12,
    pagination: true
  }



  var monkeyList = new List('mylist',options,json);

   // alert(json)



  }
};
xmlhttp.open("GET","controller/tabela_grid.php",true);
xmlhttp.send();




</script>