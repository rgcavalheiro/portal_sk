
<script type="text/javascript">


$(document).ready(function($){

 



 
   
$('#mylist').on('click','.addcarrinho2 ',function(event){
     var id = $(this).data('id');
    
     $('#addItemModal2').modal('show');

     $.ajax({
      url:"controller/get_single_data_produto.php",
      data:{id:id},
      type:'post',
      success:function(data)
      {
       var json = JSON.parse(data);
       $('#descprod').val(json.descprod);
       $('#codprod').val(json.codprod);
       $("#quantidade").attr({
         "min" : json.qtdminima,
         "max" : json.qtdmaxima,
         "value" : json.qtdminima
       });
       $('#demo').html(json.qtdminima);   

       $('#codvigencia').val(json.codvigencia);    

       $('#_vlrunitario').val(json.vlrunitario);
       atual = json.vlrunitario*1;
       var f = atual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
       $('#vlrunitario').val(f);



       total_mask = json.vlrunitario*json.qtdminima;
       var x = total_mask.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
       $('#total').val(x);
       




     }
   })


     
   });








});
</script>


