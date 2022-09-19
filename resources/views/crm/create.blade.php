@extends('layouts.main')

@section('title', '新規登録画面')

@section('content')

    <h1>新規登録画面</h1>

    {{-- エラーメッセージの表示 --}}
    @if ($errors->any())
        <div class="error">
            <p>{{ count($errors) }}件のエラーがあります。</p>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('crm.store') }}" method="post">
        @csrf

        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="zipcode">郵便番号</label>
            <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode', $zipcode) }}">
        </div>

        <div>
            <label for="address">住所</label>
            <textarea name="address" class="address" id="address">{{ old('address', $address) }}</textarea>
        </div>

        <p class="addressKana">{{ $addressKana }}</p>

        <div>
            <label for="tel">電話番号</label>
            <input type="tel" id="tel" name="tel" value="{{ old('tel') }}">
        </div>

        <input type="submit" class="submit" value="登録">
    </form>

    <a href="/crm/search">郵便番号検索に戻る</a>

@endsection
