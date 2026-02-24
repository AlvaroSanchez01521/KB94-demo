<?php
require_once "../modelos/conexion.php";
require_once "../modelos/servicio_tecnico.modelo.php";
require_once "../controladores/servicio_tecnico.controlador.php";

$idOT = isset($_GET["idOT"]) ? $_GET["idOT"] : null;

if(!$idOT){ echo "ID de Orden no especificado."; exit; }

$datos = ServicioTecnicoControlador::ctrObtenerDatosImpresion($idOT);

if(!$datos){ echo "La Orden de Trabajo #$idOT no existe."; exit; }

// Unificamos los teléfonos en una sola variable
$telefonos = $datos['telefono1'];
if(!empty($datos['telefono2'])){
    $telefonos .= " / " . $datos['telefono2'];
}

// Da formato (D/M/Y H:i)
$fechaFormateada = date("d/m/Y", strtotime($datos['fechaIngreso']));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante OT #<?php echo $idOT; ?></title>
    <!-- CSS local -->
    <style>
        @page { size: A4 landscape; margin: 0; }
        body { margin: 0; padding: 0; font-family: 'Arial', sans-serif; color: #000; background-color: #f0f0f0; }
        
        .pagina-a4 { 
            width: 297mm; height: 210mm; padding: 10mm; 
            box-sizing: border-box; display: flex; justify-content: space-between;
            background-color: #fff; margin: auto;
        }

        /* Estilo del talón ajustado para empujar contenido al final */
        .talon {
            width: 48.5%;
            height: 100%;
            border: 1.5px solid #000;
            padding: 6mm;
            box-sizing: border-box;
            display: flex;
            flex-direction: column; /* Organiza los elementos en columna */
            justify-content: flex-start;
        }

        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #000; padding-bottom: 8px; }
        .logo-empresa h1 { margin: 0; font-size: 22pt; letter-spacing: -1px; }
        .logo-empresa p { margin: 0; font-size: 9pt; font-weight: bold; }
        
        .nro-orden { text-align: right; }
        .nro-orden h2 { margin: 0; font-size: 28pt; line-height: 1; }

        .titulo-seccion { 
            background: #333; color: #fff; border: 1px solid #000; 
            font-size: 10pt; font-weight: bold; padding: 3px 10px; 
            margin: 12px 0 8px 0; text-transform: uppercase; 
        }

        .bloque-datos { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
        .label { font-size: 8pt; font-weight: bold; text-transform: uppercase; color: #333; display: block; }
        .valor { font-size: 11pt; border-bottom: 1px solid #aaa; display: block; min-height: 16px; margin-bottom: 5px; }

        /* RECUADRO LOCAL - Ajustado para evitar solapamiento */
        .recuadro-observaciones {
            border: 1.5px solid #000;
            min-height: 100px; /* Alto mínimo para que no se vea vacío */
            height: auto;      /* Permite que crezca si el texto es largo */
            padding: 8px;     /* Más margen lateral */
            font-size: 10pt;
            margin-top: 8px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 0px;         /* Espacio mínimo entre el texto y la fecha */
        }


        .totales-local {
            display: flex; flex-direction: column; gap: 5px;
            border: 1.5px solid #000; margin-top: 10px; padding: 5px 5px;
            font-size: 10pt; font-weight: bold; width: 100%; box-sizing: border-box;
        }

        .totales-cliente {
            display: flex; justify-content: space-around;
            border: 2.5px solid #000; margin-top: 15px; padding: 10px;
            font-size: 13pt; font-weight: bold; background: #f9f9f9;
        }

        /* Contenedor legal y firmas para que siempre toquen el fondo */
        .seccion-final {
            margin-top: auto; /* Esta es la clave: empuja todo lo anterior hacia arriba */
        }

        .legales {
            font-size: 7.2pt; text-align: justify; line-height: 1.1;
            margin-top: 10px; border-top: 1px solid #ccc; padding-top: 5px;
        }

        .contenedor-firmas { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: auto; }
        .bloque-firma {padding: 5px; text-align: center;
            border: none; /* Sin recuadro */
        }
        .linea-firma {
            border-top: 1.5px solid #000;
            margin: 35px auto 5px auto;
            width: 85%;
        }
        .texto-firma { font-size: 8.5pt; font-weight: bold; text-transform: uppercase; }

        .no-print { 
            position: fixed; top: 20px; right: 20px; background: #28a745; 
            color: #fff; padding: 12px 20px; border: none; border-radius: 5px; 
            font-weight: bold; cursor: pointer; z-index: 100;
        }
        @media print { .no-print { display: none; } body { background-color: #fff; } }
    </style>
</head>
<body>

    <button class="no-print" onclick="window.print()">IMPRIMIR COMPROBANTES (A4)</button>

    <div class="pagina-a4">
        
        <!-- COPIA LOCAL -->
        <div class="talon">
            <div class="header">
                <div class="logo-empresa">
                    <h1>K-BYTE 94</h1>
                    <p>Ayala Gauna 7984 Local "C" - Rosario </p>
                    <p>Contacto: 3415972926 - 3417205875 </p>                    
                </div>
                <div class="nro-orden">
                    <small><b>COPIA LOCAL (RECEPCIÓN)</b></small>
                    <h2># <?php echo $idOT; ?></h2>
                </div>
            </div>

            <div class="titulo-seccion">Datos del Cliente</div>
            <div class="bloque-datos">
                <div class="campo" style="grid-column: span 2;"><span class="label">Cliente / DNI:</span><span class="valor"><?php echo $datos['cliente'] . " - " . $datos['dni']; ?></span></div>
                <div class="campo"><span class="label">Fecha Ingreso:</span><span class="valor"><?php echo $fechaFormateada; ?></span></div>
                <div class="campo"><span class="label">Teléfonos:</span><span class="valor"><?php echo $telefonos; ?></span></div>
                <div class="campo" style="grid-column: span 2;"><span class="label">Equipo / Modelo:</span><span class="valor"><?php echo $datos['nombreMarca'] . " " . $datos['nombreModelo']; ?></span></div>
            </div>

            <div class="titulo-seccion">Falla y Observaciones Técnicas</div>
            <span class="label">Falla Reportada:</span>
            <!-- Usamos un div con margen inferior para que no pise el recuadro -->
            <div class="valor" style="border:none; margin-bottom: 5px; min-height: auto;">
                <?php echo $datos['falla']; ?>
            </div>

            <div class="recuadro-observaciones">
                <div style="flex-grow: 1;">
                    <span class="label">Observaciones:</span> 
                    <?php echo $datos['observaciones']; ?>
                </div>
                
                <div style="text-align: right; font-weight: bold; font-size: 8pt; margin-top: 10px;">
                    Fecha Cierre: ____ / ____ / ____
                </div>
            </div>


            

            <div class="seccion-final">
                <div class="totales-local">
                    <span>PRESUPUESTO APROX: $ <?php echo number_format($datos['presupuesto'], 2, ',', '.'); ?></span>
                    <span>SEÑA: $ <?php echo number_format($datos['totalSenia'] ?? 0, 2, ',', '.'); ?></span>
                </div>
                <div class="legales">
                    Por medio de la presente se deja constancia que el establecimiento no es responsable de la procedencia del equipo descripto, siendo el cliente declarado unico responsable de tener la titularidad del mismo. Una vez transcurridos los 90 días de la reparación, se entenderá que el titular renuncia a la misma, dejando el equipo en propiedad de "K-byte94", esta medida se rige segun los Art. N°2526 y N°2526 del codigo Civil Argentino. Los precios pueden ser modificados sin previo aviso. El establecimiento no se hará cargo de accesorios tales como tarjetas sim, memorias sd, cargadores, cables, fundas.
                </div>

                <div class="contenedor-firmas">
                    <!-- Firma Ingreso -->
                    <div class="bloque-firma">
                        <div class="linea-firma"></div>
                        <div class="texto-firma">Conformidad Recepción (Cliente)</div>
                    </div>
                    <!-- Firma Entrega -->
                    <div class="bloque-firma">
                        <div class="linea-firma"></div>
                        <div class="texto-firma">Conformidad Entrega (Cliente)</div>
                        <div class="fecha-firma" style="margin-top: 5px; font-weight: bold; font-size: 8pt;">
                            FECHA ENTREGA: ____ / ____ / ____
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- COPIA CLIENTE -->
        <div class="talon">
            <div class="header">
                <div class="logo-empresa">
                    <h1>K-BYTE 94</h1>
                    <p>Ayala Gauna 7984 Local "C" - Rosario </p>
                    <p>Contacto: 3415972926 - 3417205875 </p>
                    <p>Servicio Técnico especializado en telefonía móvil, PC, notebook, tablet y más.</p>
                </div>
                <div class="nro-orden">
                    <small><b>COMPROBANTE CLIENTE</b></small>
                    <h2># <?php echo $idOT; ?></h2>
                </div>
            </div>

            <div class="titulo-seccion">Datos del Cliente</div>
            <div class="bloque-datos">
                <div class="campo" style="grid-column: span 2;"><span class="label">Cliente / DNI:</span><span class="valor"><?php echo $datos['cliente'] . " - " . $datos['dni']; ?></span></div>
                <div class="campo"><span class="label">Fecha Ingreso:</span><span class="valor"><?php echo $fechaFormateada; ?></span></div>
                <div class="campo"><span class="label">Teléfonos de Contacto:</span><span class="valor"><?php echo $telefonos; ?></span></div>
                <div class="campo" style="grid-column: span 2;"><span class="label">Equipo / Modelo:</span><span class="valor"><?php echo $datos['nombreMarca'] . " " . $datos['nombreModelo']; ?></span></div>
            </div>

            <div class="titulo-seccion">Falla y Observaciones Técnicas</div>
            <div class="campo"><span class="label">Falla Reportada:</span><span class="valor" style="border:none;"><?php echo $datos['falla']; ?></span></div>
            <div class="campo"><span class="label">Observaciones de Recepción:</span><span class="valor" style="border:none; text-align: justify; font-size: 10pt;"><?php echo $datos['observaciones']; ?></span></div>



            <div class="seccion-final">
                <div class="totales-cliente">
                    <span>PRESUPUESTO APROX: $ <?php echo number_format($datos['presupuesto'], 2, ',', '.'); ?></span>
                    <span>SEÑA: $ <?php echo number_format($datos['totalSenia'] ?? 0, 2, ',', '.'); ?></span>
                </div>
                <div class="legales">
                    Por medio de la presente se deja constancia que el establecimiento no es responsable de la procedencia del equipo descripto, siendo el cliente declarado unico responsable de tener la titularidad del mismo. Una vez transcurridos los 90 días de la reparación, se entenderá que el titular renuncia a la misma, dejando el equipo en propiedad de "K-byte94", esta medida se rige segun los Art. N°2526 y N°2526 del codigo Civil Argentino. Los precios pueden ser modificados sin previo aviso. El establecimiento no se hará cargo de accesorios tales como tarjetas sim, memorias sd, cargadores, cables, fundas.
                </div>

                <div class="contenedor-firmas">
                    <!-- Firma Ingreso -->
                    <div class="bloque-firma">
                        <div class="linea-firma"></div>
                        <div class="texto-firma">Sello / Firma Recepción (Local)</div>
                    </div>
                    <!-- Firma Entrega -->
                    <div class="bloque-firma">
                        <div class="linea-firma"></div>
                        <div class="texto-firma">Sello / Firma Entrega (Local)</div>
                        <div class="fecha-firma" style="margin-top: 5px; font-weight: bold; font-size: 8pt;">
                            FECHA ENTREGA: ____ / ____ / ____
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
</html>
