
<script type="text/javascript">


$(document).ready(function($){






  $('#grid').DataTable({
    'serverSide':true,
    'processing':true,
    'paging':true,
    'order':[],
    'ajax':{
      'url':'controller/tabela_grid.php',
      'type':'post',
    },
    'fnCreatedRow':function(nRow,aData,iDataIndex)
    {
      $(nRow).attr('id',aData[0]);
    },
    'columnDefs':[{
      'target':[0,7],
      'orderable':false,
    }],
    "oLanguage": {
      "sLengthMenu": "Mostrar _MENU_ registros por página",
      "sZeroRecords": "Nenhum registro encontrado",
      "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
      "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
      "sInfoFiltered": "(filtrado de _MAX_ registros)",
      "sSearch": "Pesquisar: ",
      "oPaginate": {
        "sFirst": "Início",
        "sPrevious": "Anterior",
        "sNext": "Próximo",
        "sLast": "Último"
      }
    }

  });




  $('#grid').on('click','.addcarrinho ',function(event){
    var table = $('#grid').DataTable();
    var trid = $(this).closest('tr').attr('id');
     // console.log(selectedRow);
     var id = $(this).data('id');
     $('#addProduto').modal('show');

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










  $(document).on('submit','#addItem',function(e){
    e.preventDefault();
       //var tr = $(this).closest('tr');
       var id= $('#id').val();
       var codprod= $('#codprod').val();
       var quantidade= $('#quantidade').val();
       var codvigencia= $('#codvigencia').val();

       
       $.ajax({
        url:"controller/add_item.php",
        type:"post",
        data:{id:id,codprod:codprod,quantidade:quantidade,codvigencia:codvigencia},
        success:function(data)
        {
         var json = JSON.parse(data);
         var status = json.status;
         if(status=='true')
         {
          alert('adicionado!');


          $('#addItemModal').modal('hide');
          $('#addItemModal2').modal('hide');




        }
        else
        {
          alert('Erro.');
        }
      }
    });
       
     });











});
</script>


