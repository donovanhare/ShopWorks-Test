@extends('templates.default.default')
@section('title', 'Home')

@section('content')

<h4 class="float-left">Slot Rota</h4>

    @include('slot-rota.components.filter')

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Staff Name</th>
                @foreach($rotaDays as $rotaDay)
                    <th>Day {{$rotaDay['daynumber']}}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>

            @foreach($rota as $staffid => $dayData)
                <tr class="staffRow" data-staffid={{$staffid}}>
                    <th>{{$staffid}}</th>
                    @foreach($dayData as $daynumber => $rotaInfo)
                        @if($rotaInfo['dayoff'] == 0)
                            <th>
                                <div class="row">
                                    <div class="col-sm times">{{$rotaInfo['starttime']}}</div>
                                    <div class="col-xs times">-</div>                                    
                                    <div class="col-sm times">{{$rotaInfo['endtime']}}</div>
                                </div>
                            </th>
                        @else
                            <th class="dayoff">Day off</th>
                        @endif
                    @endforeach
                </tr>
            @endforeach

            <tr class="totalRow table-info">
                <th>Total Hours</th>
                @foreach($rotaDays as $rotaDay)
                    <th>{{$rotaHours[$rotaDay['daynumber']]['total']}}</th>
                @endforeach
            </tr>
        </tbody>

    </table>
@endsection
