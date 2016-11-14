 <div id='editSet' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-black">Редактирование настроики </h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    <form id='edit-set-form' class='form' method='post' action="{{ url('admin/setting/update') }}">
                        <h4 class="set_name"></h4>
                        <div>   
                            <label class="small">Значение:</label>
                            <input class="form-control set_val" type='text' name='set'>
                        </div>   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name='set_id' value="0">
                    </form>
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button form="edit-set-form" type="submit" class="btn btn-success">Сохранить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>
