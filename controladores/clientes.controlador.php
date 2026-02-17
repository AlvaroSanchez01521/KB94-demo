<?php

class ClientesControlador {

    /* =====================================================
       🔹 CÓDIGO VIEJO (aún en uso)
       Buscador rápido de clientes (autocompletes, etc.)
    ===================================================== */
    static public function ctrBuscarClientes($termino) {
        return ClientesModelo::mdlBuscarClientes($termino);
    }


    /* =====================================================
       🔹 LISTAR CLIENTES
       ✔ usado por DataTable
       ✔ devuelve todos los clientes con localidad
    ===================================================== */
    static public function ctrListarClientes() {
        return ClientesModelo::mdlListarClientes();
    }


    /* =====================================================
       🔹 OBTENER CLIENTE POR ID
       ✔ usado para cargar datos en el modal de edición
    ===================================================== */
    static public function ctrObtenerCliente($idCliente) {
        return ClientesModelo::mdlObtenerClientePorId($idCliente);
    }


    /* =====================================================
       🔹 CREAR CLIENTE
       ✔ valida duplicado por nombre
       ✔ retorna: ok | duplicado | error
    ===================================================== */
    static public function ctrCrearCliente($datos) {

        // 🔹 Validar duplicado por nombre
        if (ClientesModelo::mdlExisteCliente($datos["nombre"])) {
            return "duplicado";
        }

        return ClientesModelo::mdlCrearCliente($datos);
    }


    /* =====================================================
       🔹 EDITAR CLIENTE
       ✔ valida duplicado
       ✔ detecta si no hubo cambios
       ✔ retorna: ok | duplicado | sin_cambios | error
    ===================================================== */
    static public function ctrEditarCliente($datos) {

        // 🔹 Obtener cliente actual
        $clienteActual = ClientesModelo::mdlObtenerClientePorId($datos["idCliente"]);

        if (!$clienteActual) {
            return "error";
        }

        // 🔹 Verificar si no hubo cambios
        if (
            $clienteActual["nombre"] == $datos["nombre"] &&
            $clienteActual["dni"] == $datos["dni"] &&
            $clienteActual["telefono1"] == $datos["telefono1"] &&
            $clienteActual["telefono2"] == $datos["telefono2"] &&
            $clienteActual["cp"] == $datos["cp"]
        ) {
            return "sin_cambios";
        }

        // 🔹 Validar duplicado (excluyendo el actual)
        if (ClientesModelo::mdlExisteCliente($datos["nombre"], $datos["idCliente"])) {
            return "duplicado";
        }

        return ClientesModelo::mdlEditarCliente($datos);
    }

}
