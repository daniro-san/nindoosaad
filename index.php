<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SAAD</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="Site.css">

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
          <div class="col-12"><h3 id="companyData"></h3></div>
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
                <td colspan="20">Buscando UF...</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
  </div>

  <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <script>
    var customUrl = new URL(location.href);
    var searchParams = new URLSearchParams(customUrl.search);
    var cnpj = searchParams.get('cnpj');
    var empresa = searchParams.get('empresa');
    var uf = null;

    $('#companyData').html(`${empresa} - ${cnpj}`);

    cnpj = cnpj.replace(/\./g, '');
    cnpj = cnpj.replace(/-/g, '');
    cnpj = cnpj.replace(/\//g, '');

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

      $.ajaxSetup({ timeout: 600000});

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

        //CERTIDÕES GERAIS
        urls.push({url: 'https://40.76.88.50:5002/cartao_cnpj?cnpj='+cnpj+'&tipo=cartao', name: 'CARTÃO CNPJ', id: 'cartao_cnpj', uf: []});
        urls.push({url: 'https://40.76.88.50:5002/cartao_cnpj?cnpj='+cnpj+'&tipo=qsa', name: 'CONSULTA QSA / CAPITAL SOCIAL', id: 'qsa', uf: []});
        urls.push({url: 'https://40.76.88.50:5002/tst?documento='+cnpj, name: 'TRIBUNAL SUPERIOR DO TRABALHO', id: 'tst', uf: []});
        urls.push({url: 'https://40.76.88.50:5002/cnd_federal?cnpj='+cnpj, name: 'CND FEDERAL', id: 'cnd_federal', uf: []});
        urls.push({url: 'https://40.76.88.50:5002/juceb?cnpj='+cnpj, name: 'JUCEB', id: 'juceb', uf: []});
        
        urls.push({url: 'https://40.76.88.50:5002/lista_dev?documento='+cnpj, name: 'PROCURADORIA-GERAL DA FAZENDA NACIONAL', id: 'lista_dev', uf: []});
        urls.push({url: 'https://40.76.88.50:5002/simples_nacional?documento='+cnpj, name: 'SIMPLES NACIONAL', id: 'simples_nacional', uf: []});
        urls.push({url: 'https://40.76.88.50:5002/fdc_contrib?documento='+cnpj+'&tipo=cnpj', name: 'FICHA DE DADOS CADASTRAIS', id: 'fdc_contrib', uf: []});
        urls.push({url: 'https://40.76.88.50:5002/divida_ativa?documento='+cnpj+'&tipo=2', name: 'DIVIDA ATIVA', id: 'divida_ativa', uf: []});

        //ESPECÍFICAS DO ESTADO DA EMPRESA
        urls.push({url: 'https://40.76.88.50:5002/cnd_municipal_sp?documento='+cnpj+'&certidao=1&tipo=cnpj', name: 'CND MUNICIPAL (CERTIDÃO MOBILIÁRIA)', id: 'cnd_municipal_mob', uf: ['SP']});
        // urls.push({url: 'https://40.76.88.50:5002/cnd_municipal_sp?documento='+cnpj+'&certidao=2&tipo=cnpj', name: 'CND MUNICIPAL (CERTIDÃO IPTU)', id: 'cnd_municipal_iptu'});
        urls.push({url: 'https://40.76.88.50:5002/cnd_estadual_sp?documento='+cnpj+'&tipo=cnpj', name: 'CND ESTADUAL SP', id: 'cnd_estadual_sp', uf: ['SP']});
        urls.push({url: 'https://40.76.88.50:5002/sefaz_mt?documento='+cnpj+'&tipo=cnpj&modelo=0', name: 'SEFAZ MT', id: 'sefaz_mt', uf: ['MT']});
        urls.push({url: 'https://40.76.88.50:5002/sefaz_ce?documento='+cnpj+'&tipo=CNPJ', name: 'SEFAZ CE', id: 'sefaz_ce', uf: ['CE']});
        urls.push({url: 'https://40.76.88.50:5002/trt2r_sp?documento='+cnpj+'&tipo=2', name: 'TRIBUNAL REGIONAL DO TRABALHO SP 2ª', id: 'trt2r_sp', uf: ['SP']});
        urls.push({url: 'https://40.76.88.50:5002/sefaz_pr?documento='+cnpj+'&tipo=cnpj', name: 'SEFAZ PR', id: 'sefaz_pr', uf: ['PR']});
        urls.push({url: 'https://40.76.88.50:5002/sefaz_rs?documento='+cnpj+'&tipo=cnpj', name: 'SEFAZ RS', id: 'sefaz_rs', uf: ['RS']});
        urls.push({url: 'https://40.76.88.50:5002/jf_pr?documento='+cnpj+'&tipo=cpfcnpj&local=', name: 'JUSTIÇA FEDERAL PR', id: 'jf_pr', uf: ['PR']});
        urls.push({url: 'https://40.76.88.50:5002/tj_ce?documento='+cnpj+'&tipo=cnpj', name: 'TRIBUNAL DE JUSTIÇA CE', id: 'tj_ce', uf: ['CE']});
        urls.push({url: 'https://40.76.88.50:5002/trt_sc?documento='+cnpj+'&tipo=cnpj', name: 'TRIBUNAL REGIONAL DO TRABALHO SC', id: 'trt_sc', uf: ['SC']});
        urls.push({url: 'https://40.76.88.50:5002/trt15r_sp?documento='+cnpj+'&tipo=D', name: 'TRIBUNAL REGIONAL DO TRABALHO SP 15ª', id: 'trt15r_sp', uf: ['SP']});
        urls.push({url: 'https://40.76.88.50:5002/trt6_pe?documento='+cnpj, name: 'TRIBUNAL REGIONAL DO TRABALHO PE', id: 'trt6_pe', uf: ['PE']});
        urls.push({url: 'https://40.76.88.50:5002/jfrj?certidao='+cnpj+'&requisitante=12070100812', name: 'JUSTIÇA FEDERAL RJ', id: 'jfrj', uf: ['RJ']});
        urls.push({url: 'https://40.76.88.50:5002/trf4?documento='+cnpj+'&nome='+empresa+'&tipo=A', name: 'JUSTIÇA FEDERAL RS/SC', id: 'trf4', uf: ['RS', 'SC']});

        
        self.disabled = true;

        tbody.empty();

        // tbody.append(`<td colspan="20"><i class="fas fa-spinner fa-3x fa-spin"></i> CARREGANDO...</td>`);

        // setTimeout(() => {
        //   tbody.empty();
        // }, 2000);

        $.each(urls, function(i, e) {
          if((e.uf.length > 0 && e.uf.includes(uf)) || e.uf.length === 0) {
            let row = `
              <tr>
                <td class="text-center">
                  ${today}
                </td>
                <td class="text-center">
                  ${e.name}
                </td>
                <td class="text-center">
                  <span id="sit_${e.id}"><i class="fas fa-spinner fa-3x fa-spin"></i></span>
                </td>
                <td class="text-center">
                  <span id="cert_${e.id}"><i class="fas fa-spinner fa-3x fa-spin"></i></span>
                </td>
              </tr>
            `;
                  // ${(json.data.situacao ? json.data.situacao : '-')}
                  // ${(json.data.certidao ? '<a href="'+json.data.certidao+'" download class="btn btn-primary" target="_blank">BAIXAR CERTIDÃO</a>' : '<span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>')}
            tbody.append(row);
  
            $.get(e.url, function(resp) {
              let json = JSON.parse(resp);
              if(json.status === 'true' || json.status === true) {
                let sit = '#sit_'+e.id;
                let cert = '#cert_'+e.id;
                $(sit).empty();
                $(cert).empty();
  
                $(sit).html((json.data.situacao ? json.data.situacao : '-'));
                $(cert).html((json.data.certidao ? '<a href="'+json.data.certidao+'" download class="btn btn-primary" target="_blank">BAIXAR CERTIDÃO</a>' : '<span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>'));
  
                // $.get('https://40.76.88.50:5002/sefaz_ce?documento='+cnpj+'&tipo=CNPJ', function(resp) {
                //   if(json.status === 'true' || json.status === true) {
                //     alert('sefaz_ce jhow');
                //   }
                // });
              } else {
                let sit = '#sit_'+e.id;
                let cert = '#cert_'+e.id;
                $(sit).empty();
                $(cert).empty();
  
                $(sit).html('-');
                $(cert).html('<span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>');
                
                // let row = `
                //   <tr>
                //     <td class="text-center">
                //       ${today}
                //     </td>
                //     <td class="text-center">
                //       ${e.name}
                //     </td>
                //     <td class="text-center">
                //       -
                //     </td>
                //     <td class="text-center">
                //       <span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>
                //     </td>
                //   </tr>
                // `;
  
                // tbody.append(row);
              }
            });
          }
        });
        
        self.disabled = false;
        $('#cnpj').attr('disabled', false);
        $('#cnpj').attr('readonly', false);
      });

      function getUF(cnpj, callback) {
        let service = 'https://40.76.88.50:5002/supplier_uf?cnpj='+cnpj;
        $.get(service, function(resp) {
          let json = JSON.parse(resp);
          if(json.status === 'true' || json.status === true) {
            uf = json.uf;

            $('#btnSearch').trigger('click');
          } else {
            uf = null;
          }

        });
      }

      getUF(cnpj);

      // $('#btnSearch').trigger('click');
    });
  </script>
</body>
</html>