
<?php
class ClientesControlador {

    static public function ctrBuscarClientes($termino) {
        return ClientesModelo::mdlBuscarClientes($termino);
    }
}
