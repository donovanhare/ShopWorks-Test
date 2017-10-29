@extends('templates.default.default')
@section('title', 'Home')

@section('content')
    
    <table class="table">
        <thead>
            <tr>
                <th>Staff Name</th>
                @foreach($rotaDays as $rotaDay)
                    <th>day{{$rotaDay}}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach($rotaBreakdown as $staffid => $dayData)
                <tr>
                    <th>{{$staffid}}</th>
                @foreach($dayData as $daynumber => $rotaInfo)
                    @if(!$rotaInfo['dayoff'])
                        <th>{{$rotaInfo['starttime']}} - {{$rotaInfo['endtime']}}</th>
                    @else
                        <th>Day off</th>
                    @endif
                @endforeach
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection