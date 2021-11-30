
<script type="text/javascript">


$(document).ready(function($){



    


   $('.editprecobtn').click(function(event){
   
     var id = $(this).data('id');
     
     $('#editPrecoModal').modal('show');

     $.ajax({
      url:"controller/get_single_data_preco.php",
      data:{id:id},
      type:'post',
      success:function(data)
      {
       var json = JSON.parse(data);
       
       $('#_id').val(json.id);
       $('#_descprod').val(json.descprod);
       $('#_codprodseq').val(json.codprodseq);
       $('#_codvigencia').val(json.codvigencia);
       $('#_qtdminima').val(json.qtdminima);
       $('#_qtdmaxima').val(json.qtdmaxima);
       $('#_vlrunitario').val(json.vlrunitario);
       
     }
   })
   });








  $('.deletePrecoBtn').click(function(event){       
      event.preventDefault();
      var id = $(this).data('id');
      if(confirm("Tem certeza que deseja remover esse preço?"))
      {
      $.ajax({
        url:"controller/delete_preco.php",
        data:{id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          status = json.status;
          if(status=='success')
          {
            //table.fnDeleteRow( table.$('#' + id)[0] );
            // $("#pedido tbody").find(id).remove();
             //table.row($(this).closest("tr")).remove();
             $("#"+id).closest('tr').remove();
          }
          else
          {
            alert('Erro');
            return;
          }
        }
      });
      }
      else
      {
        return null;
      }



    });



});
</script>