@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('nav')
<nav>
    <form class="form" action="/logout" method="post">
        @csrf
        <button class="header-nav" type="submit">
            <a class="header-nav__link" href="/logout">logout</a>
        </button>
    </form>
</nav>
@endsection

@section('content')

<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>
  <form action="find" class="find-form" method="post">
    <div class="find-form__item">
      @csrf
      <input class="find-form__item-input" type="text" name="input" placeholder="名前やメールアドレスを入力してください" value="{{ $input??'' }}" />
      <select name="gender">
        <option value="" selected disabled>性別</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
        <option value="3">その他</option>
      </select>
      <select name="content" class="find-form__item-select">
        <option value="" selected disabled>選択してください</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->content }}</option>
        @endforeach
      </select>
      <input name="date" type="date" />
      <div class="find-form__search--button">
        <button class="find-form__button-submit" type="submit">検索</button>
      </div>
      <div class="find-form__reset--button">
        <button class="find-form__button-submit" type="reset">リセット</button>
      </div>
    </div>
  </form>
  <div class="admin-table__upper">
    <div class="admin-table__downroad">
      <button>
        <a href="/contacts/download">エクスポート</a>
      </button>
    </div>
    <div class="admin-table__page-link">{{$contacts->links('pagination::default')}}</div>
  </div>
  <div class="admin-table">
    <table class="admin-table__inner">
      <tr class="admin-table__row">
        <th class="admin-table__header">お名前</th>
        <th class="admin-table__header">性別</th>
        <th class="admin-table__header">メールアドレス</th>
        <th class="admin-table__header">お問い合わせの種類</th>
      </tr>
      @foreach ($contacts as $contact)
      <tr class="admin-table__row">
        <td class="admin-table__item">{{ $contact->first_name . '　' . $contact->last_name }}</td>
        <td class="admin-table__item">
          @if ($contact['gender'] == '1')
          男性
          @elseif ($contact['gender'] == '2')
          女性
          @elseif ($contact['gender'] == '3')
          その他
          @endif
        </td>
        <td class="admin-table__item">{{ $contact->email }}</td>
        <td class="admin-table__item"> {{ $contact->category->content }}</td>
        <td class="admin-table__item">
          <button class='admin-table__item--button' type="button">
            <a href="/delete/{{ $contact->id }}">詳細</a>
          </button>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection