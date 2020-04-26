 <body onload="initialize()">
 <section class="menu1" id="menu-34" data-rv-view="317">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container-fluid">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="<?=base_url()?>" class="navbar-logo"><img src="<?=base_url()?>src/eco/assets/images/logoplados-317x79.png" alt="Mobirise"></a>
                        
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <span class="hamburger-icon"></span>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item"><a class="nav-link link" href="<?=base_url()?>index.php?/plados/italiano">DISEÑO ITALIANO</a></li>
                       <!-- <li class="nav-item dropdown">
                            <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="page1.html" aria-expanded="false">TARJAS</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="page1.html">Tecnología</a>
                                <a class="dropdown-item" href="page5.html">Lux</a>
                                <a class="dropdown-item" href="page3.html">Elegance</a>
                                <a class="dropdown-item" href="page6.html">One<br></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown open">
                            <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="" aria-expanded="true">MEZCLADORAS</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="page4.html">¿Cómo funcionan?</a>
                                <a class="dropdown-item" href="page7.html">Modelos</a>
                                <a class="dropdown-item" href="https://mobirise.com/"></a>
                            </div>
                        </li>-->
                        <li class="nav-item nav-btn"><a class="nav-link btn btn-primary-outline btn-primary" href="<?=base_url()?>index.php?/plados/compras">COMPRAR</a></li>
                        <li class="nav-item nav-btn"><a class="nav-link btn btn-primary-outline btn-primary" href="<?=base_url()?>index.php?/plados/carrito">
                            <?if (isset($_SESSION['cart'])) {
                               echo  count($_SESSION['cart']);
                            }?><i class="fa fa-shopping-cart"></i></a></li>
                        
                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <span class="close-icon"></span>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>