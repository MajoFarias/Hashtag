$(document).ready(function() {
	/**
     * Carga de datos dependiendo el formulario
     */
    $('.contacto').click(function(){
      var title = $(this).data('title');
      $('.modal-body').children('h3').html(title); 
      $('#seccion1').attr('value',title);
    });
    /**
     * Envio del formulario
     */
    $('form').submit(function(){
    	/** Creamos el data del formulario a enviar */
        var params = {
                nombre: $("#exampleInputNombre1").val(),
                empresa: $("#exampleInputEmpresa1").val(),
                telefono: $("#teléfono1").val(),
                email: $("#email1").val(),
                seccion:$("#seccion1").val(),
                mensaje:$("#mensaje").val()
            };
        $('form').children('p').children('button').html('Enviando ...');
        /** AJAX */
        $.ajax({
          url: 'phpmailer/send_mail.php',
          type: 'POST',
          data: params,
          success: function (data) {
            if(true == data){
              $('button.close').trigger('click'); $('form').reset();
              alert('Gracias por tu mensaje. En breve nos comunicaremos contigo.');
            }else{
              alert('Todos los campos son obligatorios.');
            }
            $('form').children('p').children('button').html('ENVIAR');
          }  
        });     
    });

});