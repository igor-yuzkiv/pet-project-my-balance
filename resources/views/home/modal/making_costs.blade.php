<div class="modal fade" id="modalMakingCosts">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Трата | <strong id="modalMakingCostsTitle"></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('cost_log.makingCosts')}}">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="cost_base_id" id="cost_base_id" value=""/>
                    <input type="hidden" name="income_base_id" id="income_base_id" value=""/>

                    <div class="form-group">
                        <label for="">Сума</label>
                        <input type="number" class="form-control" name="sum" required>
                    </div>

                    {{--<div class="form-group">
                        <label for="">Дата</label>
                        <input type="text" class="form-control" name="created_at" id="created_at" required>
                    </div>--}}

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" id="modalMakingCostsCancel">Відмінити</button>
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
            showDataPicker('#modalMakingCosts #created_at')

            $("#modalMakingCostsCancel").click(function () {
                location.reload()
            })

        })
    </script>

@endpush
