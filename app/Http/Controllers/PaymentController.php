<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use LaravelMPay24\Models\BasicShop;
use LaravelMPay24\ORDER;
use LaravelMPay24\PaymentResponse;
use LaravelMPay24\Transaction;

class PaymentController extends Controller {
    /**
     * Show the application welcome screen to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('welcome');
    }

    /**
     * Create a test transaction and redirect user to mpay24 page
     */
    public function postIndex()
    {
        $transaction = new Transaction('test transaction');
        $transaction->PRICE = 100.11;

        $order = new ORDER();
        $order->Order->Tid   = $transaction->TID;
        $order->Order->Price = $transaction->PRICE;

        $shopDelegator = new BasicShop();
        $shopDelegator->setTransaction($transaction);
        $shopDelegator->setOrder($order);

        /** @var \LaravelMPay24\Shop $mpay24 */
        $mpay24 = app()->mpay24;
        $mpay24->setShopDelegator($shopDelegator);
        /** @var PaymentResponse $result */
        $result = app()->mpay24->pay();

        if($result->getGeneralResponse()->getStatus() == 'OK') {
            $url = $result->getLocation();
            header('Location: '.$url);
        } else {
            echo "Return Code: " . $result->getGeneralResponse()->getReturnCode();
        }
    }

    public function anySuccess()
    {
        echo 'Success';
    }

    public function anyError()
    {
        echo 'Error';
    }

    public function anyConfirmation()
    {
        echo 'Confirmation';
    }


}
