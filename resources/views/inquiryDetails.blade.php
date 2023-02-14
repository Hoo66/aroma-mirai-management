@extends('layouts.app')

@section('content')
<main>
  <div class="inquiry-details">
    <div class="subject flex">
      <p class="p-header">件名</p>
      <p class="p-content">{{ $inquiry['subject'] }}</p>
    </div>
    <div class="name flex">
      <p class="p-header">お名前</p>
      <p class="p-content">{{ $inquiry['name']}}</p>
    </div>
    <div class="email flex">
      <p class="p-header">Email</p>
      <p class="p-content">{{ $inquiry['email']}}</p>
    </div>
    <div class="created_at flex">
      <p class="p-header">受信日時</p>
      <p class="p-content">{{ $inquiry['created_at']}}</p>
    </div>
    <div class="detail">
      <p class="p-header">内容</p>
      <pre class="p-content">{{$inquiry['detail']}}</pre>
    </div>
    <button id="delete-inquiry" class="delete-inquiry">削除</button>
  </div>

  {{-- モーダル start --}}
  <div class="delete-inquiry-modal hideModal close-modal">
      <div class="close-modal close-modal-button">X</div>
      <div class="modal-inner">
        <p class="modal-text">削除してもよろしいですか？</p>
        <form action="/inquiries/{{ $inquiry->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button>削除</button>
        </form>
      </div>
  </div>
  {{-- モーダル end --}}

  <div class="inquiry-manage-form">
    <form action="/inquiries/{{ $inquiry->id }}" method="POST">
      @csrf
      <p class="label-for-status">ステータス：</p>
      <div class="status-view">
        <div class="radioButtons">
          <div class="status">
            <input type="radio" id="pending" name="status" value="pending" {{ ($inquiry->status == "pending")? "checked" : "" }}>
            <label for="pending">未対応</label>
          </div>
          <div class="status">
            <input type="radio" id="in-progress" name="status" value="in-progress" {{ ($inquiry->status == "in-progress")? "checked" : "" }}>
            <label for="in-progress">対応中</label>
          </div>
          <div class="status">
            <input type="radio" id="done" name="status" value="done" {{ ($inquiry->status == "done")? "checked" : "" }}>
            <label for="done">済</label>
          </div>
        </div>
      </div>
  
      <label for="memo">メモ：</label>
      <textarea name="memo" class="memo">{{$inquiry['memo']}}</textarea>
      <input type="submit" value="保存" class="save-button">
    </form>
  </div>

  <div class="return-top">
    <a href="/inquiries">お問い合わせ管理Topへ戻る</a>
  </div>
</main>

@endsection

