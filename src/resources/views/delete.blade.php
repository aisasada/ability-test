<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="modal__container">
        <div class="modal-body">
            <button type="button" class="modal-close"><span class="round_btn"></span></button>
        </div>
        <div class="delete__content">
            <form action="/delete" class="form" method="POST">
                @csrf
                <div class="delete-table">
                    <table class="delete-table__inner">
                        <tr class="delete-table__row">
                            <th class="delete-table__header">お名前</th>
                            <td class="delete-table__text">
                                <input type="text" value="{{ $contact['first_name']. ' '. $contact['last_name'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="delete-table__row">
                            <th class="delete-table__header">性別</th>
                            <td class="delete-table__text">
                                <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
                                @if ($contact['gender'] == '1')
                                男性
                                @elseif ($contact['gender'] == '2')
                                女性
                                @elseif ($contact['gender'] == '3')
                                その他
                                @endif
                            </td>
                        </tr>
                        <tr class="delete-table__row">
                            <th class="delete-table__header">メールアドレス</th>
                            <td class="delete-table__text">
                                <input type="text" name="email" value="{{ $contact['email'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="delete-table__row">
                            <th class="delete-table__header">電話番号</th>
                            <td class="delete-table__text">
                                <input type="text" value="{{ $contact['tell'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="delete-table__row">
                            <th class="delete-table__header">住所</th>
                            <td class="delete-table__text">
                                <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="delete-table__row">
                            <th class="delete-table__header">建物名</th>
                            <td class="delete-table__text">
                                <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="delete-table__row">
                            <th class="delete-table__header">お問い合わせの種類</th>
                            <td class="delete-table__text">
                                <input type="text" name="content" value="{{ $contact['content'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="delete-table__row">
                            <th class="delete-table__header">お問い合わせ内容</th>
                            <td class="delete-table__text">
                                <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">削除</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
</body>
</html>