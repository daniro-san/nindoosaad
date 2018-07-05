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
        <div class="row align-items-center justify-content-center h-50 d-none">
          <div class="col col-sm-8 col-md-8 col-lg-6 col-xl-4">
            <form action="">
              <div class="form-group">
                <input class="form-control form-control-lg d-none" placeholder="CNPJ" type="text" name="cnpj" id="cnpj">
              </div>
              <div class="form-group">
                <button class="btn btn-info btn-lg btn-block d-none" id="btnSearch">BUSCAR</button>
              </div>
            </form>
          </div>
        </div>
        <div class="text-center pt-2 mt-2 text-message font-weight-regular">
          <table id="resultTable" class="table table-bordered table-striped">
            <thead class="thead-light">
              <tr>
                <th>Data da consulta</th>
                <th>Tipo de documento</th>
                <th>Situação</th>
                <th>Resultado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="20">Faça a busca para carregar resultados...</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
  </div>

  <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  <script>
    var customUrl = new URL(location.href);
    var searchParams = new URLSearchParams(customUrl.search);
    var cnpj = searchParams.get('cnpj');

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

      $.ajaxSetup({ timeout: 120000});

      $('#btnSearch').on('click', function(e) {
        e.preventDefault();
        let self = this;
        let tableData = [];
        // let cnpj = $('#cnpj').val();
        let table = $('#resultTable');
        let tbody = table.find('tbody');
        $('#cnpj').attr('disabled', true);
        $('#cnpj').attr('readonly', true);

        let urls = [];
        urls.push({url: 'https://13.77.153.203:5002/cartao_cnpj?cnpj='+cnpj, name: 'Cartão CNPJ'});
        // urls.push({url: 'https://13.77.153.203:5002/juceb?cnpj='+cnpj, name: 'JUC;EB'});
        urls.push({url: 'https://13.77.153.203:5002/cnd_federal?cnpj='+cnpj, name: 'CND FEDERAL'});
        // urls.push({url: 'https://13.77.153.203:5002/sefaz_sp?documento='+cnpj+'&tipo=CNPJ', name: 'SEFAZ MA'});
        urls.push({url: 'https://13.77.153.203:5002/cnd_municipal_sp?documento='+cnpj+'&certidao=2', name: 'CND MUNICIPAL'});

        self.disabled = true;

        tbody.empty();

        tbody.append(`<td colspan="20"><i class="fas fa-spinner fa-3x fa-spin"></i> CARREGANDO...</td>`);

        setTimeout(() => {
          tbody.empty();
        }, 2000);

        $.each(urls, function(i, e) {
          $.get(e.url, function(resp) {
            let json = JSON.parse(resp);
            if(json.status === 'true' || json.status === true) {
              let row = `
                <tr>
                  <td class="text-center">
                    ${today}
                  </td>
                  <td class="text-center">
                    ${e.name}
                  </td>
                  <td class="text-center">
                    ${(json.data.situacao ? json.data.situacao : '-')}
                  </td>
                  <td class="text-center">
                    ${(json.data.certidao ? '<a href="'+json.data.certidao+'" download class="btn btn-primary" target="_blank">BAIXAR CERTIDÃO</a>' : '<span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>')}
                  </td>
                </tr>
              `;

              tbody.append(row);
            } else {
              let row = `
                <tr>
                  <td class="text-center">
                    ${today}
                  </td>
                  <td class="text-center">
                    ${e.name}
                  </td>
                  <td class="text-center">
                    -
                  </td>
                  <td class="text-center">
                    <span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>
                  </td>
                </tr>
              `;

              tbody.append(row);
            }
          });
        });
        
        self.disabled = false;
        $('#cnpj').attr('disabled', false);
        $('#cnpj').attr('readonly', false);
      });

      $('#btnSearch').trigger('click');
    });
  </script>
</body>
</html>