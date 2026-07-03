---
title: Nosotros
active: nosotros
---
@extends('_layouts.main')

@section('body')
    @include('_partials.about.foundation')
    @include('_partials.about.chronology')
    @include('_partials.about.values')
    @include('_partials.about.leadership')
    @include('_partials.about.cta')
@endsection
