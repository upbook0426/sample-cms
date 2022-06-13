@extends('admin.layouts.base')

@section('title', '新着一覧')
@section('description', '')

@section('pageCss')
<link href="{{ assets('css/admin/news.css') }}" rel="stylesheet">
@endsection

{{-- @section('pagination')
{!! $records->appends(request()->query())->links('elements.pagination') !!}
<div class="items_change">
    {{ Form::open(['route'=>'admin_news', 'method' => 'get']) }}
        <p>1ページの表示件数：
    {{ Form::select('page_disp', config('const.paginate_select'), $inputs['page_disp'] ?? config('const.paginate_pagernum'), ['onchange' => "submit()"]) }}
        </p>
    {{ Form::close() }}
</div>
@endsection --}}

@include('admin.layouts.header')
@section('content')

<!--MAIN START-->
<article id="news_list">
    <div id="breadcrumb">
        <ul>
            {{-- <li><a href="{{ route('admin_home') }}">TOP</a></li> --}}
            <li>新着一覧</li>
        </ul>
    </div>
    @if (session('flash_success'))
        <div class="flash_message">
            {{ session('flash_success') }}
        </div>
    @endif
    <section>
        {{ Form::open(['route'=>'admin_news','method' => 'get', 'class' => 'search flexbox flexwrap sp-bt' ]) }}
            {{ Form::hidden('page_disp', null,['class' => 'page_disp_search']) }}
            <div class="flexbox flexwrap sp-st">
                <div>
                    {{ Form::label('title', 'タイトル') }}
                    {{ Form::text('title', $inputs['title'] ?? null, ['id' => 'title', 'style' => 'box-sizing: border-box;'])}}
                </div>
            </div>
            <div>
                {{ Form::submit('検索') }}
            </div>
        {{ Form::close() }}

        <div class="flexbox al-ce sp-st" style="margin: 10px 0;">
            <!-- Pagenation -->
            @yield('pagination')
        </div>
        <table>
            <thead>
            <tr>
                <th class="news_id">ID</th>
				<th class="news_title_ja">タイトル</th>
                <th class="news_title_ja">内容</th>
                <th class="action"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($records as $index => $rec)
                <tr>
                    <td class="news_id">{{ $rec->id }}</td>
                    <td class="news_title">{{ $rec->title }}</td>
                    <td class="news_title">{{ $rec->text }}</td>
                    <td class="action">
                        <a href="{{ route('admin_news_edit', $rec) }}" class="edit_btn"><span class="material-icons">edit</span></a>
                        <span class="material-icons del_btn" style="cursor: pointer" data-id="{{ $rec->id }}">delete_outline</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flexbox al-ce sp-st" style="margin: 10px 0;">
            @yield('pagination')
        </div>
    </section>

    <!--確認ダイアログボックス-->
    {{ Form::open(['route'=> 'admin_news_delete', 'method' => 'delete']) }}
        {{ Form::hidden('id', null,['id' => 'deleteInput']) }}
        <div id="del_dialog" style="display: none;">
            <h3>削除確認画面</h3>
            <span class="material-icons" style="position: absolute; top: 10px;right:5px;" id="no" onclick="nofunc()">close</span>
            <p>データを削除しますか？</p>
            <div class="button_cont">
                <button id="ok">OK</button>
                <button id="no" type='button' onclick="nofunc()">キャンセル</button>
            </div>
        </div>
    {{ Form::close() }}
    <div id="dialog_overlay" style="display: none;" onclick="nofunc()"></div>

</article>

@include('admin.layouts.sidebar')

@include('admin.layouts.footer')

@endsection

@section('pageJs')
<script>
    $(".search").on("submit", function(){
        let val = $("select[name=page_disp]").val();
        $(".page_disp_search").val(val);
    })
</script>
@endsection
