@section('header')
<header class="flexbox sp-bt al-ce">
  <h1 class="flexbox sp-bt al-ce">
    <img src="{{ assets('images/logo.png') }}" alt="Enginiya.com">
  </h1>
  <div id="head-nav">
    {{-- <ul class="flexbox sp-ed al-ce" >
        <li><span class="material-icons" style="margin-right:0.5rem">account_circle</span>{{ o(\Auth::user())->user_name }}</li>
            <li class="logout"><a href="{{ route('admin_logout') }}">ログアウト</a></li>
        </form>
    </ul> --}}
  </div>
</header>
@endsection
