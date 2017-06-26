@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alarm System</div>

                <div class="panel-body">
                    Войдите в систему
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('contentusers')
<div id="wrap">
  <input id="toggle" type="checkbox"/>
  <div class="toolchest">
    <div class="tool" id="tool-home">
      <p><span>Главная</span></p>
    </div>
    <div class="tool" id="tool-about">
      <p><span>Температура</span></p>
    </div>
    <div class="tool" id="tool-contact">
      <p><span>CO</span></p>
    </div>
    <div class="tool" id="tool-news">
      <p><span>Мониторинг</span></p>
    </div>
    <div class="tool" id="tool-gallery">
      <p><span>Уведомления</span></p>
    </div>
    <div class="tool" id="tool-games">
      <p><span>Управление</span></p>
    </div>
    <div class="tool" id="tool-links">
      <p><span>Адресаты</span></p>
    </div>
    <div class="tool" id="tool-subscribe">
      <p><span>Документация</span></p>
    </div>
    <div class="tool" id="tool-account">
      <p><span>Выйти</span></p>

    </div>
  </div>
  <div class="plate"></div><a class="wedge" id="wedge-home" href="home" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-home p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-home p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-home"></i></a><a class="wedge" id="wedge-about" href="temperature" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-about p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-about p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-thermometer-quarter"></i></a><a class="wedge" id="wedge-contact" href="co" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-contact p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-contact p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-tachometer"></i></a><a class="wedge" id="wedge-news" href="monitoring" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-news p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-news p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-bar-chart"></i></a><a class="wedge" id="wedge-gallery" href="warning" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-gallery p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-gallery p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-exclamation-circle"></i></a><a class="wedge" id="wedge-games" href="/controlpanel" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-games p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-games p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-microchip"></i></a><a class="wedge" id="wedge-links" href="addressees" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-links p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-links p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-life-ring"></i></a><a class="wedge" id="wedge-subscribe" href="documentation" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-subscribe p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-subscribe p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-question-circle"></i></a><a class="wedge" id="wedge-account" href="logoutmy" onmouseover="if( $('#wrap input').is(':checked') ) $('#tool-account p').css({'top':-10,'opacity':1})" onmouseout="if( $('#wrap input').is(':checked') ) $('#tool-account p').css({'top':'120px','opacity':0})">
    <svg></svg><i class="fa fa-power-off"></i></a>
  <label class="dot" for="toggle">
    <svg id="svglogo" xmlns="http://www.w3.org/2000/svg" version="1.1" pagealignment="none" x="0" y="0" width="353.55339" height="353.55339" viewbox="0 0 500 500" enable-background="new 0 0 353.55339 353.55339" xml:space="preserve" bodybackgroundcolor="rgba(255,0,0,0)">
      <rect x="0" y="0" width="500" height="500" fill="none"></rect>
      <g type="LAYER" name="workspace" locked="true">
        <g type="LAYER" name="Layer 01">
          <path class="circle" transform="matrix(1 0 0 1 255.4278416347392 223.4993614303981)" width="491.7" height="489.1" stroke-miterlimit="3" d="M-252.4 27.4C-252.4-107.7-142.4-217.2-6.6-217.2 129.2-217.2 239.3-107.7 239.3 27.4 239.3 162.5 129.2 272-6.6 272 -142.4 272-252.4 162.5-252.4 27.4Z"></path>
          <path class="ow" transform="matrix(1 0 0 1 20.434227330779322 57.47126436781617)" width="472" height="469.5" stroke-miterlimit="3" d="M169.2 421.3C119.9 406.4 49.6 375.8 10.7 284.5 -28.3 193.1 1.1 96.1 42 48.8 82.8 1.6 127.5-34.8 208.6-41.2 289.7-47.6 319.9-5.6 327.5 63.4 337.9 210.7 310.2 349.2 212.2 380.3 244 388.4 273.8 388.1 295.4 383.8 278.9 401.8 252 414.7 210 428.1 293.6 432.6 355 398.8 390 364.9 425.1 331.1 484.3 254.2 458.2 137.8"></path>
        </g>
      </g>
    </svg><span class="title">Меню</span>
  </label>
@endsection
