@extends('layouts.page')

@section('title', 'Редагувати тип витрат')
@section('plugins.Inputmask', true)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <div class="card-title">
                        Редагувати тип витрат
                    </div>
                </div>
                <div class="card-body">
                    @include('cost.base.form', ['formAction' => route('cost.base_update')])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent

    <script>
        $(function () {
            $('.moneyInputMask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        });
    </script>

@endsection
