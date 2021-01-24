<form method="{{$formMethod ?? "POST"}}" action="{{$formAction}}">
    @csrf
    @if(isset($formValue['id']))
        <input type="hidden" name="id" value="{{$formValue['id']}}">
    @endif

    <div class="form-group">
        <label for="">Назва</label>
        <input type="text" class="form-control" name="title" value="{{$formValue['title'] ?? ''}}" required>
    </div>

    <div class="form-group">
        <label for="">Іконка</label>
        <input type="text" class="form-control" name="icon" value="{{$formValue['icon'] ?? ''}}" required>
    </div>

    <div class="form-group">
        <label for="">Залишок</label>
        <input type="number" class="form-control" name="total" value="{{$formValue['total'] ?? ''}}" required>
    </div>

    <div class="form-group">
        <label>Валюта</label>
        <select class="form-control select2" name="currency" required style="width: 100%;">
            @foreach(config('my_balance.currency') as $key => $item)
                <option
                    value="{{$key}}"
                    @if (isset($formValue['currency']) AND $formValue['currency'] == $item)
                        selected=""
                    @endif
                >
                    {{$item}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="form-control btn btn-success">Зберегти</button>
    </div>

</form>
