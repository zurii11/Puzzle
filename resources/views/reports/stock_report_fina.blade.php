@extends('layouts.app')

@section('content')


    <div class="col-md-offset-2 col-md-8">
        <div class="panel">
            <!--Panel heading-->
            <div class="panel-heading">
                <h3 class="panel-title">შესაკვეთ პროდუქტების სია</h3>
            </div>
            <!--Panel body-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mar-no demo-dt-basic">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>პროდუქტის დასახელება</th>
                                <th>მომწოდებელი</th>
                                <th>შესაძენი რაოდენობა</th>
                                <th>მოქმედება</th> 
                            </tr>
                        </thead>
                        <tbody> 
							@php $qty = 1; @endphp
                            @foreach ($result as $product)
                                <tr>
                                    <td>@php echo $qty; @endphp</td>
                                    <td>@php echo $product['name']; @endphp</td>
                                    <td>@php echo $product['fina_vendor']; @endphp</td>
                                    <td>@php echo $product['productsoltquantity'] - $product['finaquantity']; @endphp</td>
                                    <td>
											  <input type="hidden" name="unitprice" value="<?php echo $product['purchase_price']; ?>"></input>
											  <input type="hidden" name="finavendor" value="<?php echo $product['vendor_id']; ?>"></input>
											  <input type="hidden" name="finaid" value="<?php echo $product['finaid']; ?>"></input>
											  <input type="text" style="width: 50px;"></input>
											  <input id="orderfina" type="submit" value="შეკვეთა"></input>
																				
									</td>
                                </tr>
								
							@php $qty++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#orderfina').on('click', function(){
			var purchase_price = $(this).prev().prev().prev().prev('input').val()
			var fina_vendor = $(this).prev().prev().prev('input').val()
			var product_id = $(this).prev().prev('input').val()
			var quantity = $(this).prev('input').val()
			
            $.post('{{ route('orders.orderinfina') }}', {_token:'{{ @csrf_token() }}',product_id:product_id,quantity:quantity,fina_vendor:fina_vendor,purchase_price:purchase_price}, function(data){
                showAlert('success', 'შეკვეთა წარმატებით გადაიგზავნა ფინაში');
            });
			 
        });
    </script>
@endsection
