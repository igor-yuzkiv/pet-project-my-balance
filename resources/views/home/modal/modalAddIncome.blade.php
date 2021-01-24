<div class="modal fade" id="modalAddIncome">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Нарахувати дохід | <strong id="modalAddIncomeTitle"></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('income_log.addIncome')}}">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="income_base_id" id="income_base_id" value=""/>

                    <div class="form-group">
                        <label for="">Сума</label>
                        <input type="number" class="form-control" name="sum" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" id="modalAddIncomeCancel">Відмінити</button>
                    <button type="submit" class="btn btn-primary">Підтвердити</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('js')

    <script>
        $(function () {
            $("#modalAddIncomeCancel").click(function () {
                location.reload()
            })
        })
    </script>

@endpush
