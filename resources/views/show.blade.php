@extends('index')

@section('pageTitle', 'Onversus Battle Detail')
@section('facebook_meta')
<meta property="og:url"           content="{{ currentUrl() }}" />
<meta property="og:type"          content="website" />
<meta property="og:title"   content="{{ $battle->first_team }} vs {{ $battle->second_team }} - Кто Круче ?" />
<meta property="og:description"         content="Onversus Battle" />
<meta property="og:image"         content="<?php echo asset("images/opg_image.jpg")?>"/>
@endsection


@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


<div class="row row-first">
    <div class="battledetailparent">
        <div class="row">
            <div class="col-md-5">
                <div class="versusparent">
                    <div class="versusbody">
                        <div  v-on:click="vote({{ $battle->id }}, 'first_team_votes')" class="vsteam">
                            <img src="<?php echo asset("storage/images/$battle->first_team_img")?>" class="vsteamimage"></img>
                            <div class="team-name">{{ $battle->first_team }}</div>
                            <div class="team-votes" ref="first_team_votes_{{ $battle->id }}">{{ $battle->first_team_votes }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="versuscitate">
                    <span>VS</span>
                </div>
            </div>
            <div class="col-md-5">
                <div class="versusparent">
                    <div class="versusbody">
                        <div v-on:click="vote({{ $battle->id }}, 'second_team_votes')" class="vsteam">
                            <img src="<?php echo asset("storage/images/$battle->second_team_img")?>" class="vsteamimage"></img>
                            <div class="team-name">{{ $battle->second_team }}</div>
                            <div class="team-votes" ref="second_team_votes_{{ $battle->id }}">{{ $battle->second_team_votes }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">



            <div class="col-md-12 text-center">
                <!-- Your share button code -->
                <div class="fb-share-button"
                data-href="{{ currentUrl() }}"
                data-layout="button_count"
                data-size="large">
                </div>
            </div>

        <div class="fb-comments"  data-href="{{ currentUrl() }}" data-numposts="20" data-colorscheme="light" data-mobile="true" data-order-by="reverse_time"></div>

        </div>
    </div>
</div>


<!-- <div class="versus">
    VS
</div>
<div class="vsteam">
    <div>Mercedes</div>
    <div>1685</div>
</div> -->
@endsection
