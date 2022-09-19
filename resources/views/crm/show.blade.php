@extends('layouts.main')

@section('title', '観客詳細画面')

@section('content')

    <h1>観客詳細画面</h1>

    <table class="table">
        <thead>
            <tr>
                <th>観客ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>郵便番号</th>
                <th>住所</th>
                <th>電話番号</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ $crm->id }}</td>
                <td>{{ $crm->name }}</td>
                <td>{{ $crm->email }}</td>
                <td>{{ $crm->zipcode }}</td>
                <td>{{ $crm->address }}</td>
                <td>{{ $crm->tel }}</td>
            </tr>
        </tbody>

    </table>

    <a href="{{ route('crm.edit', $crm->id) }}" class="block">編集画面</a>
    <form action="{{ route('crm.destroy', $crm->id) }}" id="form_recipe" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除する" id="btn" class="block">
    </form>
    <script src="{{ asset('/js/index.js') }}"></script>
    <a href="{{ route('crm.index') }}" class="block">一覧に戻る</a>

@endsection
