@extends('index')

@section('pageTitle', 'Onversus Battle Create')
@section('facebook_meta')
<meta property="og:url"           content="{{ currentUrl() }}" />
<meta property="og:type"          content="website" />
<meta property="og:description"   content="Onversus Battle" />
<meta property="og:title"         content="Создай батл и выясни кто круче" />
<meta property="og:image"         content="<?php echo asset("images/opg_image.jpg")?>"/>
@endsection


@section('content')

<div class="row row-first">
    <div class="col-md-6 col-md-offset-3">


        <form method="post" class="form-horizontal" action="{{ route('battle.store') }}"
        enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div class="col-sm-10">

                    <h1 class="text-center"><span style="color:#2c6ccc">on</span>versus </h1>

                    <hr>

                    <input type="text" class="text-center form-control" id="team1" placeholder="Команда 1" name="team1">
                    <input type="file" name="first_team_img" id="first_team_img">
                </div>
            </div>




            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" class="text-center form-control" value="VS" disabled>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" class="text-center form-control" id="team2" placeholder="Команда 2" name="team2">
                    <input type="file" name="second_team_img" id="second_team_img">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-create">Начать Батл !</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
