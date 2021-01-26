@extends('adminlte::page')


@section('title', 'Стрічка')

{{--Alerts--}}
@includeWhen( boolval($errors->any()), 'partials.alerts.errors', ['status' => 'complete'])
@includeWhen( session()->has('message'), 'partials.alerts.message', ['status' => 'complete'])
{{--====--}}


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="timeline">
                @foreach($timeLineData as $day_key => $day_item)
                        <div class="time-label">
                            <span class="bg-green">{{$day_key}}</span>
                        </div>

                        @foreach($day_item as $item)

                            @if ($item->getTable() == 'cost_log')
                                <div>
                                    <i class="fas fa-minus bg-red"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> {{$item->created_at->toDateTimeString()}}</span>
                                        <h3 class="timeline-header"><strong style="color: red">Витрати </strong> {!! $item->costBase[0]->title !!} <strong>- {{$item->sum}} {{$item->costBase[0]->currency}}</strong> </h3>
                                    </div>
                                </div>
                            @else
                                <div>
                                    <i class="fas fa-plus bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> {{$item->created_at->toDateTimeString()}}</span>
                                        <h3 class="timeline-header"><strong style="color: blue">Дохід</strong> {{$item->incomeBase[0]->title}} <strong>+ {{$item->sum}} {{$item->incomeBase[0]->currency}}</strong> </h3>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                @endforeach
                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>

@endsection
