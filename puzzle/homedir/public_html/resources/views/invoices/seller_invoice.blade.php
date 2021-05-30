
<div style="margin-left:auto;margin-right:auto;">
<style media="all">
	@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700');
	*{
		margin: 0;
		padding: 0;
		line-height: 1.5;
		font-family: DejaVu Sans;
	}
	div{
		font-size: 1rem;
	}
	.gry-color *,
	.gry-color{
		color:#878f9c;
	}
	.gry-color2{
    	color: #ffffff;
	}
	table{
		width: 100%;
	}
	table th{
		font-weight: normal;
	}
	table.padding th{
		padding: .5rem .7rem;
	}
	table.padding td{
		padding: .7rem;
	}
	table.sm-padding td{
		padding: .2rem .7rem;
	}
	.border-bottom td,
	.border-bottom th{
		border-bottom:1px solid #eceff4;
	}
	.text-left{
		text-align:left;
	}
	.text-right{
		text-align:right;
	}
	.small{
		font-size: .85rem;
	}
	.strong{
		font-weight: bold;
	}
	.footerline{
		padding: 20px;
		background: #07bb70;
		margin: 30px;
		text-align: center;
		color: white;
		height: 30px;
		margin-top: 100px;
	}
</style>

	@php
		$generalsetting = \App\GeneralSetting::first();
		$shipping_address = json_decode($order->shipping_address);

		$identityid = DB::table('users')->where('id', $order->user_id)->select('usertype_id')->get();
	@endphp
			
	<div style="border-bottom:1px solid #eceff4; padding: 1.5rem;">
		<table>
			<tr>
				<td>
					@if($generalsetting->logo != null)
						<img loading="lazy"  src="{{ asset($generalsetting->logo) }}" height="40" style="display:inline-block;">
					@else
						<img loading="lazy"  src="{{ asset('frontend/images/logo/logo.png') }}" height="40" style="display:inline-block;">
					@endif
				</td>
				<td style="font-size: 1.5rem; text-align:center;" class="text-right strong">{{__('INVOICE')}}</td>
				<td class="text-right small">
				<span class="gry-color small"> {{__('Order Date')}}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span> <br>
				<span class="gry-color small">{{__('Order id')}}</span> <span class="strong">{{ $order->code }}</span>
				</td>
			</tr>
		</table>
	</div>
	<div style="padding: 1.5rem;">
		<table>
			<tr>
				<td class="">შპს პაზლი</td>
				<td class="text-right">{{__('Seller')}}</td>
			</tr>
			<tr>
				<td class="gry-color small">{{__('Phone')}}: {{ $generalsetting->phone }}</td>
				<td class="text-right"><span class="gry-color small">{{__('Name')}}: {{ $shipping_address->name }}</span></td>
			</tr>
			<tr>
				<td class="gry-color small">{{__('Email')}}: {{ $generalsetting->email }}</td>
				<td class="text-right small"><span class="gry-color small">{{__('Company Id')}}: @php echo $identityid[0]->usertype_id; @endphp </span></td>
			</tr>
			<tr>
				<td class="gry-color small">{{ $generalsetting->address }}</td>
				<td class="text-right small"><span class="gry-color small">{{__('City')}}: {{ __($shipping_address->city) }}</span></td>
			</tr>
			<tr>
				<td class="gry-color small">ბანკი: ს.ს. საქართველოს ბანკი</td>
				<td class="text-right small"><span class="gry-color small">{{__('Address')}}: {{ $shipping_address->address }}</span></td>
			</tr>
			<tr>
				<td class="gry-color small">SWIFT CODE: BAGAGE22</td>
				<td class="text-right small"><span class="gry-color small">{{__('Email')}}: {{ $shipping_address->email }}</span></td>
			</tr>
			<tr>
				<td class="gry-color small">ა/ნ GE88BG0000000162163729</td>
				<td class="text-right small"><span class="gry-color small">{{__('Phone')}}: {{ $shipping_address->phone }}</span></td>
			</tr>
		</table>
	</div>
	<div style="margin: 0 1.5rem;"></div>

    <div style="padding: 1.5rem;">
		<table class="padding text-left small border-bottom">
			<thead>
                <tr class="gry-color2" style="background: #07bb70; ">
                    <th width="50%" style="    border-top-left-radius: 20px;">{{__('Product Name')}}</th>
                    <th width="10%">{{__('Unit')}}</th>
                    <th width="10%">{{__('Qty')}}</th>
                    <th width="10%">{{__('Unit Price')}}</th>
                    <th width="20%" class="text-right">{{__('Total')}}</th>
                </tr>
			</thead>
			<tbody class="strong">
                @foreach ($order->orderDetails as $key => $orderDetail)
	                @if ($orderDetail->product != null)
						<tr class="">
							<td>{{ $orderDetail->product->name }} @php if($orderDetail->variation){ echo '('; echo $orderDetail->variation; echo ')'; } @endphp</td>
							<td class="gry-color">{{ __('unit'.$orderDetail->product->unit) }}</td>    
							<td class="gry-color">{{ $orderDetail->quantity }}</td>
							<td class="gry-color">{{ $orderDetail->price/$orderDetail->quantity }} GEL</td>
		                    <td class="text-right">{{ $orderDetail->price+$orderDetail->tax }} GEL</td>
						</tr>
	                @endif
				@endforeach
            </tbody>
		</table>
	</div>

    <div style="padding:0 1.5rem;">
        <table style="width: 40%;margin-left:auto; " class="text-right sm-padding small strong">
	        <tbody style="background: #07bb70; color: white;">
		        <tr>
		            <th class="text-left" style="padding-left: 20px; border-top-left-radius: 20px;">{{__('Sub Total')}}</td>
		            <td>{{ $order->orderDetails->sum('price') }} GEL</td>
		        </tr>
				<!--
		        <tr>
		            <th class="gry-color text-left">{{__('Shipping Cost')}}</td>
		            <td>{{ round($order->grand_total-$order->grand_total/1.18,2) }} GEL</td>
		        </tr>
		        <tr>
		            <th class="text-left strong">{{__('Grand Total')}}</td>
		            <td>{{ $order->grand_total }} GEL</td>
		        </tr>-->
	        </tbody>
	    </table>
    </div>    
	
	<div style="padding:0 1.5rem;">
		<div class="footerline">
			PUZZLE.GE
		</div>
    </div>
</div>
