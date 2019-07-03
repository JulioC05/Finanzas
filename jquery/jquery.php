<script>
  $(document).ready(function() {
    fecha =  new Date();
  //Año
  year = fecha.getFullYear();
  //Mes
  mes = fecha.getMonth() + 1;
  data = mes+"/"+year;

  changeDate(data);


});
</script>

<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
           format: 'MM/YYYY'
             
        })
        .on('dp.change', function (e) {
          var fecha = $("#date").val();
          changeDate(fecha);
         });
    });
</script>


<script type="text/javascript">

  function changeDate(fecha){

    mostrar_items_gastos(fecha);
    indicadorGastosUpdate(fecha);
    

  }

  function indicadorGastosUpdate(fecha){    
    $.ajax({
      type: "GET",
      url:'ajax/indicadores.php?fecha='+fecha+"&indicadorGastos=indicadorGastos",     
       beforeSend: function(objeto){
       $('#resultadosIndicadorGastos').html('Cargando...');
      },
      success:function(data){
        $("#resultadosIndicadorGastos").html(data).fadeIn('slow');
    }
    })
  }

  function mostrar_items_gastos(fecha){
    var parametros={"action":"ajax"};
    $.ajax({
      url:'ajax/gastos.php?fecha='+fecha,
      data: parametros,
       beforeSend: function(objeto){
       $('.items_gastos').html('Cargando...');
      },
      success:function(data){
        
        $(".items_gastos").html(data).fadeIn('slow');
    }
    })
  }

  $( "#guardar_gastos" ).submit(function( event ) {
    parametros = $(this).serialize();
    var fecha = $("#date").val();
    var fechaString= fecha.toString();
    $.ajax({
      type: "POST",
      url:'ajax/gastos.php?fecha='+fecha,
      data: parametros,
       beforeSend: function(objeto){
         $('.items_gastos').html('Cargando...');
        },
      success:function(data){

        $(".items_gastos").html(data).fadeIn('slow');

        $("#modalGastos").modal('hide');

        changeDate(fechaString);
      }
    })
    
    event.preventDefault();
  })

  $('#update_gastos').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') 
      $('#edit_id_gastos').val(id)
      var item = button.data('item')
      $('#edit_item').val(item)
      var descripcion = button.data('descripcion') 
      $('#edit_descripcion').val(descripcion)
      var previsto = button.data('previsto') 
      $('#edit_asignado').val(previsto)
      var real = button.data('real') 
      $('#edit_ejecutado').val(real)
      
      
    })

  $( "#gastos_update" ).submit(function( event ) {
      var parametros = $(this).serialize();
      var fecha = $("#date").val();
      var fechaString= fecha.toString();
      $.ajax({
          type: "POST",
          url: "ajax/gastos.php?fecha="+fecha,
          data: parametros,
           beforeSend: function(objeto){
            $('.items_gastos').html('Cargando...');
            },
          success: function(data){
            $(".items_gastos").html(data).fadeIn('slow');           
            $("#update_gastos").modal('hide');
            changeDate(fechaString);
          }
      });
      event.preventDefault();
    })

  function eliminar_gasto(id){
      var fecha = $("#date").val();
      var fechaString= fecha.toString();
      var parametros={"action":"ajax","id":id,"fecha":fecha};
      $.ajax({
        url:'ajax/gastos.php',
        data: parametros,
         beforeSend: function(objeto){
         $('.items_gastos').html('Cargando...');
        },
        success:function(data){
          $(".items_gastos").html(data).fadeIn('slow');
          changeDate(fechaString);  
      }
      })
    
    }
    $(document).ready(function() {
        $('#guardar').click(function() {
            // Recargo la página
            location.reload();
        });
    });

    $(document).ready(function() {
        $('#eliminar').click(function() {
            // Recargo la página
            location.reload();
        });
    });
    $(document).ready(function() {
        $('#insertar').click(function() {
            // Recargo la página
            location.reload();
        });
    });

  
 </script>
</script>
