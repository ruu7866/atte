@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__content">
  <div class="attendance__panel">

    <form class="attendance__button1" action="/work_start" method="post">
      @csrf
      <button class="attendance__button-submit" type="submit">勤務開始</button>
    </form>

    <form class="attendance__button2" action="/work_end" method="post">
      @csrf
      <button class="attendance__button-submit" type="submit">勤務終了</button>
    </form>

    <form class="attendance__button3" action="/rest_start" method="post">
      @csrf
      <button class="attendance__button-submit" type="submit">休憩開始</button>
    </form>

    <form class="attendance__button4" action="/rest_end" method="post">
      @csrf
      <button class="attendance__button-submit" type="submit">休憩終了</button>
    </form>

  </div>
</div>
@endsection