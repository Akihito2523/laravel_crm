@extends('layouts.main')

@section('title', '観客一覧')

@section('content')

    <h1>観客一覧</h1>

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
            @foreach ($crm as $crms)
                <tr>
                    <td><a href="{{ route('crm.show', $crms->id) }}">{{ $crms->id }}</a></td>
                    <td>{{ $crms->name }}</td>
                    <td>{{ $crms->email }}</td>
                    <td>{{ $crms->zipcode }}</td>
                    <td>{{ $crms->address }}</td>
                    <td>{{ $crms->tel }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <a href="/crm/search">新規作成</a>

@endsection
