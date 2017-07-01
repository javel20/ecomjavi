<?php

namespace Ecomjavi;

class PayPal{

    private $_apiContext;
    private $carro_usuario_compras;
    private $_ClientId = 'Aa9aUcElGCRSSw8iIt8RnaDXGhPatDd_IIKpxpQwTmiqT0WIcECzZMPcZCaZa8qJCCDoan1rY7NwPkXi';
    private $_ClientSecret = 'EN0o-pto15CKPWZTRTrYg2MRhdn_gcSY8fLVi8PLjrgcSnkFWly1spQ_1wjW2ZI6RreQRDL-B8c9-xJj';

    public function __construct($carro_usuario_compras){

        $this->_api_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

        $config = config("paypal_payment");
        $flatConfig = array_dot($config);

        $this->_apiContext->setConfig($flatConfig);

        $this->carro_usuario_compras = $carro_usuario_compras;

    }

}

?>