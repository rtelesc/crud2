<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Basic CRUD - PHP</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .aff{
          margin-top: 200px;
          margin-left: 700px;
        }
    </style>
  </head>
  <body>  
    <div class="row">
      <div class="col-md-12 aff">
              <form class="form-horizontal" id="loginUsers" action="javascript:void(0)">
                    <div class="form-group">
                          <span for="usuario">Usuario</span>
                          <input  id="usuario" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <span for="senha">Senha</span>
                        <input id="senha" type="password" name="senha">

                    </div>
                    <input type="hidden" name="acao" value="logar">
                    <button class="btn btn-primary logar">Login</button>
              </form>


              <label class="label label-warning resultuser"></label>
      </div>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="serialize.js"></script>
    <script type="text/javascript">
        
        $(document).on('click', '.logar', function() {
          // event.preventDefault();
          /* Act on the event */
      var obj = $("#loginUsers").serializeToJSON(); // convert form

      var jsonString = JSON.stringify(obj);
      $.ajax({
      url: 'src/function.php',
      dataType: 'json',
      type: 'post',
      contentType: 'application/json',
      data: jsonString,
      processData: false,
      success: function(data) {
            
            console.log(data.return);


            if(data.status_code == 'error'){
              alert('ERRO!!!!!!!!!!!!');
            }



                if(data.status_code == 'success'){
                    $(".resultuser").html(data.return);

                    alert(data.status_code);
                }
                
            
            
        }
      }); // end ajax
          
      });

    </script>
  </body>
</html>