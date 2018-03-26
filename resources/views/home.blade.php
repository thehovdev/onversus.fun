@extends('index')

@section('pageTitle', 'Onversus Battle Home')
@section('facebook_meta')
<meta property="og:url"           content="{{ currentUrl() }}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Onversus Battle Homepage" />
<meta property="og:description"   content="Создай батл и проверь кто круче" />
<meta property="og:image"         content="<?php echo asset("images/opg_image.jpg")?>"/>
@endsection

@section('content')
<div class="row row-first">
    <div class="battlemainparent">
        <app-citate></app-citate>
        @foreach($battle as $item)
            <div class="col-md-4">
            <div class="versusparent" id="{{ $item->id }}">
                <div class="versusbody">
                    <div v-on:click="vote({{ $item->id }}, 'first_team_votes')" class="vsteam">
                        <img src="storage/images/{{ $item->first_team_img }}" class="vsteamimage">
                        <div class="team-name">{{ $item->first_team }}</div>
                        <div class="team-votes" ref="first_team_votes_{{ $item->id }}">{{ $item->first_team_votes }}</div>
                    </div>
                    <div class="versus">
                        VS
                    </div>
                    <div v-on:click="vote({{ $item->id}}, 'second_team_votes')" class="vsteam">
                        <img src="storage/images/{{ $item->second_team_img }}" class="vsteamimage">
                        <div class="team-name">{{ $item->second_team }}</div>
                        <div class="team-votes" ref="second_team_votes_{{ $item->id }}">{{ $item->second_team_votes }}</div>
                    </div>
                </div>
                <div class="versusmeta">
                    <a href="{{ route('battle.show', $item) }}">
                        <div class="commentsparent">
                        Комментировать
                    </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

        {{ $battle->links() }}
    </div>
</div>


<!-- <app-start></app-start> -->
<!-- <p>@{{ title }}</p>
<p>@{{ inputtext }}</p>
<p v-bind:class="style">@{{ style }}</p> -->
<!-- <div>@{{ value }}</div>
<div>@{{ doublevalue }}</div>
<div>@{{ message | lowercase }}</div>
<input tyle="text" value="" v-on:input="increment ($event.target.value)" />
<li v-for="car in cars">Модель @{{ car.model }}, Скорость @{{ car.speed }}</li> -->

@endsection
