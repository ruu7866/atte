@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
@endsection

@section('content')
  <div class="attendance-table">
    <table class="attendance-table__inner">
      <thead>
      <tr class="attendance-table__row">
        <th class="attendance-table__header">名前</th>
        <th class="attendance-table__header">勤務開始</th>
        <th class="attendance-table__header">勤務終了</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($dates as $date)
        <tr class="attendance-table__row">
          <td>{{ $date->name}}</td>
          <td>{{ \Carbon\Carbon::parse($date->start)->format('H:i:s')}}</td>
          <td>{{ \Carbon\Carbon::parse($date->end)->format('H:i:s')}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
