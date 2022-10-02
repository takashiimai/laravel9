@extends('admin.layouts.base')
@section('title', "")
@section('description', "")

{{-- 画面固有のCSSを設定 --}}
@section('include-top')
@endsection

{{-- 画面固有のJSを設定 --}}
@section('include-bottom')
@endsection

{{-- ページコンテンツ --}}
@section('content')
<main>
    <section>
        <h1 class="h3">お知らせ一覧</h1>
        <div class="text-end mb-3">
            <a href="{{ route('admin.post.add') }}" class="btn btn-primary btn-sm">新規作成</a>
        </div>

@if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
@endif
@if (session('error'))
        <div class="alert alert-dangar">
            {{ session('error') }}
        </div>
@endif

@if ($items->count())
        <section>
@include('admin.post.list', ['items' => $items])
        </section>
        <div class="text-center">
{!! $items->appends(Request::except('page'))->render('admin.layouts.bootstrap-4', ['link_size' => config('const.pagination.link_size')]) !!}
        </div>
@else
        <div class="alert alert-info">
            お知らせはありません。
        </div>
@endif
    </section>
</main>

@endsection
