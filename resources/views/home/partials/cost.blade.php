<h5 class="mt-4 mb-2">
    Витрати |
    <code>
        <a href="{{route('cost.base_create')}}" style="color: red">дадати</a>
    </code>
</h5>
<div class="row">
    @if(!empty($costBase))
        @foreach($costBase as $item)
            <div class="col-md-3 col-sm-6 col-6 costItem" data-cost-id="{{$item->id}}">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="{{$item->icon}}"></i></span>

                    <div class="info-box-content">

                            <span class="info-box-text">
                                {!! $item->title !!}
                            </span>
                        <span class="info-box-number">{!! $item->total !!}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        @endforeach
    @endif
</div>
