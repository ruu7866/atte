@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__content">
  <div class="attendance__panel">
    <form class="attendance__button1">
      <button class="attendance__button-submit" type="submit">勤務開始</button>
    </form>
    <form class="attendance__button2">
      <button class="attendance__button-submit" type="submit">勤務終了</button>
    </form>
    <form class="attendance__button3">
      <button class="attendance__button-submit" type="submit">休憩開始</button>
    </form>
    <form class="attendance__button4">
      <button class="attendance__button-submit" type="submit">休憩終了</button>
    </form>
  </div>
</div>
@endsection