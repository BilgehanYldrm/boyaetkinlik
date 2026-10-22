@php
    /** @var \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Collection $pages */
    $pages = collect($pages ?? []);
    $label = $label ?? 'İçeriklerden bir kesit';
@endphp

@if($pages->isNotEmpty())
    @php
        $loopPages = $pages->count() === 1 ? $pages->concat($pages)->concat($pages) : $pages->concat($pages);
    @endphp
    <div class="stats-flow-marquee" aria-label="{{ $label }}">
        <div class="mb-2 flex items-center justify-between gap-2 px-0.5">
            <p class="text-[11px] font-semibold uppercase tracking-wide text-violet-600/90">{{ $label }}</p>
            <span class="rounded-full bg-violet-50 px-2 py-0.5 text-[10px] font-semibold text-violet-700">Canlı önizleme</span>
        </div>
        <div class="stats-flow-marquee__viewport">
            <div class="stats-flow-marquee__track">
                @foreach($loopPages as $page)
                    <a href="{{ route('products.show', $page) }}" class="stats-flow-marquee__item group" title="{{ $page->title }}">
                        <img
                            src="{{ route('products.preview-image', $page) }}"
                            alt="{{ $page->title }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.04]"
                            loading="lazy"
                            draggable="false"
                            onerror="this.onerror=null;this.src='https://placehold.co/240x180/e2e8f0/334155?text=Boyama';"
                        >
                        <span class="stats-flow-marquee__caption">{{ $page->title }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endif
