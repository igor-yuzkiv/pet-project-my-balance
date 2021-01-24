@extends('layouts.page')

@section('title', 'Додати тип витрат')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <div class="card-title">
                        Додати тип витрат
                    </div>
                </div>
                <div class="card-body">
                    @include('cost.base.form', ['formAction' => route('cost.base_store')])
                </div>
            </div>
        </div>
    </div>
@endsection
