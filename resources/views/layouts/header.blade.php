<header class="bg-white">
    <div class="flex justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <a href="/"><h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2></a>
        <ul class="flex items-center">
          <li class="mr-12 text-sm"><a href="/">ホーム</a></li>
          <li class="mr-12 text-sm"><a href="/attendance/1">日付一覧</a></li>
          <li class="text-sm"><form method="POST" action="{{ route('postLogout') }}">
                            @csrf
                            <a href="route('postLogout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ログアウト') }}
                        </form></a></li>
        </ul>
    </div>
</header>