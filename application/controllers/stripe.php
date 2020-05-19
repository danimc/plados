<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Stripe extends CI_Controller {
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('eco/stripe/index');
    }
        
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function payment()
    {
      require_once('application/libraries/stripe-php/init.php');
     
      $stripeSecret = 'sk_test_cNEnkPQ796OFqgwfXH2oBUyq00qKunHgZw';
 
      \Stripe\Stripe::setApiKey($stripeSecret);
      
        $stripe = \Stripe\Charge::create ([
                "amount" => $this->input->post('amount'),
                "currency" => "usd",
                "source" => $this->input->post('tokenId'),
                "description" => "Test payment from tutsmake.com."
        ]);
             
       // after successfull payment, you can store payment related information into your database
              
        $data = array('success' => true, 'data'=> $stripe);
 
        echo json_encode($data);
    }

    public function pasarela()
    {


        require_once('application/libraries/stripe-php/init.php');
        \Stripe\Stripe::setApiKey('sk_test_cNEnkPQ796OFqgwfXH2oBUyq00qKunHgZw');

        $session = \Stripe\Checkout\Session::create([
          'payment_method_types' => ['card'],
          'line_items' => [[
            'name' => 'T-shirt',
            'description' => 'Comfortable cotton t-shirt',
            'images' => ['https://example.com/t-shirt.png'],
            'amount' => 1500,
            'currency' => 'mxn',
            'quantity' => 1,
          ]],
          'success_url' => 'https://example.com/success',
          'cancel_url' => 'https://example.com/cancel',
        ]);

         $stripeSession = array($session);
         $sessId = ($stripeSession[0]['id']);

         $datos['sesion'] = $sessId;



        $this->load->view('eco/stripe/index', $datos);

    }
}