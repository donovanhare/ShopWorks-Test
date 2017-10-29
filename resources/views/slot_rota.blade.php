@extends('templates.default.default')
@section('title', 'Home')

@section('content')
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Staff Name</th>
                @foreach($rotaDays as $rotaDay)
                    <th>Day {{$rotaDay}}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>

            @foreach($rotaBreakdown as $staffid => $dayData)
                <tr>
                    <th>{{$staffid}}</th>
                    @foreach($dayData as $daynumber => $rotaInfo)
                        @if(!$rotaInfo['dayoff'])
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
                    <th>{{$rotaHours[$rotaDay]['total']}}</th>
                @endforeach
            </tr>
        </tbody>

    </table>
@endsection