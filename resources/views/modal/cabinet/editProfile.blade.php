<div id='profile-edit-modal' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-black">Редакитрование личных данных</h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    <form id='profile-edit-form' class='form' method='post' action="{{ url('cabinet/edit') }}">
                        <div>
                            <label class="small">Имя:</label>
                            <input class="form-control" type='text' name='name' value="{{Auth::user()->name}}">
                        </div>
                        <div>   
                            <label class="small">Фамилия:</label>
                            <input class="form-control" type='text' name='surname' value="{{Auth::user()->surname}}">
                        </div>
                        <div>   
                            <label class="small">Телефон (моб.):</label>
                            <input class="form-control" type='text' name='phone' value="{{Auth::user()->phone}}">
                        </div> 
                        <div>  
                            <label class="small">Адрес:</label>
                            <textarea class="form-control" name='adress'>{{Auth::user()->adress}}</textarea>
                        </div>   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button class="btn btn-success" form="profile-edit-form" type='submit'>Сохранить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>