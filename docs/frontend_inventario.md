Prompt:

🔎 AUDITORÍA DE PREFIJOS — SOLO LISTAR (NO MODIFICAR)

Analizá el siguiente código y devolveme únicamente listados.

Objetivo

Detectar elementos que deben tener prefijo único por módulo para evitar conflictos cuando múltiples módulos conviven en el DOM.

Listar:
1️⃣ IDs de HTML

Todos los id=""

2️⃣ Clases usadas como selectores JS

Solo clases usadas en jQuery o JS ($(".clase"), document.querySelector, etc.)

3️⃣ Nombres de funciones JS

Declaradas con function nombre()

o const nombre = () =>

4️⃣ Variables globales

Variables fuera de funciones (var, let, const)

5️⃣ Eventos registrados

Ejemplos:

$(document).on("click", ".btnEditar")

$("#id").on("keyup", ...)

6️⃣ DataTables

IDs de tablas

Variables que guardan instancias (tablaClientes, etc.)

7️⃣ Endpoints AJAX

URLs usadas (ajax/clientes.ajax.php)

8️⃣ Campos POST / FormData

nombres enviados (datos.append("nombre", ...))

# formas_pago.php
IDs HTML:
- btnNuevoTipoMovi
- tablaTipoMovi
- modalTipoMovi
- formTipoMovi
- idTipoMovi
- descripcionMovi
- errorDescripcionMovi

Clases usadas en JS:
- btnEditarTipoMovi

Funciones:
- listarTipoMovimientos
- cargarTipoMoviParaEditar
- guardarTipoMovi
- limpiarModalTipoMovi
- mostrarErrorTipoMovi
- limpiarErrorTipoMovi

Variables globales:
- (ninguna variable global declarada fuera de funciones)

Eventos:
- click #btnNuevoTipoMovi
- submit #formTipoMovi
- click .btnEditarTipoMovi
- hidden.bs.modal #modalTipoMovi
- input #descripcionMovi
- document.ready

DataTables:
- #tablaTipoMovi (tabla manipulada dinámicamente, no instancia DataTable detectada)
- variable de instancia: ninguna

AJAX endpoints:
- ajax/tipomovimientos.ajax.php

Campos POST:
- accion
- idTipoMovi
- descripcionMovi

# localidades.php
1️⃣ IDs HTML
btnNuevaLocalidad
tablaLocalidades
modalLocalidad
formLocalidad
cpLocalidad
errorCpLocalidad
nombreLocalidad
errorNombreLocalidad
btnGuardarLocalidad

2️⃣ Clases usadas como selectores JS
btnEditarLocalidad

3️⃣ Nombres de funciones JS
listarLocalidades
cargarLocalidadParaEditar
guardarLocalidad
limpiarModalLocalidad
mostrarErrorCP
mostrarErrorLocalidad
limpiarErroresLocalidad

4️⃣ Variables globales
No detectada

5️⃣ Eventos registrados
$(document).ready → listarLocalidades()

$("#btnNuevaLocalidad").on("click")
$("#formLocalidad").on("submit")
$(document).on("click", ".btnEditarLocalidad")
$("#modalLocalidad").on("hidden.bs.modal")
$("#cpLocalidad, #nombreLocalidad").on("input")

6️⃣ DataTables
ID de tabla:
tablaLocalidades

Variables de instancia:
Ninguna detectada

7️⃣ Endpoints AJAX
ajax/localidades.ajax.php

8️⃣ Campos POST / FormData
accion
cp
localidad

# modelos.php
1️⃣ IDs HTML
btnNuevoModelo
filtroMarca
tablaModelos
modalModelo
formModelo
idModelo
nombreModelo
errorModelo
selectMarca
errorMarca
btnGuardarModelo

2️⃣ Clases usadas como selectores JS
btnEditarModelo

3️⃣ Nombres de funciones JS
listarModelosPorMarca
cargarMarcas
guardarModelo
cargarModeloParaEditar
limpiarModalModelo
mostrarErrorModelo
mostrarErrorMarca
limpiarErroresModelo

4️⃣ Variables globales
Ninguna detectada

5️⃣ Eventos registrados
$(document).ready → cargarMarcas()

$("#filtroMarca").on("change")
$("#formModelo").on("submit")
$("#btnNuevoModelo").on("click")
$(document).on("click", ".btnEditarModelo")
$("#modalModelo").on("hidden.bs.modal")
$("#nombreModelo, #selectMarca").on("input change")

6️⃣ DataTables
ID de tabla:
tablaModelos

Variables de instancia:
Ninguna detectada

7️⃣ Endpoints AJAX
ajax/modelos.ajax.php
ajax/marcas.ajax.php

8️⃣ Campos POST / FormData
accion
idMarca
idModelo
modelo


# marcas.php

1️⃣ IDs HTML
btnNuevaMarca
tablaMarcas
modalMarca
formMarca
idMarca
nombreMarca
errorNombreMarca
btnGuardarMarca

2️⃣ Clases usadas como selectores JS
btnEditarMarca

3️⃣ Nombres de funciones JS
listarMarcas
guardarMarca
cargarMarcaParaEditar
limpiarModalMarca
mostrarErrorMarca
limpiarErrorMarca

4️⃣ Variables globales
Ninguna detectada

5️⃣ Eventos registrados
$(document).ready → listarMarcas()

$("#formMarca").on("submit")
$("#btnNuevaMarca").on("click")
$(document).on("click", ".btnEditarMarca")
$("#modalMarca").on("hidden.bs.modal")
$("#nombreMarca").on("input")

6️⃣ DataTables
ID de tabla:
tablaMarcas

Variables de instancia:
Ninguna detectada

7️⃣ Endpoints AJAX
ajax/marcas.ajax.php

8️⃣ Campos POST / FormData
accion
idMarca
marca



1️⃣ IDs HTML


2️⃣ Clases usadas como selectores JS


3️⃣ Nombres de funciones JS


4️⃣ Variables globales


5️⃣ Eventos registrados


6️⃣ DataTables


7️⃣ Endpoints AJAX


8️⃣ Campos POST / FormData
