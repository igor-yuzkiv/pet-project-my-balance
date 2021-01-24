@extends('layouts.page')

@section('title', 'Додати джерело доходів')


@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-success">
                <div class="card-header">
                    <div class="card-title">
                        Додати джерело доходів
                    </div>
                </div>
                <div class="card-body">
                    @include('income.base.form', ['formAction' => route('income.base_save')])
                </div>
            </div>

        </div>
    </div>
@endsection
