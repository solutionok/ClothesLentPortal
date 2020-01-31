<?php

namespace App\Models\Paypal;

use App\Models\Categories;
use App\Models\Products\Products;
use App\models\Rent\Rent;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;

class TransactionFactory
{
    static function fromBasket($basket, float $vatRate = 0): Transaction
    {
        $list = new ItemList();
        $totalRetailPrice = 0;
        $totalProductPrice = 0;
        $totalFee = 0;
        $totalShippingCost = 0;
        $listRentId = [];
        foreach ($basket as $value) {
            $rentInfo = Rent::where('id', ($value->rentID))->first();
            $startDate = date_create($rentInfo->rental_start_date);
            $endDate = date_create($rentInfo->rental_end_date);
            $dayQuantity =  date_diff($startDate, $endDate)->format("%a") + 1;

            $product = Products::where('id', $value->productID)->with('user_detail')->first();
            $fee = ($product->price * $dayQuantity) / 10;

            $category = Categories::where('id', $product->product_categories[0]->category_id)->first();

            if ($rentInfo->delivery_option === "Localization") {
                $shippingCost = 0;
            } else if($rentInfo->delivery_option === "Regular mail") {
                $shippingCost = $category->shipping_fee_local;
            } else {
                $shippingCost = $category->shipping_fee_nationwide;
            }

            /* @var Products $product */
            $item = (new Item())
                ->setName($product->name)
                ->setQuantity(1)
                ->setPrice($product->price * $dayQuantity + $product->retail_price + $fee)
                ->setCurrency('CAD')
                ->setDescription($product->description);
            $list->addItem($item);
            $totalRetailPrice += $product->retail_price;
            $totalProductPrice +=  $product->price * $dayQuantity;
            $totalFee += $fee;
            $totalShippingCost += $shippingCost;
            $listRentId[] = $rentInfo->id;
        }

        $details = (new Details())
            //->setTax($basket->getVatPrice($vatRate))
            ->setSubtotal($totalRetailPrice + $totalProductPrice + $totalFee)
            ->setShipping($totalShippingCost);

        $amount = (new Amount())
            ->setTotal($totalRetailPrice + $totalProductPrice + $totalFee + $totalShippingCost) // + $basket->getVatPrice($vatRate))
            ->setCurrency('CAD')
            ->setDetails($details);

        return (new Transaction())
            ->setItemList($list)
            ->setDescription('Renting on rentasuit.ca')
            ->setAmount($amount)
            //clefs personnalisées par exemple ID de commande
            ->setCustom(json_encode($listRentId));
    }
}