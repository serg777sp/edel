<div class='catalog'>
    <h4>Сортировка</h4>
    <form class="form form-group form-sort">
        <label>По ценам</label>
        <div>
            <div class="inline_box">
                <div class="input-group">
                    <span class="input-group-addon b-green">от</span>
                    <input type="text" name='ot' class="form-control i-ot" placeholder="Сумма">
                </div>
                <input oninput="onchangePrice('ot')" data-type='ot' class='i-range' type="range" min="0" max="10000" step="50" value="1000">
            </div>
            <div class="inline_box">
                <div class="input-group">
                    <span class="input-group-addon b-red">до</span>
                    <input type="text" name='do' class="form-control i-do" placeholder="Сумма">
                </div>
                <input oninput="onchangePrice('do')" data-type='do' class='i-range' type="range" min="0" max="10000" step="50" value="2000">
            </div>    
        </div>    
        <button class="btn btn-success i-sort">Показать</button>
        <button class="btn btn-danger i-sort" data-type='reset'>Сброс</button>
    </form>    
</div>
        
