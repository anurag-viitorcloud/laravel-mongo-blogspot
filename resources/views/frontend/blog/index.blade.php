@extends('frontend.layouts.app')

@section('title', __('blog.list'))

@section('breadcrumb')
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap justify-content-between w-100">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-start align-items-sm-center justify-content-center justify-content-sm-start mr-5 flex-column flex-sm-row">
				<h1 class="d-flex align-items-center text-dark font-weight-bolder my-1 font-size-h3">
					{{ __('breadcrumb.blogs') }}
				</h1>
				<span class="h-20px border-left-lg mx-4 d-none d-sm-block"></span>
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="{{ route('dashboard') }}" class="text-muted">{{ __('breadcrumb.dashboard') }}</a>
					</li>
					<li class="breadcrumb-item">
						<span class="text-dark">{{ __('breadcrumb.blog_list') }}</span>
					</li>
				</ul>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page Heading-->
			<div class="overlay-bg" style="display: none;"></div>
			<div class="d-flex align-items-center gap-2 gap-lg-3 flex-column flex-sm-row">
				
				<a href="{{ route('blogs.create') }}" class="btn btn-sm btn-flex btn-primary fw-bold">
					<i class="fa fa-plus"></i> {{ __('blog.add') }}
				</a>
			</div>
		</div>
		<!--end::Info-->
	</div>
</div>
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card card-custom">
                    <div class="card-body">
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <form action="{{ route('blogs.index') }}" method="get">
                                @if(request()->perPage)
                                    <input type="hidden" name="perPage" value="{{ request()->perPage }}">
                                @endif
                                <div class="row align-items-center justify-content-end">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="row align-items-center justify-content-end">
                                            <div class="col-md-4 my-2 my-md-0 d-flex justify-content-end">
                                                <div class="input-icon mr-2">
                                                    <input type="text" class="form-control" placeholder="{{ __('blog.search') }}..." name="search" value="{{ request()->search }}" id="search" />
                                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary font-weight-bold">{{__('buttons.search')}}</button>
                                                <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-secondary font-weight-bold ml-2 d-flex align-items-center">{{__('buttons.reset')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Search Form-->
                        <div class="table-responsive">
                            <table class="table table-striped table-checked" id="users-table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">
                                        <span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'title', 'dir' => request()->sort=='title' && request()->dir=='asc' ? 'desc' : 'asc']) }}">
                                            {{ __('blog.table.title') }}
                                                @if(request()->sort=='title')
                                                    <i @class(['flaticon2-arrow-up' => request()->dir=='asc', 'flaticon2-arrow-down' => request()->dir=='desc'])></i>
                                                @else
                                                    <i class="flaticon2-arrow-up"></i> <i class="flaticon2-arrow-down"></i>
                                                @endif
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">
                                        <span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'status', 'dir' => request()->sortBy=='status' && request()->dir=='asc' ? 'desc' : 'asc']) }}">
                                            {{ __('blog.table.status') }}                                                
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">
                                        <span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'dir' => request()->sort=='created_at' && request()->dir=='asc' ? 'desc' : 'asc']) }}">
                                            {{ __('blog.table.created_at') }}
                                                @if(request()->sort=='created_at')
                                                    <i @class(['flaticon2-arrow-up' => request()->dir=='asc', 'flaticon2-arrow-down' => request()->dir=='desc'])></i>
                                                @else
                                                    <i class="flaticon2-arrow-up"></i> <i class="flaticon2-arrow-down"></i>
                                                @endif
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">{{ __('blog.table.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
								@if(count($blogs))
                                    @foreach($blogs as $key => $blog)
                                    <tr>
                                        <th scope="row">{{ ($blogs->perPage() * ($blogs->currentPage() - 1)) + $key+1 }}</th>
                                        <td>{!! $blog->title ?? '-' !!}</td>
                                        <td>
                                            <span>
                                            @if($blog->status==App\Constant\Constant::STATUS_ONE)
                                                <span class="label font-weight-bold label-lg label-light-success label-inline">Active</span>
                                            @else
                                                <span class="label font-weight-bold label-lg label-light-danger label-inline">In-Active</span>
                                            @endif
                                            </span>
                                        </td>
                                        <td>{{ App\Helpers\Core\Helper::defaultDateTimeFormat($blog->created_at) ?? '-' }}</td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('blogs.edit', $blog->blog_id) }}" class="mx-2 btn-icon" title="View details">
                                                <i class="flaticon-eye text-success"></i>
                                            </a>
                                            
                                                <a href="javascript:0;" class="mx-2 btn-icon delete-confirmation" title="Delete">
                                                    <form method="POST" action="{{ route('blogs.delete-blog', $blog->blog_id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <i class="flaticon2-rubbish-bin-delete-button text-danger"></i>
                                                    </form>
                                                </a>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
								@else
								    <td colspan="8" class="text-center">{{__('label.no_matching_records_found')}}</td>
								@endif
                                </tbody>
                            </table>
                        </div>
                        {{ $blogs->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script src="{{ asset('js/pages/custom/user/list-user.js') }}"></script>
@endsection
