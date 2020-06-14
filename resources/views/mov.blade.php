@extends('layouts.app')
@section('content')

<style>
    html,
    body,
    .lt-grid-container {
        height: 100%;
        margin: 0;
    }

    .lt-grid-container {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-template-rows: repeat(3, 1fr);
        gap: 1% 1%;
        grid-template-areas: "info1 mov-description mov-description lt-pics lt-pics lt-pics lt-pics""lt-info2 mov-description mov-description lt-pics lt-pics lt-pics lt-pics""lt-info3 mov-description mov-description lt-pics lt-pics lt-pics pics"
    }

    .lt-info3 {
        grid-area: lt-info3;
    }

    .lt-mov-description {
        grid-area: lt-mov-description;
    }

    .lt-pics {
        grid-area: lt-pics;
    }

    .lt-info2 {
        grid-area: lt-info2;
    }

    .lt-info1 {
        grid-area: lt-info1;
    }

    /* For presentation only, no need to copy the code below */
    .lt-grid-container * {
        border: 1px solid red;
        position: relative;
    }

    .lt-grid-container *:after {
        content: attr(class);
        position: absolute;
        top: 0;
        left: 0;
    }
</style>

<div class="lt-grid-container">
    <div class="lt-info3"></div>
    <div class="lt-mov-description"></div>
    <div class="lt-pics"></div>
    <div class="lt-info2"></div>
    <div class="lt-info1"></div>
</div>

@endsection