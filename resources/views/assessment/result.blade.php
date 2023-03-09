@extends('layouts.app')

@section('title', 'Results')

@section('content')
    <h3> Your scores were: </h3>
    <p>score1 = {{ $data['results']['score1'] }} and score2 = {{ $data['results']['score2'] }}</p>
    <br>
    <table>
        <h3>Average scores:</h3>
        <tr>
            <th>Question 1</th>
            <th>Question 2</th>
        </tr>
        <tr>
            <td>{{ $data['average_scores']['score1_avg'] }}</td>
            <td>{{ $data['average_scores']['score2_avg'] }}</td>
        </tr>
    </table>
@endsection