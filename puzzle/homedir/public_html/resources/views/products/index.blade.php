@extends('layouts.app')

@section('content')

@if($type != 'Seller')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('products.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Add New Product')}}</a>
        </div>
    </div>
@endif

<br>

<div class="col-lg-12">
    <div class="panel">
        <!--Panel heading-->
        <div class="panel-heading">
            <h3 class="panel-title">{{ __($type.' Products') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="20%">{{__('Name')}}</th>
                        <th>{{__('Barcode')}}</th>
                        <th>{{__('Code')}}</th>
                        <th>{{__('Fina')}}</th>
                        <th>{{__('Photo')}}</th>
                        <th>{{__('Category')}}</th>
                        <th>{{__('Subcategory')}}</th>
                        <th>{{__('Price')}}</th>
                        <th>{{__('Published')}}</th>
                        <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{ route('product', $product->slug) }}" target="_blank">{{ __($product->name) }}</a></td>
                            <td>{{ __($product->barcode) }}</td>
                            <td>{{ __($product->productcode) }}</td>
                            <td>{{ __($product->finaid) }}</td>
                            <td><img loading="lazy"  class="img-md" src="{{ asset($product->thumbnail_img)}}" alt="Image"></td>
                            <td> @php echo \App\Category::where('id', $product->category_id)->first()->name; @endphp </td>
                            <td> @php echo \App\SubCategory::where('id', $product->subcategory_id)->first()->name; @endphp</td>
                            <td>{{ number_format($product->unit_price,2) }}</td>
                            <td><label class="switch">
                                <input onchange="update_published(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                            <td style="width: 150px;">
                            @if ($type == 'Seller')
                            <a href="{{route('products.seller.edit', encrypt($product->id))}}"> 
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"type="button"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                            </a>
                            @else
                            <a href="{{route('products.admin.edit', encrypt($product->id))}}"> 
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"type="button"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                            </a>
                            @endif
                            <a onclick="confirm_modal('{{route('products.destroy', $product->id)}}');"> 
                                <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon"type="button"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                            </a>
                            <a href="{{route('products.duplicate', $product->id)}}">
                                <button class="btn btn-warning dropdown-toggle dropdown-toggle-icon"type="button"> <i class="fa fa-files-o" aria-hidden="true"></i> </button>
                            </a>
                            </td> 
                        </tr> 
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection


@section('script')
    <script type="text/javascript">

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.todays_deal') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Todays Deal updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Published products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection
