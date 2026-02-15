<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" style="cursor: default; pointer-events: none;">
      <img src="vistas/assets/dist/img/logo-celular.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">K-Byte 94</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
                <li class="nav-item">
                <a class="nav-link"
                    style="cursor:pointer"
                    onclick="abrirModulo(this, 'vistas/dashboard.php', 'Tablero')">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>Tablero</p>
                </a>
                </li>

                <li class="nav-item">
                <a class="nav-link"
                    style="cursor:pointer"
                    onclick="abrirModulo(this, 'vistas/servicio_tecnico.php', 'Servicio Técnico')">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>Servicio Técnico</p>
                </a>
                </li>

                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>
                    Caja
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a class="nav-link"
                        style="cursor:pointer"
                        onclick="abrirModulo(this, 'vistas/movimiento_dia.php', 'Nuevo Movimiento')">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>Nuevo movimiento</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link"
                        style="cursor:pointer"
                        onclick="abrirModulo(this, 'vistas/arqueo.php', 'Arqueo de Caja')">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Movimiento del día / Arqueo</p>
                    </a>
                    </li>
                </ul>
                </li>



                <li class="nav-item">
                <a class="nav-link"
                    style="cursor:pointer"
                    onclick="abrirModulo(this, 'vistas/clientes.php', 'Clientes')">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Clientes</p>
                </a>
                </li> 

                <li class="nav-item">
                <a class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                    Análisis
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/reportes_servicio_tecnico.php', 'Reportes Servicio Técnico')">
                            <i class="nav-icon fas fa-wrench"></i>
                            <p>Servicio Técnico</p>
                        </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/reportes_caja.php', 'Reportes Caja')">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>Caja</p>
                        </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/reportes_clientes.php', 'Reportes de Clientes')">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Clientes</p>
                        </a>
                        </li>
                    </ul>

                    <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                        Parámetros
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/tecnicos.php', 'Técnicos')">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Técnicos</p>
                        </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/marcas.php', 'Marcas')">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Marcas</p>
                        </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/modelos.php', 'Modelos')">
                            <i class="nav-icon fas fas fa-cubes"></i>
                            <p>Modelos</p>
                        </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/Localidades.php', 'Localidades')">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>Localidades</p>
                        </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/formas_pago.php', 'Formas de Pago')">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>Formas de Pago</p>
                        </a>
                        </li>
                        
                        <li class="nav-item">
                        <a class="nav-link"
                            style="cursor:pointer"
                            onclick="abrirModulo(this, 'vistas/datos_empresa.php', 'Datos de la Empresa')">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Datos de la Empresa</p>
                        </a>
                        </li>


                    </ul>

                </li> 
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
<!-- /.sidebar -->
</aside>

