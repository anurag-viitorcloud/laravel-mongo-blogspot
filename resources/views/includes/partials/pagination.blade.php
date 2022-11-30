@if ($paginator->hasPages())
<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex flex-wrap py-2 mr-3 pagination-wrapper">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled">
            <i class="ki ki-bold-double-arrow-back icon-xs"></i>
        </a>
        <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled">
            <i class="ki ki-bold-arrow-back icon-xs"></i>
        </a>
        @else
        <a href="{{ $paginator->toArray()['first_page_url'] }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-double-arrow-back icon-xs"></i>
        </a>
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-arrow-back icon-xs"></i>
        </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 disabled">...</a>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <a class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">{{ $page }}</a>
        @else
        <a href="{{ $url }}" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-arrow-next icon-xs"></i>
        </a>
        <a href="{{ $paginator->toArray()['last_page_url'] }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-double-arrow-next icon-xs"></i>
        </a>
        @else
        <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled">
            <i class="ki ki-bold-arrow-next icon-xs"></i>
        </span>
        <span class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled">
            <i class="ki ki-bold-double-arrow-next icon-xs"></i>
        </span>
        @endif
    </div>
    <div class="d-flex align-items-center py-3">
        <form action="{{ request()->fullUrl() }}" method="get">
            @foreach(request()->all() as $key => $value)
            @continue(empty($value) || $key == 'page' || $key == 'perPage')
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;" name="perPage" onchange="this.form.submit()">
                @foreach(config('config-variables.backend.table.per_page_options') as $perPage)
                <option value="{{ $perPage }}" @selected(request()->perPage==$perPage)>{{ $perPage }}</option>
                @endforeach
            </select>
        </form>
        <span class="text-muted">Showing {{ $paginator->firstItem() . ' to ' . $paginator->lastItem() . ' of ' . $paginator->total() . ' entries' }}</span>
    </div>
</div>
@elseif($paginator->count()==0)
<div class="d-flex align-items-center py-3">
<span class="text-muted">Showing {{ $paginator->lastItem() . $paginator->total() . ' entries' }}</span>
</div>
@else
<div class="d-flex align-items-center py-3">
<form action="{{ request()->fullUrl() }}" method="get">
<select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;" name="perPage" onchange="this.form.submit()">
    @foreach(config('config-variables.backend.table.per_page_options') as $perPage)
    <option value="{{ $perPage }}" @selected(request()->perPage==$perPage)>{{ $perPage }}</option>
    @endforeach
</select>
</form>
<span class="text-muted">Showing {{ $paginator->firstItem() . ' to ' . $paginator->lastItem() . ' of ' . $paginator->total() . ' entries' }}</span>
</div>
@endif