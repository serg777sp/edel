 <div id='rqDel{{$reqcall->id}}' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-black">Подтвердите удаление</h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    Вы действительно хотите удалить?
                    <a href="{{ url('admin/reqcall/del')}}/{{$reqcall->id}}">
                        <button type="button" class="btn btn-danger">Да</button>
                    </a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Нет</button>
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>
