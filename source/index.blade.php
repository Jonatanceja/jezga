@extends('_layouts.main')

@section('body')
    @include('_partials.home.hero')
    @include('_partials.home.philosophy')
    @include('_partials.home.specialties')
    @include('_partials.home.monitor')
    @include('_partials.home.portfolio')
    @include('_partials.home.cta')
@endsection
