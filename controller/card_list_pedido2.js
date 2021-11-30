<script type="text/javascript">



var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var json = this.responseText;
    var json = JSON.parse(json);


   
  const options = {
    valueNames: ['id','codprod','descprod','caracteristicas','tem_img'],
    item: 'myitem',
    page: 6,
    pagination: true
  }



  var monkeyList = new List('mylist',options,json);

   // alert(json)



  }
};
xmlhttp.open("GET","controller/get_produtos.php",true);
xmlhttp.send();







</script>