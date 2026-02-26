<nav aria-label="breadcrumb" class="mb-30">
    <ol class="breadcrumb mb-0" style="background:transparent;padding:0;" itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach($breadcrumbs as $i => $crumb)
        <li class="breadcrumb-item tp-ff-inter fw-500 fs-14 {{ $loop->last ? 'active tp-text-grey-5' : '' }}" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" @if($loop->last) aria-current="page" @endif>
            @if(!$loop->last)
            <a href="{{ $crumb['url'] }}" class="tp-text-grey-2 hover-text-white" itemprop="item"><span itemprop="name">{{ $crumb['label'] }}</span></a>
            @else
            <span itemprop="name">{{ $crumb['label'] }}</span>
            @endif
            <meta itemprop="position" content="{{ $i + 1 }}">
        </li>
        @endforeach
    </ol>
</nav>
