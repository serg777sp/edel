@extends('layouts.adminmain')

@section('left')
    @if(!empty($reqcalls))
        <div class='orders_box'>
            <div class="panel panel-warning">
                <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> Заказанные звонки</div>
                <div class="panel-body">                    
                    <table class='table table-hover'>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th></th>
                        </tr>
                        @foreach($reqcalls as $reqcall)
                            <tr>
                                <td>{{$reqcall->id}}</td>
                                <td>{{$reqcall->guest_name}}</td>
                                <td>{{$reqcall->rq_phone}}</td>
                                <td>
                                    <a class='rqdel' href="#" data-id='{{$reqcall->id}}'>Удалить</a>
                                    @include('modal.adm.rqDel')
                                </td> 
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>    
        </div>
        <div class='pag'>
            {{ $reqcalls->render() }}
        </div> 
    @else
      Заказанных звонков нет
    @endif 
@stop
@section('right')
   @include('blocks.static_option')
@stop