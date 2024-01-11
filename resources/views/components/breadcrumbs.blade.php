<div class="mb-4">
    <ul class="flex gap-3 bg-gray-500 rounded p-3">
        @if(Breadcrumbs::has())
            @foreach (Breadcrumbs::current() as $crumbs)
                @if ($crumbs->url() && !$loop->last)
                    <li class="text-white text-sm">
                        <a href="{{ $crumbs->url() }}">
                            {{ $crumbs->title() }}
                        </a>
                    </li>
                    <li class="text-white text-sm">
                        /
                    </li>
                @else
                    <li class="text-gray-400 text-sm">
                        {{ $crumbs->title() }}
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>
