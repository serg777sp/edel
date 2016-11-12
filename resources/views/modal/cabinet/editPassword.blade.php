<div id='edit-pass-modal' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-black">Изменение пароля</h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    <form id='edit-pass-form' class='form' method='post' action="{{ url('cabinet/password/edit') }}">
                        <div>
                            <label class="small">Старый пароль:</label>
                            <input class="form-control" type='password' name='oldpass' placeholder="Страрый пароль" required>
                        </div>
                        <div>   
                            <label class="small">Пароль:</label>
                            <input class="form-control" type='password' name='password' placeholder="Новый пароль" required>
                        </div>
                        <div>   
                            <label class="small">Подтверждение пароля:</label>
                            <input class='form-control' name="password_confirmation" type='password' placeholder="Confirm password" required>
                        </div>    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button class="btn btn-success" form="edit-pass-form" type='submit'>Изменить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>
