@extends('layouts.app')

@section('content')
    <div id="calendar">
        <h1>Calendrier des fêtes en Suisse</h1>
        <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Événement</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($holidays as $holiday)
                <tr>
                    <td>{{ $holiday['date'] }}</td>
                    <td>{{ $holiday['name'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
