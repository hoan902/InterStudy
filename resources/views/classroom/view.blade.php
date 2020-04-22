@extends('layouts.app')

@section('content')
<div id="app">
<chat :currentuser ="{{ Auth()->user() }}"></chat>
</div>

@endsection
