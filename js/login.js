  $(document).ready(function(e) {
    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

    $('#logar').click(function(e) {
      var email = $('#email_login').val(),
      senha = $('#senha_login').val();

      if(email === "" || senha === "") {
        swal("Atenção!", "Todos os campos devem ser preenchidos!", "info");
      } else {
        if(!validateEmail(email)){
          return swal("Erro!", "Login inválido. Tente Novamente!", "error");
        }
        $.ajax({
          url: 'engine/controllers/login.php',
          data: {
            email : email,
            senha: senha
          },
          success: function(data) {
            obj = JSON.parse(data);
            console.log(data);
            if(obj.res === 'true') {
              if (obj.tipo_usuario == 0) {
                swal("Sucesso", "Login efetuado!", "success", {button : false});
                  setTimeout(function(){
                    window.location = "cliente/";
                  }, 3000);
              } else {
                swal("Sucesso", "Login efetuado!", "success", {button : false});
                  setTimeout(function(){
                    window.location = "funcionario/";
                  }, 3000);
              }
            } else if(obj.res === 'no_user_found') {
              swal("Atenção", "Usuário não encontrado.", "error");
            } else if(obj.res === 'wrong_password') {
              swal("Atenção", "Senha Incorreta.", "error");
            } else {
              swal("Atenção", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.", "error");
            }
          },

          type: 'POST'
        });
      }
    });

    $('#signin').click(function(e){
      e.preventDefault();

      window.location = "cadastro/formulario.php";
    });
  });