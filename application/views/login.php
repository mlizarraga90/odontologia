<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CLINIA MEDÍCA DASELI</title>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/nucleo.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/argon.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
  <style>
    .nav-link{color: white;}
    .copyright{color:white;}
    .logo{width: 100%;}
  </style>
</head>

<body class="bg-default g-sidenav-show g-sidenav-pinned">
  <!-- Main content -->
  <div class="main-content">

    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-5 pt-lg-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">&nbsp;</h1>
              <!--<p class="text-lead text-white">SISTEMA ERP DE VENTAS</p>-->
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="btn-wrapper text-center">
                  <h1 class="text-black">SISTEMA OFTALMÓLOGO</h1>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form" id="frmLogin">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="text" name="usuario">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">&nbsp;
                </div>
                <div class="text-center">
                  <button type="button" class="btn btn-primary my-4" id="btnEntrar">ENTRAR</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            © 2019 <a href="" class="font-weight-bold ml-1" target="_blank">DEPARTAMENTO DE SISTEMAS</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">SITIO WEB</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">FACEBOOK</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">TWITTER</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">REPORTAR ANOMALIAS</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js"  ></script>
<script src="<?php echo base_url();?>assets/js/cryptoJS.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/dinamycForms.js" type="text/javascript" ></script>
</body>
</html>
<script>
  $(document).ready(function(){
    var formulario=frm.setId('frmLogin');
    $("#btnEntrar").click(function(){
        if(formulario.validateFrm([""])==true){
            formulario.send("<?php echo base_url();?>index.php/login/logIn","post",function(response){
            var status=$.parseJSON(response);
            if(status.status==1){
              formulario.clearFrm();
              
            }
            notify(status.title,status.message,status.type);
            setTimeout(function(){
              window.location.href="<?php echo base_url();?>index.php/main";
            },2000);

          })
        }else{
          notify("","FAVOR DE LLENAR LOS CAMPOS VACIOS","warning");
        }
      });
  });
</script>