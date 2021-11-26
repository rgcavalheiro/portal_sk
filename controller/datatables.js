
<script type="text/javascript">


  $(document).ready(function($){







    $('#datatable').DataTable({
      'serverSide':true,
      'processing':true,
      'paging':true,
      'order':[],
      'ajax':{
        'url':'controller/tabela_usuarios.php',
        'type':'post',
      },
      'fnCreatedRow':function(nRow,aData,iDataIndex)
      {
        $(nRow).attr('id',aData[0]);
      },
      'columnDefs':[{
        'target':[0,6],
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



    $('#parceiros').DataTable({
      'serverSide':true,
      'processing':true,
      'paging':true,
      'order':[],
      'ajax':{
        'url':'controller/tabela_parceiros.php',
        'type':'post',
      },
      'fnCreatedRow':function(nRow,aData,iDataIndex)
      {
        $(nRow).attr('id',aData[0]);
      },
      'columnDefs':[{
        'target':[0,8],
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





    $('#produtos').DataTable({
      'serverSide':true,
      'processing':true,
      'paging':true,
      'order':[],
      'ajax':{
        'url':'controller/tabela_produtos.php',
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
        }

    });






    $('#grupos').DataTable({
      'serverSide':true,
      'processing':true,
      'paging':true,
      'order':[],
      'ajax':{
        'url':'controller/tabela_grupos.php',
        'type':'post',
      },
      'fnCreatedRow':function(nRow,aData,iDataIndex)
      {
        $(nRow).attr('id',aData[0]);
      },
      'columnDefs':[{
        'target':[0,2],
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


















$('#parceiros').on('click','.gerausbtn ',function(event){
      var table = $('#parceiros').DataTable();
      var trid = $(this).closest('tr').attr('id');
     // console.log(selectedRow);
     var id = $(this).data('id');
     $('#gerarUserModal').modal('show');

     $.ajax({
      url:"controller/get_single_data_parceiro.php",
      data:{id:id},
      type:'post',
      success:function(data)
      {
       var json = JSON.parse(data);
       $('#codparc').val(json.codparc);
       $('#trid').val(trid);
     }
   })
   });




$(document).on('submit','#gerarusuario',function(e){
      e.preventDefault();     
      var usuario= $('#usuario').val();
      var senha= $('#senha').val(); 
      var email= $('#email').val(); 
      var grupo= $('#grupo').val(); 
      var codparc= $('#codparc').val();      
      if(usuario != '' && senha != '' && email != '' && grupo != '' && codparc != '')
      {
       $.ajax({
         url:"controller/add_user_parceiro.php",
         type:"post",
         data:{usuario:usuario,senha:senha,email:email,grupo:grupo,codparc:codparc},
         success:function(data)
         {
           var json = JSON.parse(data);
           var status = json.status;
           if(status=='true')
           {
            mytable =$('#parceiros').DataTable();
            mytable.draw();
            $('#gerarUserModal').modal('hide');

            $('#usuario').val('');
            $('#senha').val('');
            $('#email').val('');
            $('#grupo').val('');
            $('#codparc').val('');
                        alert('Novo usuário adicionado!');

          }
          else
          {
            alert('failed');
          }
        }
      });
     }
     else {
      alert('Preencha todos os campos!');
    }
  });

























$(document).on('submit','#addUser',function(e){
      e.preventDefault();     
      var usuario= $('#addUserField').val();
      var senha= $('#addPassField').val(); 
      var email= $('#addEmailField').val(); 
      var grupo= $('#addGrupoField').val(); 
      var codparc= $('#addCodparcField').val();      
      if(usuario != '' && senha != '' && email != '' && grupo != '' && codparc != '')
      {
       $.ajax({
         url:"controller/add_user.php",
         type:"post",
         data:{usuario:usuario,senha:senha,email:email,grupo:grupo,codparc:codparc},
         success:function(data)
         {
           var json = JSON.parse(data);
           var status = json.status;
           if(status=='true')
           {
            mytable =$('#datatable').DataTable();
            mytable.draw();
            $('#addUserModal').modal('hide');

            $('#addUserField').val('');
            $('#addPassField').val('');
            $('#addEmailField').val('');
            $('#addGrupoField').val('');
            $('#addCodparcField').val('');
                        alert('Novo usuário adicionado!');

          }
          else
          {
            alert('failed');
          }
        }
      });
     }
     else {
      alert('Preencha todos os campos!');
    }
  });






$('#datatable').on('click','.editbtn ',function(event){
      var table = $('#datatable').DataTable();
      var trid = $(this).closest('tr').attr('id');
     // console.log(selectedRow);
     var id = $(this).data('id');
     $('#editUserModal').modal('show');

     $.ajax({
      url:"controller/get_single_data.php",
      data:{id:id},
      type:'post',
      success:function(data)
      {
       var json = JSON.parse(data);
       $('#_userField').val(json.usuario);
       $('#_passField').val(json.senha);
       $('#_emailField').val(json.email);
       $('#_grupoField').val(json.grupo);
       $('#_codparcField').val(json.codparc);
       $('#id').val(id);
       $('#trid').val(trid);
     }
   })
   });



$(document).on('submit','#updateUser',function(e){
      e.preventDefault();
       //var tr = $(this).closest('tr');
       var usuario= $('#_userField').val();
       var senha= $('#_passField').val();
       var email= $('#_emailField').val();
       var grupo= $('#_grupoField').val();
       var codparc= $('#_codparcField').val();

       var trid= $('#trid').val();
       var id= $('#id').val();
       if(usuario != '' && senha != '' && email != '' && grupo != '' && codparc != '')
       {
         $.ajax({
           url:"controller/update_user.php",
           type:"post",
           data:{id:id,usuario:usuario,senha:senha,email:email,grupo:grupo,codparc:codparc},
           success:function(data)
           {
             var json = JSON.parse(data);
             var status = json.status;
             if(status=='true')
             {
              table =$('#datatable').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              var button =   '<td><a href="javascript:void();" data-id="' +id + '" class="btn btn-info btn-sm editbtn">Editar</a>  <a href="#!"  data-id="' +id + '"  class="btn btn-danger btn-sm deleteBtn">Deletar</a></td>';
              var row = table.row("[id='"+trid+"']");
              row.row("[id='" + trid + "']").data([id,usuario,senha,email,grupo,codparc,button]);
              $('#editUserModal').modal('hide');
            }
            else
            {
              alert('failed');
            }
          }
        });
       }
       else {
        alert('Preencha todos os campos!');
      }
    });







$(document).on('click','.deleteBtn',function(event){
       var table = $('#datatable').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if(confirm("Tem certeza que deseja excluir o usuário ?"))
      {
      $.ajax({
        url:"controller/delete_user.php",
        data:{id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          status = json.status;
          if(status=='success')
          {
            //table.fnDeleteRow( table.$('#' + id)[0] );
             //$("#example tbody").find(id).remove();
             //table.row($(this).closest("tr")) .remove();
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







$(document).on('submit','#addGrupo',function(e){
      e.preventDefault();     
      var descricao= $('#descricao').val();
      var grupo= $('#grupo').val(); 
    
      if(descricao != '' && grupo != '' )
      {
       $.ajax({
         url:"controller/add_grupo.php",
         type:"post",
         data:{descricao:descricao,grupo:grupo},
         success:function(data)
         {
           var json = JSON.parse(data);
           var status = json.status;
           if(status=='true')
           {
            mytable =$('#grupos').DataTable();
            mytable.draw();
            $('#addGrupoModal').modal('hide');

            $('#descricao').val('');
            $('#grupo').val('');

                        alert('Novo grupo adicionado!');

          }
          else
          {
            alert('failed');
          }
        }
      });
     }
     else {
      alert('Preencha todos os campos!');
    }
  });




$('#grupos').on('click','.editbtn ',function(event){
      var table = $('#grupos').DataTable();
      var trid = $(this).closest('tr').attr('id');
     // console.log(selectedRow);
     var id = $(this).data('id');
     $('#editGrupoModal').modal('show');

     $.ajax({
      url:"controller/get_single_data_grupo.php",
      data:{id:id},
      type:'post',
      success:function(data)
      {
       var json = JSON.parse(data);
       $('#_descricao').val(json.descricao);
       $('#_grupo').val(json.grupo);
       $('#id').val(id);
       $('#trid').val(trid);
     }
   })
   });




$(document).on('submit','#updateGrupo',function(e){
      e.preventDefault();
     
       var descricao= $('#_descricao').val();
       var grupo= $('#_grupo').val();
       

       var trid= $('#trid').val();
       var id= $('#id').val();
       if(grupo != '' && descricao != '')
       {
         $.ajax({
           url:"controller/update_grupo.php",
           type:"post",
           data:{id:id,grupo:grupo,descricao:descricao},
           success:function(data)
           {
             var json = JSON.parse(data);
             var status = json.status;
             if(status=='true')
             {
              table =$('#grupos').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              var button =   '<td><a href="javascript:void();" data-id="' +id + '" class="btn btn-info btn-sm editbtn">Editar</a>  <a href="#!"  data-id="' +id + '"  class="btn btn-danger btn-sm deleteGroupBtn">Deletar</a></td>';
              var row = table.row("[id='"+trid+"']");
              row.row("[id='" + trid + "']").data([id,descricao,grupo,button]);
              $('#editGrupoModal').modal('hide');
            }
            else
            {
              alert('failed');
            }
          }
        });
       }
       else {
        alert('Preencha todos os campos!');
      }
    });





$(document).on('click','.deleteGroupBtn',function(event){
       var table = $('#datatable').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if(confirm("Tem certeza que deseja excluir o grupo ?"))
      {
      $.ajax({
        url:"controller/delete_grupo.php",
        data:{id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          status = json.status;
          if(status=='success')
          {
            //table.fnDeleteRow( table.$('#' + id)[0] );
             //$("#example tbody").find(id).remove();
             //table.row($(this).closest("tr")) .remove();
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