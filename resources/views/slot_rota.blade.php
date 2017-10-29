@extends('templates.default.default')
@section('title', 'Home')

@section('content')
    
    <table class="table">
        <thead>
            <tr>
                <th>Staff Name</th>
                @foreach($staffDays as $staffDay)
                    <th>day{{$staffDay}}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach($staffRotaBreakdown as $staffid => $dayData)
                <tr>
                    <th>{{$staffid}}</th>
                @foreach($dayData as $daynumber => $staffRotaTimes)
                    <th>{{$staffRotaTimes['starttime']}} - {{$staffRotaTimes['endtime']}}</th>
                @endforeach
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection