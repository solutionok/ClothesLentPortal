@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
	<div class="dashboard transaction">
	    <div class="section-1">
	        <div class="mx-1254 clearfix">
	            <div class="breadcrumbs">
	                <ul>
	                    <li><a href="{!!URL('/')!!}">Home</a></li>
	                    <li><span>transaction</span></li>
	                </ul>
	            </div>
	            <div class="dashboard-container clearfix">
	                @include('user-interface.dashboard.includes.left-sidebar')
	                <div class="col-md-9">
	                    <div class="page-content">
	                        <div class="padding-0-50">
	                            <div class="page-content-header clearfix">
	                                <div class="header-left">
	                                    <ul>
	                                        <li class="active"><a>Transaction List</a></li>
	                                        
	                                    </ul>
	                                </div>
	                                <!--<div class="header-right">
	                                    <div class="form-group clearfix">
	                                        <label for="" class="col-sm-5 control-label">Sort by</label>
	                                        <div class="col-sm-7">
	                                        	<div class="select">
	                                            <select class="form-control">
	                                                <option>Date</option>
	                                                <option>Date</option>
	                                            </select>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>-->
	                            </div>
	                        </div>
	                        <div id="no-more-tables" class="transaction-table">
	                            <table class="table-bordered table-striped table-condensed cf">
	                                <thead class="cf">
	                                    <tr>
	                                        <th>Transaction #</th>
	                                        <th>From</th>
	                                        
	                                        <th>Amount</th>
	                                        <th>Detail</th>
	                                        <th>Payment date</th>
	                                        <th>Type</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                @forelse($transaction_list as $value)
	                                    <tr>
	                                        <td data-title="Transaction #"><a href="{!!URL('transaction?id=12345')!!}">{{$value->id}}</a></td>
	                                        <td data-title="From">
												{{$value->rent_details && $value->rent_details->product_detail && $value->rent_details->product_detail->user_detail ? $value->rent_details->product_detail->user_detail->first_name : "User Not Found"}}
												{{$value->rent_details && $value->rent_details->product_detail && $value->rent_details->product_detail->user_detail ? $value->rent_details->product_detail->user_detail->last_name : ""}}</td>
	                                        
	                                        <td data-title="Price" class="numeric">${{$value->total_amount}}</td>
											<td data-title="Detail" class="numeric">{{$value->detail}}</td>
											<td data-title="Payment date" class="numeric">{{date('m/d/Y h:i:s',strtotime($value->created_at))}}</td>
											<td data-title="Type" class="numeric">For Rent</td>
	                                    </tr>
	                                @empty
                                    	<tr>
	                                        <td colspan="5">No Transaction list found.</td>
	                                        </tr>
	                                @endforelse
	                                    
	                                </tbody>
	                            </table>
	                        </div>
	                        <div class="padding-0-50">
	                            <div class="text-right transaction-pagination">
	                                {{ $transaction_list->appends(Request::input())->render() }}
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@stop