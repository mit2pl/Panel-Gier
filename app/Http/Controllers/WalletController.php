<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\wallethistory;
use Mollie\Laravel\Facades\Mollie;
// use PayPal\Api\Amount;
// use PayPal\Api\Details;
// use PayPal\Api\Item;
// use PayPal\Api\ItemList;
// use PayPal\Api\Payer;
// use PayPal\Api\Payment;
// use PayPal\Api\RedirectUrls;
// use PayPal\Api\Transaction;
// use PayPalCheckoutSdk\Core\PayPalHttpClient;
// use PayPalCheckoutSdk\Core\SandboxEnvironment;
// use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
// use PayPal\Api\Amount;
// use PayPal\Api\Details;
// use PayPal\Api\ExecutePayment;
// use PayPal\Api\Payment;
// use PayPal\Api\PaymentExecution;
// use PayPal\Api\Transaction;
// use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;
// use PayPal\Rest\ApiContext;
// use PayPal\Auth\OAuthTokenCredential;
// use PayPal\Api\RedirectUrls;
// use PayPal\Api\Transaction;
// use PayPal\Exception\PayPalConnectionException;
// use PayPal\Rest\ApiContext;
// use PayPal\Auth\OAuthTokenCredential;
// use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
//  use PayPalCheckoutSdk\Core\PayPalHttpClient;
//  use PayPalCheckoutSdk\Core\SandboxEnvironment;
// use Srmklive\PayPal\Services\ExpressCheckout;
// //use Srmklive\PayPal\Services\PayPal;
// use Srmklive\PayPal\Facades\PayPal;
// use Paypal;
// use PayPal\Api\Amount;
// use PayPal\Api\Item;
// use PayPal\Api\ItemList;
// use PayPal\Api\Payer;
// use PayPal\Api\Payment;
// use PayPal\Api\PaymentExecution;
// use PayPal\Api\RedirectUrls;
// use PayPal\Api\Transaction;
// use PayPal\Exception\PayPalConnectionException;
// use PayPal\Rest\ApiContext;
// use PayPal\Auth\OAuthTokenCredential;

class WalletController extends Controller
{
    private $client_id;
    private $client_secret;
    private $appContext;
    
    public function __construct() {
        // Creating an environment
        // $clientId = "<<PAYPAL-CLIENT-ID>>";
        // $clientSecret = "<<PAYPAL-CLIENT-SECRET>>";

        // $environment = new SandboxEnvironment($clientId, $clientSecret);
        // $client = new PayPalHttpClient($environment);
        // $mode = config('paypal.mode');
        // $credentials = config("paypal.$mode");
        // $this->client_id = $credentials['client_id'];
        // $this->client_secret = $credentials['client_secret'];
        // Creating an environment
        // $clientId = "AQ_rY-YVJt-uGrRs97H-6u4SBPTe4BNY0I8wPjxTPPJwLxrWO6bAZOEgLR2aXBmP98eR3FnyjJ3OaiIP";
        // $clientSecret = "EPbT0vJ5sCzxoT_dOXclcF4pL7vCIf9Q-VZYpjI-VzFGfVinyrPwDv5ZXC1I5Lm5EYRxSNbX_-fviSvu";
        
        // $environment = new SandboxEnvironment($clientId, $clientSecret);
        // $client = new PayPalHttpClient($environment);
        // $apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->client_secret));
        // $this->apiContext->setConfig(config('paypal.settings'));
        // $mode = config('paypal.mode');
        // $credentials = config("paypal.$mode");
        // $this->client_id = $credentials['client_id'];
        // $this->client_secret = $credentials['client_secret'];

        // $this->appContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->client_secret));
        // $this->appContext->setConfig(config('paypal.settings'));
    }
    public function showwallet() {
//         $request = new OrdersCreateRequest();
// $request->prefer('return=representation');
// $request->body = [
//                      "intent" => "sale",
//                      "purchase_units" => [[
//                          "reference_id" => "test_ref_id1",
//                          "amount" => [
//                              "value" => "100.00",
//                              "currency_code" => "USD"
//                          ]
//                      ]],
//                      "application_context" => [
//                           "cancel_url" => route('canceledwalletpaypal'),
//                           "return_url" => route('confirmedwalletpaypal')
//                      ] 
//                  ];

// try {
//     // Call API with your client and get a response for your call
//     $response = $client->execute($request);
    
//     // If call returns body in response, you can get the deserialized version from the result attribute of the response
//     print_r($response);
// }catch (HttpException $ex) {
//     echo $ex->statusCode;
//     print_r($ex->getMessage());
// }
        // $role =Role::create(['name' => 'usdfsefser']);
        // $permission = Permission::create(['name' => 'add cicedfse']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // $role = Role::findById(3);
        // $role->givePermissionTo($role);
        //$permission = Permission::findById('3');
        //$permission->assignRole($permission);
        //auth()->user()->assignRole('admin');
        return view('wallet');       
    }
    public function showwallethistory() {
        $getwallethistory = wallethistory::where('iduser', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        //= DB::select("SELECT * FROM wallet_history WHERE iduser='$iduser'");
        // return $getwallethistory;
        return view('wallethistory', compact('getwallethistory')); 
    }
    public function showwalletpaypal() {
        if(env("PAYPAL_ACTIVE") == '1')
        {
            return view('walletpaypal');
        }
        else 
        {
            abort(404);
        }
    }
    public function addmonybypaypal(Request $request) {
                                            // $clientId = "AQ_rY-YVJt-uGrRs97H-6u4SBPTe4BNY0I8wPjxTPPJwLxrWO6bAZOEgLR2aXBmP98eR3FnyjJ3OaiIP";
                                            // $clientSecret = "EPbT0vJ5sCzxoT_dOXclcF4pL7vCIf9Q-VZYpjI-VzFGfVinyrPwDv5ZXC1I5Lm5EYRxSNbX_-fviSvu";

                                            // $environment = new SandboxEnvironment($clientId, $clientSecret);
                                            // $client = new PayPalHttpClient($environment);
                                                    $validated = $request->validate([
                                                        'kwotapaypal' => 'required|numeric',
                                                    ]);

//                                                     $response=Paypal::CreatePayment("5","0","0","1","Payment for basket ball");
//     $payment_id=$response["order_id"];
// return redirect($response["checkout_link"]);
                                            //                 $request = new OrdersCreateRequest();
                                            // $request->prefer('return=representation');
                                            // $request->body = [
                                            //                      "intent" => "CAPTURE",
                                            //                      "purchase_units" => [[
                                            //                          "reference_id" => "testoweid",
                                            //                          "amount" => [
                                            //                              "value" => "100.00",
                                            //                              "currency_code" => "USD"
                                            //                          ]
                                            //                      ]],
                                            //                      "application_context" => [
                                            //                           "cancel_url" => route('canceledwalletpaypal'),
                                            //                           "return_url" => route('confirmedwalletpaypal')
                                            //                      ] 
                                            //                  ];
                                            // try {
                                            //     // Call API with your client and get a response for your call
                                            //     $response = $client->execute($request);
                                                
                                            //     // If call returns body in response, you can get the deserialized version from the result attribute of the response
                                            //      print_r($response);
                                            // }
                                            // catch (HttpException $ex) {
                                            //     echo "dadwa";
                                            //     echo $ex->statusCode;
                                            //     print_r($ex->getMessage());
                                            // }

        // $price = 120;
        // $name = "keroles";

        // $payer = new Payer();
        // $payer->setPaymentMethod('paypal');

        // $item = new Item();
        // $item->setName($name . $price)
        //     ->setCurrency("PLN")
        //     ->setQuantity(1)
        //     ->setSku("123456")
        //     ->setPrice($price);


        // $itemList = new ItemList();
        // $itemList->setItems([$item]);

        // $amount = new Amount();
        // $amount
        //     ->setCurrency("USD")
        //     ->setTotal($price);

        // $transaction = new Transaction();
        // $transaction->setAmount($amount)
        //     ->setItemList($itemList)
        //     ->setDescription("Payment Paypal")
        //     ->setInvoiceNumber(uniqid("", TRUE));

        // $redirectUrl = new RedirectUrls();
        // $redirectUrl
        //     ->setReturnUrl(route('confirmedwalletpaypal'))
        //     ->setCancelUrl(route('canceledwalletpaypal'));

        // $payment = new Payment();
        // $payment->setIntent("sale")
        //     ->setPayer($payer)
        //     ->setRedirectUrls($redirectUrl)
        //     ->setTransactions([$transaction]);

        // try {
        //     $payment->create($this->appContext);
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
        // $payment_link = $payment->getApprovalLink();
        // return redirect($payment_link);
        // $product = [];  
        // $product['items'] = [
        //     [
        //         'name' => 'codechief.org',
        //         'price' => 100,
        //         'desc'  => 'Description goes herem',
        //         'qty' => 1
        //     ]
        // ];
        // $product['invoice_id'] = Auth::id();
        // $product['invoice_description'] = "Order hjfsduf Bill";
        // $product['return_url'] = route('confirmedwalletpaypal');
        // $product['cancel_url'] = route('canceledwalletpaypal');
        // $product['total'] = request('kwotapaypal');
  
        // $paypalModule = new ExpressCheckout;
  
        // $res = $paypalModule->setExpressCheckout($product);
        // $res = $paypalModule->setExpressCheckout($product, true);
  
        // return redirect($res['paypal_link']);
        // Import the class namespaces first, before using it directly

// $provider = new PayPal;

// // Through facade. No need to import namespaces
// $provider = PayPal::setProvider();
//         $product = [];
//         $product['items'] = [
//             [
//                 'name' => 'Nike Joyride 2',
//                 'price' => 112,
//                 'desc'  => 'Running shoes for Men',
//                 'qty' => 2
//             ]
//         ];
  
//         $product['invoice_id'] = 1;
//         $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
//         $product['return_url'] = route('confirmedwalletpaypal');
//         $product['cancel_url'] = route('canceledwalletpaypal');
//         $product['total'] = 224;
  
//         $paypalModule = new ExpressCheckout;
  
        // $res = $provider->setExpressCheckout($product);
        // $res = $provider->setExpressCheckout($product, true);
  
        // return redirect($res['paypal_link']);
// Create new payer and method
//$apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->client_secret));
// $payer = new Payer();
// $payer->setPaymentMethod("paypal");

// // Set redirect URLs
// $redirectUrls = new RedirectUrls();
// $redirectUrls->setReturnUrl('http://localhost:3000/process.php')
//   ->setCancelUrl('http://localhost:3000/cancel.php');

// // Set payment amount
// $amount = new Amount();
// $amount->setCurrency("USD")
//   ->setTotal(10);

// // Set transaction object
// $transaction = new Transaction();
// $transaction->setAmount($amount)
//   ->setDescription("Payment description");

// // Create the full payment object
// $payment = new Payment();
// $payment->setIntent('sale')
//   ->setPayer($payer)
//   ->setRedirectUrls($redirectUrls)
//   ->setTransactions(array($transaction));
//   try {
//         //$payment->create($apiContext);
      
//         // Get PayPal redirect URL and redirect the customer
//         $approvalUrl = $payment->getApprovalLink();
      
//         // Redirect the customer to $approvalUrl
//       } catch (PayPal\Exception\PayPalConnectionException $ex) {
//         echo $ex->getCode();
//         echo $ex->getData();
//         die($ex);
//       } catch (Exception $ex) {
//         die($ex);
//       }
//     }
// $apiContext = new \PayPal\Rest\ApiContext(
//     new \PayPal\Auth\OAuthTokenCredential(
//         'AQ_rY-YVJt-uGrRs97H-6u4SBPTe4BNY0I8wPjxTPPJwLxrWO6bAZOEgLR2aXBmP98eR3FnyjJ3OaiIP',     // ClientID
//         'EPbT0vJ5sCzxoT_dOXclcF4pL7vCIf9Q-VZYpjI-VzFGfVinyrPwDv5ZXC1I5Lm5EYRxSNbX_-fviSvu'      // ClientSecret
//     )
// );

// // After Step 2
// $payer = new \PayPal\Api\Payer();
// $payer->setPaymentMethod('paypal');

// $amount = new \PayPal\Api\Amount();
// $amount->setTotal('150.00');
// $amount->setCurrency('PLN');

// $transaction = new \PayPal\Api\Transaction();
// $transaction->setAmount($amount);

// $redirectUrls = new \PayPal\Api\RedirectUrls();
// $redirectUrls->setReturnUrl(route('confirmedwalletpaypal'))
//     ->setCancelUrl(route('canceledwalletpaypal'));

// $payment = new \PayPal\Api\Payment();
// $payment->setIntent('sale')
//     ->setPayer($payer)
//     ->setTransactions(array($transaction))
//     ->setRedirectUrls($redirectUrls);

    // $paymentId = '432423423';
    // $payment = Payment::get($paymentId, $apiContext);
    // $payerId = '2312312325';
    
    // // Execute payment with payer ID
    // $execution = new PaymentExecution();
    // $execution->setPayerId($payerId);
    
    // try {
    //   // Execute payment
    //   $result = $payment->execute($execution, $apiContext);
    //   var_dump($result);
    // } catch (PayPal\Exception\PayPalConnectionException $ex) {
    //   echo $ex->getCode();
    //   echo $ex->getData();
    //   die($ex);
    // } catch (Exception $ex) {
    //   die($ex);
    // }
// After Step 3
// try {
//     print_r($apiContext);
//     $payment->create($apiContext);
//     echo $payment;
//      echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
//     //return redirect($payment->getApprovalLink());
// }
// catch (\PayPal\Exception\PayPalConnectionException $ex) {
//     // This will print the detailed information on the exception.
//     //REALLY HELPFUL FOR DEBUGGING
//     echo $ex->getData();
// }
// $request = new PayoutsPostRequest();
// $body= json_decode(
//             '{
//                 "sender_batch_header":
//                 {
//                   "email_subject": "SDK payouts test txn"
//                 },
//                 "items": [
//                 {
//                   "recipient_type": "EMAIL",
//                   "receiver": "payouts2342@paypal.com",
//                   "note": "Your 1$ payout",
//                   "sender_item_id": "Test_txn_12",
//                   "amount":
//                   {
//                     "currency": "USD",
//                     "value": "1.00"
//                   }
//                 }]
//               }',             
//             true);
// $request->body = $body;
// $client = PayPalClient::client();
// $response = $client->execute($request);
// print "Status Code: {$response->statusCode}\n";
// print "Status: {$response->result->batch_header->batch_status}\n";
// print "Batch ID: {$response->result->batch_header->payout_batch_id}\n";
// print "Links:\n";
// foreach($response->result->links as $link)
//  {
//    print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
//  }
// echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";
        // $price = 120;
        // $name = "keroles";

        // $payer = new Payer();
        // $payer->setPaymentMethod('paypal');

        // $item = new Item();
        // $item->setName($name . $price)
        //     ->setCurrency("USD")
        //     ->setQuantity(1)
        //     ->setSku("123456")
        //     ->setPrice($price);


        // $itemList = new ItemList();
        // $itemList->setItems([$item]);

        // $amount = new Amount();
        // $amount
        //     ->setCurrency("USD")
        //     ->setTotal($price);

        // $transaction = new Transaction();
        // $transaction->setAmount($amount)
        //     ->setItemList($itemList)
        //     ->setDescription("Payment Paypal")
        //     ->setInvoiceNumber(uniqid("", TRUE));

        // $redirectUrl = new RedirectUrls();
        // $redirectUrl
        //     ->setReturnUrl(route('confirmedwalletpaypal'))
        //     ->setCancelUrl(route('canceledwalletpaypal'));

        // $payment = new Payment();
        // $payment->setIntent("sale")
        //     ->setPayer($payer)
        //     ->setRedirectUrls($redirectUrl)
        //     ->setTransactions([$transaction]);

        // try {
        //     $payment->create($this->appContext);
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
        // $payment_link = $payment->getApprovalLink();

        // return redirect($payment_link);
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "PLN",
                "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #12345",
            "redirectUrl" => route('confirmedwalletpaypal'),
            "webhookUrl" => route('canceledwalletpaypal'),
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);
    
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);



    }
    public function canceledwalletpaypal(Request $request) {
    $paymentId = $request->input('id');
    $payment = Mollie::api()->payments->get($paymentId);

    if ($payment->isPaid())
    {
        echo 'Payment received.';
        $dodajhajs = User::money() + $request->input('value');
        $affected = DB::table('users')
              ->where('id', User::id())
              ->update(['money' => 1231]);
        // Do your thing ...
    }
    }
    public function confirmedwalletpaypal(Request $request) {
    $paymentId = $request->input('id');
    $payment = Mollie::api()->payments->get($paymentId);

    if ($payment->isPaid())
    {
        echo 'Payment received.';
        // Do your thing ...
    }
    }
}