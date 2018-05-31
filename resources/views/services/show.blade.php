@extends('layouts.master')

@section('meta_description', $service->meta_description)
@section('meta_keywords', $service->meta_keywords)
@section('title') @parent - {{ $service->name }}@endsection

@section('content')
    <section class="well1">
        <div class="container">
            <h2>{{ $service->name }}</h2>
            <p>{!! $service->description !!}</p>
            <hr>
        </div>
    </section>
@endsection
