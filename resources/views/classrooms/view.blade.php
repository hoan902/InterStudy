@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
<div id="app">
<chat :currentuser ="{{ Auth()->user() }}"></chat>
</div>

@endsection
