@extends('layouts.app')

@section('content')
<style>
    html,
    body,
    .grid-container {
        height: 100%;
        margin: 0;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 0.9fr 1fr 1fr 1fr;
        grid-template-rows: 0.4fr 1fr 1fr;
        gap: 1px 1px;
        grid-template-areas: "info description pics pics""info description pics pics""info description pics pics";
    }

    .info {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 0.2fr 0.8fr 0.8fr 0.8fr;
        gap: 3% 3%;
        grid-template-areas: "info-title""info1""info2""info3";
        grid-area: info;
    }

    .info1 {
        grid-area: info1;
    }

    .info2 {
        grid-area: info2;
    }

    .info3 {
        grid-area: info3;
    }

    .info-title {
        grid-area: info-title;
    }

    .description {
        display: grid;
        grid-template-columns: 0.9fr;
        grid-template-rows: 0.2fr 0.8fr 0.8fr 0.8fr;
        gap: 3% 3%;
        grid-template-areas: "desc-title""desc1""desc2""desc3";
        grid-area: description;
    }

    .desc2 {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
        gap: 1px 1px;
        grid-area: desc2;
    }

    .desc3 {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
        gap: 1px 1px;
        grid-template-areas: ".";
        grid-area: desc3;
    }

    .desc1 {
        grid-area: desc1;
    }

    .desc-title {
        grid-area: desc-title;
    }

    .pics {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 0.2fr 1.4fr 1.4fr;
        gap: 5% 5%;
        grid-template-areas: "pic-title pic-title""pic1 pic2""pic3 pic4";
        grid-area: pics;
    }

    .pic1 {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
        gap: 1px 1px;
        grid-template-areas: "nn";
        grid-area: pic1;
    }

    .pic2 {
        grid-area: pic2;
    }

    .pic3 {
        grid-area: pic3;
    }

    .pic4 {
        grid-area: pic4;
    }

    .pic-title {
        grid-area: pic-title;
    }

    /* For presentation only, no need to copy the code below */
    .grid-container * {
        border: 1px solid red;
        position: relative;
    }

    .grid-container *:after {
        content: attr(class);
        position: absolute;
        top: 0;
        left: 0;
    }
</style>

<div class="grid-container">
    <div class="info">
        <div class="info1"></div>
        <div class="info2"></div>
        <div class="info3"></div>
        <div class="info-title"></div>
    </div>
    <div class="description">
        <div class="desc1"></div>
        <div class="desc2"></div>
        <div class="desc3"></div>
        <div class="desc-title"></div>
    </div>
    <div class="pics">
        <div class="pic1"></div>
        <div class="pic2"></div>
        <div class="pic3"></div>
        <div class="pic4"></div>
        <div class="pic-title"></div>
    </div>
</div>

@endsection