@extends('layouts.app')

@section('title', 'Results')

@section('content')
    <h3>score1 = {{ $results->score1 }}</h3>
    <h3>score2 = {{ $results->score2 }}</h3>
@endsection