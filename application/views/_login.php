
<body class="hold-transition loading-page">

<div class="cover"></div>
    <div class="ibox login-content">
        <div class="text-center">
        <? if($this->uri->segment(3) == "e")
                    {?>
                     <div class="alert alert-danger alert-dismissible">
                     <h4><i class="icon fa fa-remove"></i> ¡Atención!</h4>
                        ¡El Usuario o la contraseña son Incorrectos!
                     </div>
                     <?}?>
        </div>
        <form class="ibox-body" action="<?php echo base_url();?>index.php?/acceso/login" method="post">
            <h4 class="font-strong text-center mb-5">INGRESAR | ADMIN</h4>
            <div class="form-group mb-4">
                <input class="form-control form-control-line" type="text" name="user" placeholder="Usuaio">
            </div>
            <div class="form-group mb-4">
                <input class="form-control form-control-line" type="password" name="password" placeholder="contraseña">
            </div>
            <!--<div class="flexbox mb-5">
                <span>
                    <label class="ui-switch switch-icon mr-2 mb-0">
                        <input type="checkbox" checked="">
                        <span></span>
                    </label>Remember</span>
                <a class="text-primary" href="forgot_password.html">Forgot password?</a>
            </div>-->
            <div class="text-center mb-4">
                <button class="btn btn-primary btn-rounded btn-block">LOGIN</button>
            </div>
        </form>
    </div>

    </body>


</html>