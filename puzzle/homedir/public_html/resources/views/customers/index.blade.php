@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <!-- <a href="{{ route('sellers.create')}}" class="btn btn-info pull-right">{{__('add_new')}}</a> -->
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Customers')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('დასახელება')}}</th>
                    <th>{{__('საიდენტიფიკაციო')}}</th>
                    <th>{{__('ელ.ფოსტა')}}</th>
                    <th>{{__('ტელეფონი')}}</th>
                    <th>{{__('მისამართი')}}</th>
                    <th>{{__('სტატუსი')}}</th>
                    <th width="10%">{{__('მოქმედება')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$customer->user["name"]}}</td>
                        <td>{{$customer->user["usertype_id"]}}</td>
                        <td>{{$customer->user["email"]}}</td>  
                        <td>{{$customer->user["phone"]}}</td>
                        <td>{{$customer->user["address"]}}</td>
                        <td>{{$customer->user["status"]}}</td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a onclick="confirm_modal_status('{{route('customers.statusthree', $customer->user_id)}}');">{{__('Status Three')}}</a></li>
                                    <li><a onclick="confirm_modal_status('{{route('customers.statustwo', $customer->user_id)}}');">{{__('Status Two')}}</a></li>
                                    <li><a onclick="confirm_modal_status('{{route('customers.statuszero', $customer->user_id)}}');">{{__('Status Zero')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('customers.destroy', $customer->id)}}');">{{__('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
