{{-- @php
    use App\Models\File;
@endphp --}}

@section('sidebar')
<aside>
  <nav>
    <ul>
      <li><p><a href="">TOP</a></p></li>
      {{--
      <li><p>登録ファイル管理</p>
        <ul>
          <li><a href="{{ route('admin_file', File::PRODUCT ) }}">登録ファイル一覧</a></li>
          <li><a href="{{ route('admin_file_edit', File::PRODUCT_PARTS ) }}">ファイル登録</a></li>
        </ul>
      </li>
      <li><p>ユーザー管理</p>
        <ul>
          <li><a href="{{ route('admin_user') }}">ユーザー一覧</a></li>
          <li><a href="{{ route('admin_user_edit') }}">ユーザー登録</a></li>
        </ul>
      </li>
      <li><p>バナー管理</p>
        <ul>
          <li><a href="{{ route('admin_banner') }}">バナー登録・更新</a></li>
        </ul>
      </li> --}}
      <li><p>新着情報管理</p>
        <ul>
          <li><a href="{{ route('admin_news') }}">新着一覧</a></li>
          <li><a href="{{ route('admin_news_edit') }}">新着情報登録</a></li>
        </ul>
      </li>
      {{-- <li><p>お知らせ管理</p>
        <ul>
         <li><a href="{{ route('admin_notice') }}">お知らせ登録・更新</a></li>
        </ul>
      </li> --}}
    </ul>
  </nav>
</aside>
@endsection
