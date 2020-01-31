<?php

namespace App\Console\Commands;

use App\models\Notification\Notification;
use App\Models\Products\Products;
use App\models\Rent\Rent;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Reminder extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:return';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command is created to remind the Client for Return the Item';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $rentItems = Rent::where('status', 'Satisfied')->orWhere('status', 'Not Satisfied')->orWhere('status', 'Client Received')->get();

        foreach ($rentItems as $item) {
            $now = Carbon::now();

            $endDate = Carbon::parse($item->rental_end_date);
            if ($endDate->gt($now) && $endDate->diffInDays($now) === 4) {

                $client  = User::find($item->user_id);
                $product = Products::where('id', $item->product_id)->with('user_detail')->first();

                $clientName = "$client->first_name $client->last_name";
                $merName    = $product->user_detail->first_name . " " . $product->user_detail->last_name;
                $merchantID = $product->user_detail->id;

                $noti = "<div class='col-md-11' style='padding-left: 0;'>Hi <b>$clientName</b>, remember that <b>$merName</b> needs to receive this item by <b>$clientName</b> to avoid any penalties. <b>$merName</b> wants to receive the item via <b>$item->return_delivery_option</b>. Thank you for your collaboration</div>";
                $noti .= "<div class='col-md-1'><img style='width: 50px;' src='" . asset($product->picture) . "'></div>";

                Notification::addData($client->id, $merchantID, $item->id, 'Reminder to Client', $noti, 'reminder');

                $link = url('rented/view/' . $rented_id);
                Notification::sendEmail("Reminder",
                    "Hi $clientName, remember that needs to receive this item by $clientName to avoid any penalties. $merName wants to receive the item via $item->return_delivery_option. Thank you for your collaboration",
                    $client->email,
                    $link, $product->picture, "client", $item->product_id, $item->id);

            }
        }


        $rentItems2 = Rent::where('status', 'Payment Accepted')->get();

        foreach ($rentItems2 as $item) {

            $client  = User::find($item->user_id);
            $product = Products::where('id', $item->product_id)->with('user_detail')->first();

            $clientName = "$client->first_name $client->last_name";
            $merName    = $product->user_detail->first_name . " " . $product->user_detail->last_name;
            $merchantID = $product->user_detail->id;
            $merchantEmail = $product->user_detail->email;

            $noti = "<div class='col-md-11' style='padding-left: 0;'>Hi <b>$merName</b>, remember that <b>$clientName</b> needs to receive this item by <b>$merName</b> on time. <b>$clientName</b> wants to receive the item via <b>$item->delivery_option</b>. Thank you</div>";
            $noti .= "<div class='col-md-1'><img style='width: 50px;' src='" . asset($product->picture) . "'></div>";

            Notification::addData($client->id, $merchantID, $item->id, 'Reminder to Merchant', $noti, 'reminder');

            $link2 = url('for-rent/booking-list/' . $product->id);
            Notification::sendEmail("Reminder",
                "Hi $merName, remember that needs to receive this item by $merName on time. $clientName wants to receive the item via $item->delivery_option. Thank you for your collaboration",
                $merchantEmail,
                $link2, $product->picture, "bp", $item->product_id, $item->id);

        }



    }
}
