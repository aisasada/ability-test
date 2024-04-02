@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
  <div class="admin-table">
    <table class="admin-table__inner">
      <tr class="admin-table__row">
        <th class="admin-table__header">お名前</th>
        <th class="admin-table__header">性別</th>
        <th class="admin-table__header">メールアドレス</th>
        <th class="admin-table__header">お問い合わせの詳細</th>
      </tr>
      <tr class="admin-table__row">
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>
        <td class="admin-table__item">商品の交換について</td>
        <td class="admin-table__item">
          <button class='admin-table__item--button' id="button" type="submit">
            <a href=""></a>詳細</button>

        </td>
      </tr>
    </table>
  </div>
</div>
@endsection