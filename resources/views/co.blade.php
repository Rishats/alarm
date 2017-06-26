@extends('layouts.appfunc')

@section('headerappfunc')
<h1>CO</h1>
<p>Alarm System</p>
@endsection

@section('contentappfunc')
<div id="co1">
    <h1 id="textmonitoring2">Датчик CO.</h1>
    <canvas id="scripted-gauge"></canvas>
</div>

<script type="text/javascript" src="js/coself.js"></script>

@endsection