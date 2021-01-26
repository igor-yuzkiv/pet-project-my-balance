@extends('adminlte::page')

@section('plugins.JqueryUI', true)
@section('plugins.Sweetalert2', true)
@section('plugins.daterangepicker', true)
@section('plugins.Scripts', true)

@section('title', 'Головна')

{{--Alerts--}}
@includeWhen( boolval($errors->any()), 'partials.alerts.errors', ['status' => 'complete'])
@includeWhen( session()->has('message'), 'partials.alerts.message', ['status' => 'complete'])
{{--====--}}


<style>
    .ui-drag-hover .info-box-text {
        color: black;
        font-weight: 900;
    }
</style>

@section('content')

    @include('home.partials.exchange_rate')
    @include('home.partials.info')

    <!-- =========================================================== -->
    <div class="card card-default">
        <div class="card-body">

            @include("home.partials.income")
            @include("home.partials.cost")

        </div>
    </div>
@stop

@include("home.modal.making_costs")
@include("home.modal.add_income")

@push('js')
    <script>
        $(function () {
            $('#addIncomeBlock').draggable({revert: true});
            $('.incomeItem').draggable({revert: true});
        });

        $(".incomeItem").droppable({
            accept: '#addIncomeBlock',
            classes: {
                "ui-droppable-hover": "ui-drag-hover"
            },
            drop: function (event, ui) {
                let incomeId = $(this).attr('data-income-id');
                let title = $(this).attr('data-title');

                $("#modalAddIncome #income_base_id").val(incomeId)
                $("#modalAddIncome #modalAddIncomeTitle").html(title)

                $("#modalAddIncome").modal();
            }
        });

        $(".costItem").droppable({
            accept: '.incomeItem',
            classes: {
                "ui-droppable-hover": "ui-drag-hover"
            },
            drop: function (event, ui) {
                let costId = $(this).attr('data-cost-id');
                let incomeId = $(ui.draggable).attr('data-income-id');
                modalMakingCosts(incomeId, costId)
            }
        });

        function modalMakingCosts(incomeId, costId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "<?php echo e(route("home.getMakingCostsData")); ?>",
                type: "POST",
                data: {
                    incomeId: incomeId,
                    costId: costId
                },
                error: function (errors) {
                    let errorMessage = "";

                    if (errors.responseJSON !== undefined) {
                        errors = errors.responseJSON.errors;
                        Object.values(errors).forEach((error) => {
                            error.map((item) => {
                                errorMessage += '<span class="errorItem">' + item + '</span> <br/>';
                            })
                        });
                    } else {
                        errorMessage = "Something wrong :(, try later again!!!"
                    }

                    alertError(errorMessage);
                },
                dataType: "json",
                success: function (data) {
                    $("#modalMakingCostsTitle").html(data.income.title + ' - ' + data.cost.title)
                    $("#modalMakingCosts #cost_base_id").val(data.cost.id)
                    $("#modalMakingCosts #income_base_id").val(data.income.id)

                    $("#modalMakingCosts").modal();
                }
            })
        }

    </script>
@endpush
