@extends('admin.layouts.base')

@section('title', '新着情報登録・編集')
@section('description', '')

@section('pageCss')
<link href="{{ assets('css/admin/news.css') }}" rel="stylesheet">
@endsection

@include('admin.layouts.header')
@section('content')

<!--MAIN START-->
<article id="news_edit">
    <div id="breadcrumb">
        <ul>
            <li><a href="">TOP</a></li>
            <li><a href="{{ route('admin_news') }}">新着一覧</a></li>
            <li>新着情報登録・編集</li>
        </ul>
    </div>

    <section>
        @if ($news->id)
            <p style="text-align:right;font-size:smaller;">{{ '作成日時：'. $news->news_created  }}</p>
            <p style="text-align:right;font-size:smaller;">{{ '更新日時：'. $news->news_updated  }}</p>
        @endif
        {{ Form::model($news,['url'=>route('admin_news_store',[ $news ]),'method' => 'POST', 'class' => 'search flexbox flexwrap sp-bt' ])  }}
            <div class="input_cont">
                @if ($news->id)
                    <label for="id">ID</label>
                    <p name="id">{{ $news->zero_padding_id }}</p>
                @endif
                {{-- <div>
                    <label for="news_sort">表示順</label>
                    {{ Form::text('sort_no',null,['id' => 'news_sort']) }}
                    {{ Form::error('sort_no') }} --}}
                {{-- </div> --}}
                {{-- <div>
                    <label for="date">日付<span class="required">必須</span></label>
                    {{ Form::date('date', old('date'), ['id' => ""]) }}
                    {{-- {{ Form::error('date') }}
                </div>--}}
                <div>
                    <label for="news_title_ja">タイトル</label>
                    {{ Form::text('title', old('title'), ['id' => '']) }}
                    {{-- {{ Form::error('title') }} --}}
                </div>
                <div>
                    <label for="honbun_ja">本文</label>
                    {{ Form::textarea('text', null, ['id' => 'honbun_ja'])}}
                    {{-- {{ Form::error('text') }} --}}
                </div>
           </div>
           <div>
                {{ Form::submit('保存') }}
                <a href="javascript:history.back();" class="back_btn">戻る</a>
           </div>
        {{ Form::close() }}
    </section>

</article>

@include('admin.layouts.sidebar')

@include('admin.layouts.footer')

@endsection
