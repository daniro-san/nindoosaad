<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SAAD</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
    }
  </style>
</head>
<body class="text-center h-100">
  
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <main role="main" class="inner cover container-fluid h-100">
        <div class="row align-items-center justify-content-center h-50">
          <div class="col col-sm-8 col-md-8 col-lg-6 col-xl-4">
            <form action="" id="uploadForm">
              <input type="file" name="pdfUpload" id="pdfUpload" class="form-control">
              <button class="btn btn-primary" id="btnUploadFile"><i class="fa fa-cloud"></i> Enviar</button>
            </form>
          </div>
        </div>
      </main>
  </div>

  <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <script>
    var file;

    $(document).ready(function() {
      var today = new Date();
      var dd = today.getDate();

      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear();
      if(dd<10) 
      {
          dd='0'+dd;
      } 

      if(mm<10) 
      {
          mm='0'+mm;
      }

      today = dd+'/'+mm+'/'+yyyy;

      $.ajaxSetup({ timeout: 300000});

      $( "#uploadFile" ).on( "change", function ( ) {
        var val = $( this ).val( ).split( "\\" )[2] ;
        var self = this;

        // $( "input[name='pdfUpload']" ).val( val );
        
        if ( ( this.files && this.files[0] ) ) {
          var reader = new FileReader( );
          reader.readAsDataURL( this.files[0] );

          reader.onload = function (e) {
            file = e.target.result;
            console.log('reader result: ' + reader.result);
          }
        } else {
          alert('erro ao anexar.');
        }

        var fileData = $('#pdfUpload').files[0];
        getBase64(fileData);
        console.log('filedata: ' + fileData);
        console.log('filedata base64: ' + getBase64(fileData));
      });

      $('#btnUploadFile').on('click', function(e) {
        e.preventDefault();

        console.log('FILE VAR: ' + file);
        
        var formFileUpload = new FormData( );
        // formFileUpload.append( "file", file );
        formFileUpload.append( "teste", 'anus' );

        var request = new XMLHttpRequest( );
        request.onreadystatechange = function( ) {
          if ( request.readyState == 4 ) {
            try {
              var resp = JSON.parse( request.response );
            } catch ( e ) {
              var resp = {
                status: "error",
                data: "Erro desconhecido: [" + request.responseText + "]"
              };
            }

            if ( resp.status !== 0 ) {
              alert('erro ao enviar');
            } else {
              alert('arquivo enviado com sucesso');
            }
          }
        };

        request.open( "POST", "https://40.76.88.50:5002/planilha_folha_pag" );
        request.send( formFileUpload );
        
      });
    });
  </script>
</body>
</html>