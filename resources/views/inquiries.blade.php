@extends('layouts.app')

@section('content')
  <div class="inquiries">

    <div class="status-view">
      <div class="page-title">お問合せ管理</div>
      <form action="/inquiries/filter" method="get" class="radioButtons" id="radioButtons">
        <div class="status">
          <input type="radio" id="pending" name="status" value="pending" 
            @if (isset($status) && $status == 'pending')
            {{'checked'}}
            @endif
          >
          <label for="pending">未対応</label>
        </div>
        <div class="status">
          <input type="radio" id="in-progress" name="status" value="in-progress" 
          @if (isset($status) && $status == 'in-progress')
          {{'checked'}}
          @endif
          >
          <label for="in-progress">対応中</label>
        </div>
        <div class="status">
          <input type="radio" id="done" name="status" value="done" 
          @if (isset($status) && $status == 'done')
          {{'checked'}}
          @endif
          >
          <label for="done">済</label>
        </div>
        <div class="status">
          <input type="radio" id="all" name="status" value="all"             
          @if (isset($status) && $status == 'all')
          {{'checked'}}
          @elseif(!isset($status))
          {{'checked'}}
          @endif
          >
          <label for="all">全て</label>
        </div>
      </form>
    </div>
  
    <div class="list-view">
      @foreach ($inquiries as $inquiry)
      <a href="/inquiries/{{$inquiry['id']}}" class="inquiry-card">
        <div class="table-row flex">
          <div class="table-detail">{{ $inquiry['subject']}}</div>
        </div>
        <div class="table-row flex">
          <div class="table-detail">{{ $inquiry['created_at']}}</div>
          <div class="table-detail">{{ $inquiry['name']}}<span> <</span>{{ $inquiry['email']}}<span>></span></div>
        </div>
        <div class="table-row flex inquiry-detail">
          @if (Str::length($inquiry['detail']) > 80)
          <div class="table-detail">
            {{ mb_substr($inquiry['detail'], 0, 80) }}<span>...</span>
          </div>
          @else
          <div class="table-detail">{{ $inquiry['detail'] }}</div>    
          @endif
        </div>
      </a>
      
          
      @endforeach

    </div>
  </div>


@endsection
@section('jsfile')

@endsection