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
        <h1 class="h3">編集</h1>

            <form method="post" action="{{ route('admin.post.update') }}" enctype="multipart/form-data">

@include('admin.post.form', ['item' => $item])

            </form>
    </section>
</main>
@endsection
