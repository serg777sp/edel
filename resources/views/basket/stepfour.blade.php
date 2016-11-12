@extends('layouts.main')

@section('left')
                <div class='order_box'>
                    <div class="panel panel-warning">
                        <div class="panel-heading"><span class="glyphicon glyphicon-thumbs-up"></span> Подтверждение данных</div>
                        <div class="panel-body">
                            Проверте правельность данных заказа и если все поля верны подтвердите нажатием кнопки<br>
                            <!--Изменение получателя-->
            <!--                <a class='js_link stepfour'>Изменить получателя</a>-->
                                <button class="btn btn-block btn-default editOrder" data-modal="editAdresat">Изменить получателя</button>
                                @include('modal.order.editAdresat')
                            <!--Изменение Адрес или время-->
            <!--                <a class='js_link stepfour'>Изменить Адрес или время</a>-->
                                <button class='btn btn-block btn-default editOrder' data-modal='editAdressAndTime'>Изменить адрес или время</button>
                                @include('modal.order.editAdressAndTime')
                            <!--Изменение Контактные данные-->
            <!--                <a class='js_link stepfour'>Изменить Контактные данные</a>-->
                                <button class="btn btn-block btn-default editOrder" data-modal='editContactData'>Изменить контактные данные</button>
                                @include('modal.order.editContactData')
                                <button class="btn btn-block btn-success" id="confim_but">Подтвердить данные</button>
                        </div>
                    </div>    
                </div>
    @include('blocks.order')                
@endsection
@section('right')
   @include('blocks.catalog')
@endsection
