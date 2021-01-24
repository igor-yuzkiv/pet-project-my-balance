@extends('layouts.page')

@section('title', 'Редагувати джерело доходів')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-success">
                <div class="card-header">
                    <div class="card-title">
                        Редагувати джерело доходів
                    </div>
                </div>
                <div class="card-body">
                    @include('income.base.form', ['formAction' => route('income.base_save'), 'formValue' => $formValue])
                </div>
            </div>

        </div>
    </div>
@endsection
