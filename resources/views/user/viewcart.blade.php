@extends('layouts.user')

@section('content')
<div class="main">
<div class="wrap">
<div class="featured-box featured-box-cart">
        <div class="box-content">
            <table class="table">
                    <thead>
                        <tr>
                            <th class="thumb-item-img">
                                    Item No
                            </th>
                            <th class="product-name">
                                    Product name
                            </th>
                            <th class="product-price">
                                    Price
                            </th>
                            <th class="product-quantity">
                                    Quantity
                            </th>
                            <th class="product-subtotal">
                                    SubTotal
                            </th>
                            <th class="product-remove">
                                    &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderdetails as $key => $data)
                            <tr class="cart_table_item">

                                    <td class="thumb-item-img">
                                            {{ ++$key }}
                                    </td>
                                    <td class="product-name">
                                            <a href="{{ url("/productdetails") }}/{{ $data->product_id }}">{{ $data->product->name }}</a>
                                    </td>
                                    <td class="product-price">
                                            <span class="amount">Rs {{ $data->product->price }}</span>
                                    </td>
                                    <td class="product-quantity">

                                            <div class="quantity">
                                                    {{ $data->quantity }}
                                            </div>

                                    </td>
                                    <td class="product-subtotal">
                                            <span class="amount">Rs {{ $data->product->price * $data->quantity }}</span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="#"
                                            onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                            <img src="/images/delete.png">
                                        </a>

                                        <form id="delete-form" action="{{ url('/deleteorder/') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="orderdetailid" value="{{ $data->id }}">
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                    </tbody>
            </table>
        </div>
</div>
</div></div>
<div class="clear"></div>
@endsection

