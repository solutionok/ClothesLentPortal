<?php

namespace App\Console\Commands;

use App\Functions\PaypalConfig;
use App\Models\Products\Products;
use App\models\Rent\Rent;
use App\models\Rent\RentTransactionDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\RefundRequest;
use PayPal\Api\Sale;
use PayPal\Exception\PayPalConnectionException;

class RefundCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refund:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command is automatically refund the retail price after 5 days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function refundToClient($rented_id, $refundAmount, $user_id, $detail) {

        $RentTransactD                   = new RentTransactionDetail;
        $RentTransactD->rented_detail_id = $rented_id;
        $RentTransactD->user_id          = $user_id;
        $RentTransactD->total_amount     = $refundAmount;
        $RentTransactD->detail           = $detail;
        $RentTransactD->pay_key          = '';
        $RentTransactD->payment_info     = '';
        $RentTransactD->save();

        $apiContext  = PaypalConfig::getApiContext();

        $rentedDetail = Rent::where('id', $rented_id)->first();
        $payment = Payment::get($rentedDetail->pay_key, $apiContext);
        $sale = new Sale();
        $saleId = $payment
            ->getTransactions()[0]
            ->getRelatedResources()[0]
            ->sale->id;
        $sale->setId($saleId);


        // Refunded Security amount to Client
        $sale   = Sale::get($saleId, $apiContext);
        $saleId = $sale->getId();

        $amt = new Amount();
        $amt->setCurrency(CURRENCY_CODE)
            ->setTotal($refundAmount);

        $refundRequest = new RefundRequest();
        $refundRequest->setAmount($amt);

        $sale = new Sale();
        $sale->setId($saleId);
        try {

            $sale->refundSale($refundRequest, $apiContext);

        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        }
    }

    private function sendEmail($title, $message, $email, $link, $name, $product, $rent, $user) {

        $data['title']   = $title;
        $data['message'] = $message;
        $data['link'] = $link;
        $data['name'] = $name;
        $data['picture'] = $product['picture'];

        $data['rented_id']   = $rent->id;
        $data['product_id'] = $product->id;
        $data['user_type'] = $user;

        Mail::send('emails.notify', compact('data'), function ($m) use ($title, $email) {
            $m->to($email)->subject('Rent A Suit - ' . $title);
            $m->from('info@rentsuit.com');
        });
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $rentItems = Rent::where('status', 'Client Sent')->get();

        foreach ($rentItems as $item) {
            $now = Carbon::now();

            $endDate = Carbon::parse($item->rental_end_date);

            if ($now->gt($endDate) && $endDate->diffInDays($now) >= 5) {
                $client  = User::find($item->user_id);
                $product = Products::where('id', $item->product_id)
                    ->with('user_detail')
                    ->first();

                $refundAmount =  $product->retail_price;
                $this->refundToClient($item->id, $refundAmount, $item->user_id, 'Automatic refund of retail price');
                Rent::manageData($item->id, 'Automatic Refund');

                $clientName = "$client->first_name $client->last_name";

                $this->sendEmail("Retail price item refund",
                    "Hi $clientName, the retail price of $product->name have been refund.",
                    $client->email,
                    '', "client", $product, $item, $client);
            }
        }
    }
}
