@extends('layouts.main')

@section('left')
<div class='order_box center'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-ok"></span> Оплата</div>
        <div class="panel-body">   
            <h3>Ваш заказ оформлен</h3>
            <label>Номер заказа - {{$order->id}}</label>
            <a href="#">
                <button class="btn btn-block btn-success" type='button'>Оплатить заказ</button>
            </a>
            <a href="{{url('/')}}">
                <button class="btn btn-block btn-warning" type='button'>Позже</button>
            </a>
        </div>
    </div>    
</div>              
@endsection
@section('right')
   @include('blocks.catalog')
@endsection
