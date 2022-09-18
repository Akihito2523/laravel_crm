@extends('layouts.main')

@section('title', '編集画面')

@section('content')

    <h1>編集画面</h1>

    {{-- エラーメッセージの表示 --}}
    @if ($errors->any())
        <div class="error">
            <p>{{ count($errors) }}件のエラーがあります。</p>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('crm.update', $crm) }}" method="post">
        @csrf
        @method('PATCH')

        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name', $crm->name) }}">
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email', $crm->email) }}">
        </div>

        <div>
            <label for="zipcode">郵便番号</label>
            <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode', $crm->zipcode) }}">
        </div>

        <div>
            <label for="address">住所</label>
            <textarea name="address" class="address" id="address">{{ old('address', $crm->address) }}</textarea>
        </div>

        <div>
            <label for="tel">電話番号</label>
            <input type="tel" id="tel" name="tel" value="{{ old('tel', $crm->tel) }}">
        </div>

        <input type="submit" class="submit" value="更新">
    </form>

    <a href="{{ route('crm.index', $crm) }}">戻る</a>

@endsection
