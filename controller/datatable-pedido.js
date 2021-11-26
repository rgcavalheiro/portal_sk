
<script type="text/javascript">


$(document).ready(function($){






  $('#pedido').DataTable({
    'serverSide':true,
    'processing':false,
    'paging':false,
    'order':[],
    'language': {
        'infoEmpty': 'Nenhum produto adicionado.',
    },
    'ajax':{
      'url':'controller/tabela_pedido.php',
      'type':'post',
    },
    'fnCreatedRow':function(nRow,aData,iDataIndex)
    {
      $(nRow).attr('id',aData[0]);
    },
    'columnDefs':[{
      'target':[0,5],
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
    },
   

  });


$(document).on('click','.deleteItem',function(event){
       var table = $('#pedido').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if(confirm("Tem certeza que deseja remover esse item?"))
      {
      $.ajax({
        url:"controller/delete_item.php",
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