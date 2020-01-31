@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
	<div class="dashboard garments transaction-inner">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><a href="{!!URL('transaction')!!}">Transaction</a></li>
                        <li><span>#12345</span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                   	@include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content transaction-inner-holder">
                            <div id="no-more-tables" class="transaction-inner-table">
                                <div class="transaction_holder">
                                    <div class="">
                                        <h3>Transaction</h3>
                                        <div class="transaction_wrapper">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <strong class="col-md-6">from</strong>
                                                        <p class="col-md-6"><i>ANNA STONES</i></p>
                                                    </div>
                                                    <div class="row">
                                                        <strong class="col-md-6">Transaction #</strong>
                                                        <p class="col-md-6">1975399</p>
                                                    </div>
                                                    <div class="row">
                                                        <strong class="col-md-6">date</strong>
                                                        <p class="col-md-6">01 - 10 - 2017</p>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <strong class="col-md-6">Shipping Fee</strong>
                                                        <p class="col-md-6">$ 30</p>
                                                    </div>
                                                    <div class="row">
                                                        <strong class="col-md-6">total amount</strong>
                                                        <p class="col-md-6">$ 100</p>
                                                    </div>
                                                    <div class="row">
                                                        <strong class="col-md-6">confirmation #</strong>
                                                        <p class="col-md-6">21845111</p>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <table class="table-condensed cf list-item">
                                    <thead class="cf">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Owner</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Price</th>                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-title="Product Name" class="">Soft Leather Blazer Jacket</td>
                                            <td data-title="Owner" class="">ANNA STONES</td>
                                            <td data-title="Color" class="">Black</td>
                                            <td data-title="Size" class="">L</td>
                                            <td data-title="Price" class="">$ 5/day</td>
                                        </tr>
                                        <tr>
                                            <td data-title="Product Name" class="">Soft Leather Blazer Jacket</td>
                                            <td data-title="Owner" class="">ANNA STONES</td>
                                            <td data-title="Color" class="">Black</td>
                                            <td data-title="Size" class="">L</td>
                                            <td data-title="Price" class="">$ 5/day</td>
                                        </tr>
                                        <tr>
                                            <td data-title="Product Name" class="">Soft Leather Blazer Jacket</td>
                                            <td data-title="Owner" class="">ANNA STONES</td>
                                            <td data-title="Color" class="">Black</td>
                                            <td data-title="Size" class="">L</td>
                                            <td data-title="Price" class="">$ 5/day</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table-condensed cf shipping">
                                    <thead class="cf">
                                        <tr>
                                            <th>OWNER</th>                                                                        
                                            <th>SHIPPING FEE</th>            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-title="OWNER" class=""><strong>ANNA STONES</strong></td>
                                            <td data-title="SHIPPING FEE" class="">
                                                PICK UP ( $ 0 )
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-title="OWNER" class=""><strong>ASHLEY HARRISON</strong></td>
                                            <td data-title="SHIPPING FEE" class="">
                                                PICK UP ( $ 0 )
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                <div class="clearfix">
                                    <div class="total-holder">
                                        <div class="clearfix">
                                            <p class="pull-left">Sub Total</p>
                                            <span class="pull-right">$ 300</span>
                                        </div>
                                        <div class="clearfix">
                                            <p class="pull-left">SHIPPING FEE</p>
                                            <span class="pull-right">$ 10</span>
                                        </div>
                                        <div class="clearfix">
                                            <h3 class="pull-left">total</h3>
                                            <sub class="pull-right">$ 310</sub>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop