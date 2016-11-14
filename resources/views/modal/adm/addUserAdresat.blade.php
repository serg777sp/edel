<div id='adresat-modal' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-black">Добавление получателя</h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    <form id='add-adr-form' class='form' method='post' action="{{ url('admin/user/adresat/add') }}/{{$user->id}}">
                        <div>
                            <label class="small">Имя Получателя:</label>
                            <input class="form-control" type='text' name='name' placeholder="Имя получателя">
                        </div>
                        <div>   
                            <label class="small">Фамилия Получателя:</label>
                            <input class="form-control" type='text' name='surname' placeholder="Фамилия получателя">
                        </div>
                        <div>   
                            <label class="small">Телефон (моб.):</label>
                            <input class="form-control" type='text' name='phone' placeholder="Телефон получателя">
                        </div> 
                        <div>  
                            <label class="small">Адрес:</label>
                            <textarea class="form-control" name='adress'></textarea>
                        </div>   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button form='add-adr-form' type='submit' class="btn btn-success">Добавить получателя</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>

