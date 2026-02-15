<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>K-Byte 94 - Sistema de Gestion</title>

  <!-- Logo -->
  <link rel="shortcur icon" href="vistas/assets/dist/img/logo-celular.png" type="image/x-icon">
  
  <!-- ============================================================================================================= -->
  <!-- REQUIRED CSS -->
  <!-- ============================================================================================================= -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vistas/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="vistas/assets/dist/css/toastr.min.css">
  <!-- Bootstrap 5 --> 
  <link href="vistas/assets/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <link href="vistas/assets/dist/css/select.dataTables.min.css" rel="stylesheet">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="vistas/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Jquery CSS -->
  <link rel="stylesheet" href="vistas/assets/plugins/jquery-ui/css/jquery-ui.css">
  <!-- JSTREE CSS -->
  <link rel="stylesheet" href="vistas/assets/dist/css/jstree.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="vistas/assets/dist/css/style_width_responsive.css">
  <!-- Estilos personzalidos -->
  <link rel="stylesheet" href="vistas/assets/dist/css/plantilla.css">
  <!--   ====   ESTILOS PARA USO DE DATATABLES JS  ==== -->
  <link rel="stylesheet" href="vistas/assets/dist/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="vistas/assets/dist/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="vistas/assets/dist/css/buttons.dataTables.min.css">
  <!-- <link rel="stylesheet" href="vistas/assets/dist/css/fixedColumns.dataTables.min.css"> -->
  
  <!-- ============================================================================================================= -->
  <!-- FIN REQUIRED CSS -->
  <!-- ============================================================================================================= -->


  <!-- ============================================================================================================= -->
  <!-- REQUIRED SCRIPTS -->
  <!-- ============================================================================================================= -->
  
  <!-- jQuery -->
  <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
  <!-- Bootstrap 4 -->
  <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/assets/dist/js/adminlte.min.js"></script>
  <!-- ChartJS -->
  <script src="vistas/assets/plugins/chart.js/Chart.min.js"></script>
  <script src="vistas/assets/dist/js/canvasjs.min.js"></script>
  <!-- InputMask -->
  <script src="vistas/assets/plugins/moment/moment.min.js"></script>
  <!-- <script src="vistas/assets/plugins/inputmask/jquery.inputmask.min.js"></script> -->
  <!-- SweetAlert2 -->
  <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="vistas/assets/dist/js/toastr.min.js"></script>
  <!-- jquery UI -->
  <script src="vistas/assets/plugins/jquery-ui/js/jquery-ui.js"></script> 
 <!-- JS Bootstrap 5 -->
 <!--<script src="vistas/assets/dist/js/bootstrap.bundle.min.js"></script>
 <!-- JSTREE JS -->
 <script src="vistas/assets/dist/js/jstree.min.js"></script>
 <!-- date-range-picker -->
 <script src="vistas/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- ===== LIBRERIAS PARA USO DE DATATABLES JS  ==========-->
  <script src="vistas/assets/dist/js/jquery.dataTables.min.js"></script>
  <script src="vistas/assets/dist/js/dataTables.responsive.min.js"></script>
  <script src="vistas/assets/dist/js/jquery.tabledit.min.js"></script>
  <!-- <script src="vistas/assets/dist/js/dataTables.fixedColumns.min.js"></script> -->
  <!-- =========  LIBRERIAS PARA EXPORTAR A ARCHIVOS =============-->
  <script src="vistas/assets/dist/js/dataTables.buttons.min.js"></script>
  <script src="vistas/assets/dist/js/jszip.min.js"></script>
  <script src="vistas/assets/dist/js/buttons.html5.min.js"></script>
  <script src="vistas/assets/dist/js/buttons.print.min.js"></script>

  <!-- Se crean propio y fuera de las carpetas de Bootstrap, AdminLTE, etc. para prevenir que si se actualiza siga funcionando, tambien esta al final xq predominan las ultimas cargadas -->

  <!-- CSS propio -->
  <link rel="stylesheet" href="vistas/assets/css/custom.css">
  <!-- JS propio -->
  <!-- <script src="vistas/assets/js/servicio_tecnico.js"></script> -->


</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php
      include "modulos/navbar.php";
      include "modulos/aside.php";
    
    ?>

    

    <!-- Content Wrapper. Contenio de la pagina principal -->
    <div class="content-wrapper position-relative">

      <!-- Modulo inicio (isologo) -->
      <div id="estado-inicial" class="estado-inicial">
        <img
          src="vistas/assets/dist/img/isologo.png"
          alt="K-Byte 94"
          class="img-fluid isologo-home">
      </div>

      <!-- Contenedor de módulos -->
      <div id="contenedor-modulos" class="contenedor-modulos"></div>

    </div>

    <!-- /.content-wrapper -->



    <!-- Footer -->
    <?php
      include "modulos/footer.php";    
      ?>

  
  </div>
<!-- ./wrapper -->

</body>
</html>

<script>
  // VARIABLES
  // usadas para abrirmodulo y cerrarModulo
  let moduloActual = null;
  let modulosAbiertos = {}; 
  // define titulo cuando no hay modulo abierto
  const TITULO_DEFECTO = "Servicio Técnico";


   // eventos para refresh y cerrar de navbar
  function mostrarAccionesModulo() {
    $("#acciones-modulo").fadeIn(150);
  }
  function ocultarAccionesModulo() {
    $("#acciones-modulo").fadeOut(150);
  }

  // evento click cerrer navbar
  $("#btnCerrarModulo").on("click", function (e) {
    e.preventDefault();
    cerrarModuloActual();
  });

  //Evento click refresh navbar
  $("#btnRefreshModulo").on("click", function (e) {
    e.preventDefault();
    refreshModuloActual();
  });

  function cambiarTituloModulo(titulo) {
    $("#tituloModulo").text(titulo);
  }


  //funcion deribada de click menu sidebar
  function abrirModulo(elemento, pagina_php, titulo) {

    console.log("▶ Click en:", pagina_php);
    console.log("   Módulo actual:", moduloActual);
    console.log("   Módulos abiertos:", modulosAbiertos);

    const idModulo = pagina_php.replace(/[^\w]/g, "_");

    // 1️⃣ ocultar TODOS los módulos existentes
    $(".modulo").hide();

    let $modulo = $("#" + idModulo);

    // 2️⃣ si NO existe, se crea y se carga + titulo
    if ($modulo.length === 0) {

      console.log("➕ Creando módulo:", pagina_php);

      $modulo = $(`<div id="${idModulo}" class="modulo" data-titulo="${titulo}"></div>`);
      $("#contenedor-modulos").append($modulo);

      $modulo.load(pagina_php, function () {
        console.log("✅ Módulo cargado:", pagina_php);
      });

      modulosAbiertos[pagina_php] = true;
    } else {
      console.log("🔁 Módulo ya existente, se reutiliza:", pagina_php);
    }

    //oculta logo base content-wrapper
    $("#estado-inicial").hide();

    // 3️⃣ mostrar SIEMPRE el módulo elegido
    $modulo.show();
    


    // 4️⃣ navbar
    cambiarTituloModulo(titulo);

    // 5️⃣ sidebar (marcado visual correcto)
    // quitar SOLO el activo anterior
    $(".nav-link.modulo-activo").removeClass("modulo-activo");

    // marcar este módulo como abierto + activo
    $(elemento)
      .addClass("modulo-abierto")
      .addClass("modulo-activo");

    // si pertenece a submenú
    const treeview = $(elemento).closest(".nav-treeview");
    if (treeview.length) {

      const parentItem = treeview.closest(".nav-item");

      // abrir árbol
      parentItem.addClass("menu-open");

      // marcar padre como abierto
      parentItem
        .children(".nav-link")
        .addClass("modulo-abierto");

      // marcar ESTE submenú como abierto permanente
      treeview
        .find(".nav-link")
        .each(function () {
          if (this === elemento) {
            $(this).addClass("modulo-abierto");
          }
        });
    }
    moduloActual = pagina_php;

    mostrarAccionesModulo();

   

  }

  //funcion deribada de click cerrar navbar
  function cerrarModuloActual() {

    if (!moduloActual) {
      console.log("⚠️ No hay módulo activo para cerrar");
      return;
    }

    console.log("❌ Cerrando módulo:", moduloActual);

    const idModulo = moduloActual.replace(/[^\w]/g, "_");

    // 1️⃣ eliminar del DOM
    $("#" + idModulo).remove();

    // 2️⃣ eliminar del registro
    delete modulosAbiertos[moduloActual];

    // 3️⃣ apagar sidebar asociado
    $(".nav-link").each(function () {
      const onclick = $(this).attr("onclick") || "";
      if (onclick.includes(moduloActual)) {
        $(this)
          .removeClass("modulo-activo")
          .removeClass("modulo-abierto");

        // si es submenú, verificar si el padre queda vacío
        const treeview = $(this).closest(".nav-treeview");
        if (treeview.length) {
          const parentItem = treeview.closest(".nav-item");

          const quedanAbiertos = treeview
            .find(".nav-link.modulo-abierto")
            .length;

          if (!quedanAbiertos) {
            parentItem.removeClass("menu-open");
            parentItem.children(".nav-link").removeClass("modulo-abierto");
          }
        }
      }
    });

    // 4️⃣ limpiar estado actual
    moduloActual = null;
    cambiarTituloModulo("");

    // 5️⃣ mostrar otro módulo si queda alguno abierto
    const restantes = Object.keys(modulosAbiertos);

    if (restantes.length > 0) {
      const siguiente = restantes[restantes.length - 1];
      const idSig = siguiente.replace(/[^\w]/g, "_");

      const $moduloSig = $("#" + idSig);

      $moduloSig.show();
      moduloActual = siguiente;

      // ✅ tomar el título DESDE el módulo
      const tituloModulo = $moduloSig.data("titulo") || "";
      cambiarTituloModulo(tituloModulo);

      console.log("➡️ Mostrando módulo restante:", siguiente);
    } else {
      console.log("📭 No quedan módulos abiertos");

      ocultarAccionesModulo();
      cambiarTituloModulo("");

      toastr.info(
        "Se cerraron todos los módulos abiertos",
        "Sistema",
        {
          timeOut: 2500,
          progressBar: true,
          positionClass: "toast-bottom-right"
        }
      );
    
      // muestra logo base content-wrapper
      if (Object.keys(modulosAbiertos).length === 0) {
        $("#estado-inicial").show();
        cambiarTituloModulo(TITULO_DEFECTO);
      }

    
    }
  }

  // funcion deribada de click refresh navbar (no cierra y abre, carga load nuevamente, evita tocar navbar aside <div>)
  function refreshModuloActual() {

    if (!moduloActual) {
      console.warn("🔄 No hay módulo activo para refrescar");
      return;
    }

    const idModulo = moduloActual.replace(/[^\w]/g, "_");
    const $modulo = $("#" + idModulo);

    if (!$modulo.length) {
      console.error("❌ Módulo no encontrado en DOM:", idModulo);
      return;
    }

    console.log("🔄 Refrescando módulo:", moduloActual);

    // feedback visual opcional
    $modulo.fadeTo(150, 0.5);

    //LOAD
    $modulo.load(moduloActual, function () {
      console.log("✅ Módulo refrescado:", moduloActual);
      $modulo.fadeTo(150, 1);

      toastr.success(
        "Módulo actualizado correctamente",
        "Refrescar",
        {
          timeOut: 2000,
          progressBar: true,
          positionClass: "toast-bottom-right"
        }
      );
    });
  }








  /*
  function aaaabrirModulo(elemento, pagina_php, titulo) {

  console.log("▶ Click:", pagina_php);
  console.log("   Actual:", moduloActual);
  console.log("   Abiertos:", modulosAbiertos);

  // ocultar todos los módulos
  $(".modulo").hide();

  // 👉 SI YA EXISTE → solo mostrar
  if (modulosAbiertos[pagina_php]) {
    console.log("👁 Mostrar módulo existente:", pagina_php);

    $(`.modulo[data-modulo="${pagina_php}"]`).show();
    cambiarTituloModulo(titulo);
    moduloActual = pagina_php;
    return;
  }

  // 👉 SI NO EXISTE → crear y cargar
  console.log("➕ Crear módulo:", pagina_php);

  const contenedor = $(`
    <div class="modulo" data-modulo="${pagina_php}"></div>
  `);

  $("#contenedor-modulos").append(contenedor);

  contenedor.load(pagina_php, function () {
    console.log("✅ Módulo cargado:", pagina_php);
  });

  cambiarTituloModulo(titulo);

  modulosAbiertos[pagina_php] = true;
  moduloActual = pagina_php;

  // ====== MANEJO VISUAL ======


    $(elemento).addClass("active");

    const treeview = $(elemento).closest(".nav-treeview");

    if (treeview.length) {
      const parentItem = treeview.closest(".nav-item");
      parentItem.addClass("menu-open");
      parentItem.children(".nav-link").addClass("active");
    }
  }

  function aaabrirModulo(elemento, pagina_php, titulo, contenedor = "content-wrapper") {

    console.log("▶ Click en:", pagina_php);
    console.log("   Módulo actual(anterior):", moduloActual);
    console.log("   Módulos abiertos:", modulosAbiertos);

    // 🔒 evitar recargar si ya fue abierto
    if (modulosAbiertos[pagina_php]) {
      console.log("⛔ Ya estaba abierto, no se recarga:", pagina_php);

      // PERO se vuelve a marcar visualmente
     
      $(elemento).addClass("active");

      const treeview = $(elemento).closest(".nav-treeview");
      if (treeview.length) {
        const parentItem = treeview.closest(".nav-item");
        parentItem.addClass("menu-open");
        parentItem.children(".nav-link").addClass("active");
      }

      moduloActual = pagina_php;
      return;
    }

    // ✅ cargar contenido
    $("." + contenedor).load(pagina_php, function () {
      console.log("✅ Módulo cargado:", pagina_php);
    });

    cambiarTituloModulo(titulo);

    moduloActual = pagina_php;
    modulosAbiertos[pagina_php] = true; // 👈 se guarda SOLO una vez

    // ====== MANEJO VISUAL ======


    $(elemento).addClass("active");

    const treeview = $(elemento).closest(".nav-treeview");

    if (treeview.length) {
      const parentItem = treeview.closest(".nav-item");
      parentItem.addClass("menu-open");
      parentItem.children(".nav-link").addClass("active");
    }
  
  }

  function aabrirModulo(elemento, pagina_php, titulo, contenedor = "content-wrapper") {

    console.log("▶ Click en:", pagina_php);
    console.log("   Módulo actual(anterior):", moduloActual);
    console.log("   Módulos abiertos:", modulosAbiertos);

    $(".modulo").hide();

    // 🔒 evitar recargar si ya fue abierto
    if (modulosAbiertos[pagina_php]) {
      console.log("⛔ Ya estaba abierto, no se recarga:", pagina_php);

      // PERO se vuelve a marcar visualmente
     
      $(elemento).addClass("active");

      const treeview = $(elemento).closest(".nav-treeview");
      if (treeview.length) {
        const parentItem = treeview.closest(".nav-item");
        parentItem.addClass("menu-open");
        parentItem.children(".nav-link").addClass("active");
      }

      moduloActual = pagina_php;
      return;
    }

    // ✅ cargar contenido
    const idModulo = pagina_php.replace(/[^\w]/g, "_");

let $modulo = $("#" + idModulo);

if ($modulo.length === 0) {
  $modulo = $(`<div id="${idModulo}" class="modulo"></div>`);
  $("#contenedor-modulos").append($modulo);

  $modulo.load(pagina_php, function () {
    console.log("✅ Módulo cargado:", pagina_php);
  });
}


    cambiarTituloModulo(titulo);

    moduloActual = pagina_php;
    modulosAbiertos[pagina_php] = true; // 👈 se guarda SOLO una vez

    // ====== MANEJO VISUAL ======


    $(elemento).addClass("active");

    const treeview = $(elemento).closest(".nav-treeview");

    if (treeview.length) {
      const parentItem = treeview.closest(".nav-item");
      parentItem.addClass("menu-open");
      parentItem.children(".nav-link").addClass("active");
    }
  
  }


/*
  function abrirModulo(elemento, pagina_php, titulo, contenedor = "content-wrapper") {

    // evitar recarga del mismo módulo
    if (moduloActual === pagina_php) {
      console.log("Módulo ya abierto:", pagina_php);
      return;
    }

    // cargar contenido
    $("." + contenedor).load(pagina_php, function () {
      console.log("Módulo cargado:", pagina_php);
    });

    // cambiar título navbar
    cambiarTituloModulo(titulo);

    moduloActual = pagina_php;

    // ====== MANEJO VISUAL SIDEBAR ======

    // limpiar estados
    //$(".nav-link").removeClass("active");
    //$(".nav-item").removeClass("menu-open");

    // activar link actual
    $(elemento).addClass("active");

    // si pertenece a un submenú
    const treeview = $(elemento).closest(".nav-treeview");

    if (treeview.length) {
      const parentItem = treeview.closest(".nav-item");
      parentItem.addClass("menu-open");
      parentItem.children(".nav-link").addClass("active");
    }
  }
*/

</script>
