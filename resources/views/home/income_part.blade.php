<h5 class="mb-2">Джерела доходу/Сховища |
    <code>
        <a href="{{route('income.base_create')}}" style="color: red">дадати</a>
    </code>
</h5>
<div class="row">
    @if(!empty($incomeBase))
        @foreach($incomeBase as $item)
            <div class="col-md-3 col-sm-6 col-6 incomeItem" data-income-id="{{$item->id}}" data-title="{!! $item->title !!}">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="{{$item->icon}}"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{$item->title}}</span>
                        <span class="info-box-number">{{$item->total}} {{$item->currency}}</span>
                    </div>

                {{--<div class="info-box-more">
                    <a href="#" class="btn btn-warning"><i class="fa fa-plus-circle"></i></a>
                    <a href="{{route('income.base_edit', $item['id'])}}" class="btn btn-warning"><i
                            class="fa fa-pen"></i></a>
                </div>--}}
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endforeach
    @endif
</div>
