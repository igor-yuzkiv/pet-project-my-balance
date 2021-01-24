<div class="row">
    <div class="col-md-12">
        <div class="card collapsed-card">
            <div class="card-header">
                <h5 class="card-title">Курс валют</h5>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <table class="table table-striped table-valign-middle">
                        <tbody>
                        <tr>
                            @foreach($exchangeRate as $item)
                                <td> {{$item->ccy}} <strong>{{$item->sale}}</strong> </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
