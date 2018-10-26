<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SAAD</title>

  <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"/>


  <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet"/>


  <link href="assets/demo/demo2/base/style.bundle.css" rel="stylesheet"/>


  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

  <script src="assets/fonte.js"></script>


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
<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default">
  <div class="m-grid m-grid--hor m-grid--root m-page">
    
    <header id="m_header" class="m-grid__item m-header " minimize="minimize" minimize-offset="200" minimize-mobile-offset="200">
      <div class="m-header__top">
          <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
              <div class="m-stack m-stack--ver m-stack--desktop">
                  <!-- begin::Brand -->
                  <div class="m-stack__item m-brand">
                      <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                          <div class="m-stack__item m-stack__item--middle m-brand__logo">
                              <a href="index.html" class="m-brand__logo-wrapper">
                                  <img src="assets/logo.png" height="60px">
                              </a>
                          </div>
                      </div>
                  </div>
                  <!-- end::Brand -->
                  <!-- begin::Topbar -->
                  <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                      <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                          <div class="m-stack__item m-topbar__nav-wrapper">
                              <ul class="m-topbar__nav m-nav m-nav--inline">
                                  <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                      <a href="#" class="m-nav__link m-dropdown__toggle">
                                          <span class="m-topbar__userpic m--hide">
                                              <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt="">
                                          </span>
                                          <span class="m-topbar__welcome">
                                          
                                          </span>
                                          <span class="m-topbar__username">
  
                                          </span>
                                      </a>
                                      <div class="m-dropdown__wrapper">
                                          <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                          <div class="m-dropdown__inner">
                                              <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                  <div class="m-card-user m-card-user--skin-dark">
                                                      <div class="m-card-user__pic">
                                                          <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt="">
                                                      </div>
                                                      <div class="m-card-user__details">
                                                          <span class="m-card-user__name m--font-weight-500">
                                                              Dimas Timmers
                                                          </span>
                                                          <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                              dimas@timmers.com.br
                                                          </a>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="m-dropdown__body">
                                                  <div class="m-dropdown__content">
                                                      <ul class="m-nav m-nav--skin-light">
                                                          <li class="m-nav__item">
                                                              <a href="#" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                  Logout
                                                              </a>
                                                          </li>
                                                      </ul>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- end::Topbar -->
              </div>
          </div>
      </div>
    </header>
    
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
      <main role="main" class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-portlet m-portlet--full-height">
          
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
            <div class="col-12 table-responsive"><h3 id="companyData"></h3></div>
            <table id="resultTable" class="table">
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
        </div>
      </main>
    </div>
  </div>

  <script src="assets/vendors/base/vendors.bundle.js"></script>

  <script src="assets/demo/demo2/base/scripts.bundle.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

  <script src="assets/app/js/dashboard.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <script>
    var customUrl = new URL(location.href);
    var searchParams = new URLSearchParams(customUrl.search);
    var cnpj = searchParams.get('cnpj');
    var empresa = searchParams.get('empresa');
    var uf = null;

    $('#companyData').html(`${empresa} - ${cnpj}`);

    // cnpj = cnpj.replace(/\./g, '');
    // cnpj = cnpj.replace(/-/g, '');
    // cnpj = cnpj.replace(/\//g, '');

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
        urls.push({url: 'https://40.76.88.50:5015/cartao_cnpj?cnpj='+cnpj+'&tipo=cartao', name: 'CARTÃO CNPJ', id: 'cartao_cnpj', uf: []});
        urls.push({url: 'https://40.76.88.50:5015/cartao_cnpj?cnpj='+cnpj+'&tipo=qsa', name: 'CONSULTA QSA / CAPITAL SOCIAL', id: 'qsa', uf: []});
        urls.push({url: 'https://40.76.88.50:5015/tst?documento='+cnpj, name: 'TRIBUNAL SUPERIOR DO TRABALHO', id: 'tst', uf: []});
        urls.push({url: 'https://40.76.88.50:5015/cnd_federal?cnpj='+cnpj, name: 'CND FEDERAL', id: 'cnd_federal', uf: []});
        urls.push({url: 'https://40.76.88.50:5015/juceb?cnpj='+cnpj, name: 'JUCEB', id: 'juceb', uf: ['BA']});
        
        urls.push({url: 'https://40.76.88.50:5015/lista_dev?documento='+cnpj, name: 'PROCURADORIA-GERAL DA FAZENDA NACIONAL', id: 'lista_dev', uf: []});
        urls.push({url: 'https://40.76.88.50:5015/simples_nacional?documento='+cnpj, name: 'SIMPLES NACIONAL', id: 'simples_nacional', uf: []});
        urls.push({url: 'https://40.76.88.50:5015/fdc_contrib?documento='+cnpj+'&tipo=cnpj', name: 'FICHA DE DADOS CADASTRAIS', id: 'fdc_contrib', uf: []});
        urls.push({url: 'https://40.76.88.50:5015/divida_ativa?documento='+cnpj+'&tipo=2', name: 'DIVIDA ATIVA', id: 'divida_ativa', uf: []});

        //ESPECÍFICAS DO ESTADO DA EMPRESA
        urls.push({url: 'https://40.76.88.50:5015/cnd_municipal_sp?documento='+cnpj+'&certidao=1&tipo=cnpj', name: 'CND MUNICIPAL (CERTIDÃO MOBILIÁRIA)', id: 'cnd_municipal_mob', uf: ['SP']});
        // urls.push({url: 'https://40.76.88.50:002/cnd_municipal_sp?documento='+cnpj+'&certidao=2&tipo=cnpj', name: 'CND MUNICIPAL (CERTIDÃO IPTU)', id: 'cnd_municipal_iptu'});
        urls.push({url: 'https://40.76.88.50:5015/cnd_estadual_sp?documento='+cnpj+'&tipo=cnpj', name: 'CND ESTADUAL SP', id: 'cnd_estadual_sp', uf: ['SP']});
        urls.push({url: 'https://40.76.88.50:5015/sefaz_mt?documento='+cnpj+'&tipo=cnpj&modelo=0', name: 'SEFAZ MT', id: 'sefaz_mt', uf: ['MT']});
        urls.push({url: 'https://40.76.88.50:5015/sefaz_ce?documento='+cnpj+'&tipo=CNPJ', name: 'SEFAZ CE', id: 'sefaz_ce', uf: ['CE']});
        urls.push({url: 'https://40.76.88.50:5015/trt2r_sp?documento='+cnpj+'&tipo=2', name: 'TRIBUNAL REGIONAL DO TRABALHO SP 2ª', id: 'trt2r_sp', uf: ['SP']});
        urls.push({url: 'https://40.76.88.50:5015/sefaz_pr?documento='+cnpj+'&tipo=cnpj', name: 'SEFAZ PR', id: 'sefaz_pr', uf: ['PR']});
        urls.push({url: 'https://40.76.88.50:5015/sefaz_rs?documento='+cnpj+'&tipo=cnpj', name: 'SEFAZ RS', id: 'sefaz_rs', uf: ['RS']});
        urls.push({url: 'https://40.76.88.50:5015/jf_pr?documento='+cnpj+'&tipo=cpfcnpj&local=', name: 'JUSTIÇA FEDERAL PR', id: 'jf_pr', uf: ['PR']});
        urls.push({url: 'https://40.76.88.50:5015/tj_ce?documento='+cnpj+'&tipo=cnpj', name: 'TRIBUNAL DE JUSTIÇA CE', id: 'tj_ce', uf: ['CE']});
        urls.push({url: 'https://40.76.88.50:5015/trt_sc?documento='+cnpj+'&tipo=cnpj', name: 'TRIBUNAL REGIONAL DO TRABALHO SC', id: 'trt_sc', uf: ['SC']});
        urls.push({url: 'https://40.76.88.50:5015/trt15r_sp?documento='+cnpj+'&tipo=D', name: 'TRIBUNAL REGIONAL DO TRABALHO SP 15ª', id: 'trt15r_sp', uf: ['SP']});
        urls.push({url: 'https://40.76.88.50:5015/trt6_pe?documento='+cnpj, name: 'TRIBUNAL REGIONAL DO TRABALHO PE', id: 'trt6_pe', uf: ['PE']});
        urls.push({url: 'https://40.76.88.50:5015/jfrj?certidao='+cnpj+'&requisitante=12070100812', name: 'JUSTIÇA FEDERAL RJ', id: 'jfrj', uf: ['RJ']});
        urls.push({url: 'https://40.76.88.50:5015/trf4?documento='+cnpj+'&nome='+empresa+'&tipo=A', name: 'JUSTIÇA FEDERAL RS/SC', id: 'trf4', uf: ['RS', 'SC']});
        
        //NOVOS
        urls.push({url: 'https://40.76.88.50:5015/tj_rs?empresa='+empresa, name: 'TRIBUNAL DE JUSTIÇA RS', id: 'tj_rs', uf: ['RS']});
        urls.push({url: 'https://40.76.88.50:5015/tj_se?empresa='+empresa+'&documento='+cnpj+'&domicilio=null&natureza_certidao=FC&tipo=cnpj', name: 'TRIBUNAL DE JUSTIÇA SE', id: 'tj_se', uf: ['SE']});
        urls.push({url: 'https://40.76.88.50:5015/trf3_sp?nome='+empresa+'&documento='+cnpj+'&certidao=4&abrangencia=1&tipo=Juridica', name: 'TRIBUNAL REGIONAL FEDERAL SP 3ª', id: 'trf3_sp', uf: ['SP']});
        urls.push({url: 'https://40.76.88.50:5015/tj_sp?nome_razao='+empresa+'&documento='+cnpj+'&modelo=6&tipo=cnpj', name: 'TJ SP - CERTIDÃO DE DISTRIBUIÇÃO DE AÇÕES CRIMINAIS', id: 'tj_sp', uf: ['SP']});
        urls.push({url: 'https://40.76.88.50:5015/tj_sp2?nome_razao='+empresa+'&documento='+cnpj+'&modelo=58&tipo=cnpj', name: 'TJ SP - CERTIDÃO DE FALÊNCIAS, CONCORDATAS', id: 'tj_sp2', uf: ['SP']});
        


        self.disabled = true;

        tbody.empty();

        // tbody.append(`<td colspan="20"><i class="fas fa-spinner fa-3x fa-spin"></i> CARREGANDO...</td>`);

        // setTimeout(() => {
        //   tbody.empty();
        // }, 2000);

        $.each(urls, function(i, e) {
            if(uf) {
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
                            // if(json.status === 'true' || json.status === true) {
                            // alert('sefaz_ce jhow');
                            // }
                            // });
                        } else {
                            let sit = '#sit_'+e.id;
                            let cert = '#cert_'+e.id;
                            $(sit).empty();
                            $(cert).empty();

                            $(sit).html('-');
                            $(cert).html('<span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>');

                            // let row = `
                            // <tr>
                            // <td class="text-center">
                            // ${today}
                            // </td>
                            // <td class="text-center">
                            // ${e.name}
                            // </td>
                            // <td class="text-center">
                            // -
                            // </td>
                            // <td class="text-center">
                            // <span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>
                            // </td>
                            // </tr>
                            // `;

                            // tbody.append(row);
                        }
                    });
                } 
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
                        // if(json.status === 'true' || json.status === true) {
                        // alert('sefaz_ce jhow');
                        // }
                        // });
                    } else {
                        let sit = '#sit_'+e.id;
                        let cert = '#cert_'+e.id;
                        $(sit).empty();
                        $(cert).empty();

                        $(sit).html('-');
                        $(cert).html('<span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>');

                        // let row = `
                        // <tr>
                        // <td class="text-center">
                        // ${today}
                        // </td>
                        // <td class="text-center">
                        // ${e.name}
                        // </td>
                        // <td class="text-center">
                        // -
                        // </td>
                        // <td class="text-center">
                        // <span class="text-danger">CERTIDÃO NÃO ENCONTRADA</span>
                        // </td>
                        // </tr>
                        // `;

                        // tbody.append(row);
                    }
                });
            }
        });
    });

    function getUF(cnpj, callback) {
        let service = 'https://40.76.88.50:5015/supplier_uf?cnpj='+cnpj;
        $.get(service, function(resp) {
            let json = JSON.parse(resp);
            console.log(json);
            if(json.status === 'true' || json.status === true) {
                uf = json.uf;

                $('#btnSearch').trigger('click');
            } else {
                uf = null;
        
                $('#btnSearch').trigger('click');
            }
        });
    } 

      getUF(cnpj);

      // $('#btnSearch').trigger('click');
    });
  </script>
</body>
</html>