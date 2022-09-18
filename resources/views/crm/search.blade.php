@extends('layouts.main')

@section('title', '郵便番号検索画面')

@section('content')

    <h1>郵便番号検索画面</h1>

    <div class="error">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>

    <form action="{{ route('crm.create') }}" method="GET">
        @csrf
        <div>
            <label for="zipcode">郵便番号検索</label>
            <input type="search" id="zipcode" name="zipcode" placeholder="検索したい郵便番号">
        </div>

        <input type="submit" class="submit" value="検索">
    </form>

    <a href="{{ route('crm.index') }}">一覧に戻る</a>

@endsection
