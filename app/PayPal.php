<?php

namespace Ecomjavi;

class PayPal{

    private $_apiContext;
    private $carro_usuario_compra;
    private $_ClientId = 'Aa9aUcElGCRSSw8iIt8RnaDXGhPatDd_IIKpxpQwTmiqT0WIcECzZMPcZCaZa8qJCCDoan1rY7NwPkXi';
    private $_ClientSecret = 'EN0o-pto15CKPWZTRTrYg2MRhdn_gcSY8fLVi8PLjrgcSnkFWly1spQ_1wjW2ZI6RreQRDL-B8c9-xJj';

    public function __construct($carro_usuario_compra){

        $this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

        $config = config("paypal_payment");
        $flatConfig = array_dot($config);

        $this->_apiContext->setConfig($flatConfig);

        $this->carro_usuario_compra = $carro_usuario_compra;

    }

    public function generate(){

        $payment = \PaypalPayment::payment()->setIntent("sale")
                                            ->setPayer($this->payer())
                                            ->setTransactions([$this->transaction()])
                                            ->setRedirectUrls($this->redirectUrls());

        try{

            $payment->create($this->_apiContext);
        }catch(\Exception $ex){
            dd($ex);
            exit(1);
        }

        return $payment;

    }

    public function payer(){

        return \PaypalPayment::payer()
                                ->setPaymentMethod("paypal");

    }

    public function redirectUrls(){

        $baseURL = url('/');
        return \PaypalPayment::redirectUrls()
                                ->setReturnUrl("$baseURL/payments/store")
                                ->setCancelUrl("$baseURL/carrito");

    }

    public function transaction(){

        return \PaypalPayment::transaction()
                                ->setAmount($this->amount())
                                ->setItemList($this->items())
                                ->setDescription("Compra en systemsje")
                                ->setInvoiceNumber(uniqid());


    }

    public function items(){

        $items = [];
        $productos = $this->carro_usuario_compra->productos()->get();

        foreach ($productos as $producto){

            array_push($items, $producto->paypalItem());

        }

        return \PaypalPayment::itemList()->setItems($items);

    }

    public function amount(){

        return \PaypalPayment::amount()->setCurrency("USD")
                                    ->setTotal($this->carro_usuario_compra->totalUSD());

    }


    public function execute($paymentId, $payerId){

        $payment = \PaypalPayment::getById($paymentId,$this->_apiContext);

        $execution = \PaypalPayment::PaymentExecution()
                                ->setPayerId($payerId);

        return $payment->execute($execution,$this->_apiContext);

    }

    

}

?>