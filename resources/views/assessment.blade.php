@extends('layouts.app')

@section('title', 'Psychology assessment')

@section('content')
<div class='questionnaire'>
    <h2>What do you think about the following statements?</h2>
        
    <!-- <div class="likert-scale">
            <p>I enjoy sunshine</p>
            <ul class="likert">
            <li> Disagree </li>
            <li><input type="radio" name="sunshine" value="1" /></li>
            <li><input type="radio" name="sunshine" value="2" /></li>
            <li><input type="radio" name="sunshine" value="3" /></li>
            <li><input type="radio" name="sunshine" value="4" /></li>
            <li><input type="radio" name="sunshine" value="5" /></li>
            <li> Agree </li>
            </ul>
            </br>
    </div> -->

    <form name="likert-scale" method="post" action="{{ url('/submit-form') }}">
        @csrf
        <div class="questions">
            <ul class="q1">
                <h3>Do you like sunshine?</h3>
                <li> Disagree </li>
                <li><input type="radio" name="sunshine" value="1" /></li>
                <li><input type="radio" name="sunshine" value="2" /></li>
                <li><input type="radio" name="sunshine" value="3" /></li>
                <li><input type="radio" name="sunshine" value="4" /></li>
                <li><input type="radio" name="sunshine" value="5" /></li>
                <li> Agree </li>
            </ul> 
            <br>

            <ul class="q1">
                <h3>Do you like potatoes?</h3>
                <li> Disagree </li>
                <li><input type="radio" name="potato" value="1" /></li>
                <li><input type="radio" name="potato" value="2" /></li>
                <li><input type="radio" name="potato" value="3" /></li>
                <li><input type="radio" name="potato" value="4" /></li>
                <li><input type="radio" name="potato" value="5" /></li>
                <li> Agree </li>
            </ul> 
            <br>

        </div>


        <br>
        <button type="submit" name="submit">Submit</button>
    </form>


</div>
@endsection