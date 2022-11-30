@extends('backend.layouts.app')

@section('title', __('user.users_list'))

@section('breadcrumb')
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap justify-content-between w-100">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-start align-items-sm-center justify-content-center justify-content-sm-start mr-5 flex-column flex-sm-row">
				<h1 class="d-flex align-items-center text-dark font-weight-bolder my-1 font-size-h3">
					{{ __('user.users_list') }}
				</h1>
				<span class="h-20px border-left-lg mx-4 d-none d-sm-block"></span>
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="{{ route('admin.dashboard') }}" class="text-muted">{{ __('breadcrumb.dashboard') }}</a>
					</li>
					<li class="breadcrumb-item">
						<span class="text-dark">{{ __('user.users_list') }}</span>
					</li>
				</ul>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page Heading-->
			<div class="overlay-bg" style="display: none;"></div>
			<div class="d-flex align-items-center gap-2 gap-lg-3 flex-column flex-sm-row">
				<!--begin::Filter menu-->
				<div class="m-0 w-100 w-sm-auto">
					<!--begin::Menu toggle-->
					<a tabindex="0" data-trigger="focus" role="button" class="btn btn-sm btn-flex btn-secondary fw-bold btn-filter mb-2 mb-sm-0 mr-sm-2 d-block">
						<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
						<span class="svg-icon svg-icon-6 svg-icon-muted me-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->Filter
					</a>
					<!--end::Menu toggle-->
					<!--begin::Menu 1-->
					<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px filter-details" style="display: none;">
						<div class="px-7 py-5">
							<div class="fs-5 text-dark fw-bold">Filter Options</div>
						</div>
						<div class="separator border-gray-200"></div>
						<form action="{{ route('admin.users.index') }}" method="get" class="px-7 py-5">
							<div class="mb-5">
								<label class="form-label fw-semibold">{{ __('user.label.status') }}</label>
								<div>
									<select class="form-control form-select" name="status" id="kt_select2_1">
										<option value="">{{ __('user.all') }}</option>
										<option value="1" @selected(request()->status==1)>{{__('user.active')}}</option>
										<option value="2" @selected(request()->status==2)>{{__('user.inactive')}}</option>
									</select>
								</div>
							</div>
							<div class="mb-5">
								<label class="form-label fw-semibold">{{ __('user.label.role') }}</label>
								<div>
									<select class="form-control form-select" name="role" id="kt_select2_2">
										<option value="">{{ __('user.all') }}</option>
										@foreach($roles as $role)
										<option value="{{ $role->id }}" @selected(request()->role==$role->id)>{{ $role->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="mb-10">
								<label class="form-label fw-semibold">Date Range</label>
								<div class='input-group' id='kt_daterangepicker_2'>
									<input type='text' name="date_range" class="form-control" readonly="readonly" placeholder="Select date range" value="{{ request()->date_range ?? "" }}" />
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="la la-calendar-check-o"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-end">
								<a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-light btn-active-light-primary mr-2">{{__('user.reset')}}</a>
								<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">{{__('label.button.apply')}}</button>
							</div>
						</form>
					</div>
				</div>
				<!--end::Filter menu-->
				<a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-flex btn-primary fw-bold">
					<i class="fa fa-plus"></i> {{ __('buttons.add_user') }}
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
                            <form action="{{ route('admin.users.index') }}" method="get">
                                @if(request()->perPage)
                                <input type="hidden" name="perPage" value="{{ request()->perPage }}">
                                @endif
                                <div class="row align-items-center justify-content-end">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="row align-items-center justify-content-end">
                                            <!-- Update status dropdown -->
                                            <div class="multiple-actions col-md-8" id="checkboxActionDropdown" style="display:none;">
                                                <div class="d-flex align-items-center">
                                                    <div class="dropdown col-xxl-3 col-lg-4">
                                                        <select class="form-control form-select status_update" id="kt_select2_1" data-placeholder="{{__('label.update_status')}}">
                                                            <option value="" selected disabled>{{__('label.update_status')}}</option>
                                                            <option value="1">{{__('user.active')}}</option>
                                                            <option value="2">{{__('user.inactive')}}</option>
                                                        </select>
                                                    </div>
                                                    <!-- Delete all button -->
                                                    <a href="#delete_modal" data-toggle="modal" data-target="#delete_modal" class="btn btn-sm btn-danger mr-2 action-type delete-all" id="delete_all" data-value="delete">{{__('label.button.delete_all')}}</a>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0 d-flex justify-content-end">
                                                <div class="input-icon mr-2">
                                                    <input type="text" class="form-control" placeholder="{{ __('user.search') }}..." name="search" value="{{ request()->search }}" id="search" />
                                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary font-weight-bold">{{__('user.search')}}</button>
                                                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-secondary font-weight-bold ml-2 d-flex align-items-center">{{__('user.reset')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Search Form-->
                        
                        <!-- Status Modal -->
                        <div class="modal fade" id="status_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Status Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div>
                                        <h3 class="swal2-title" id="swal2-title" style="display: center;">{{__('label.are_you_sure')}}</h3>
                                        <div class="swal2-html-container" style="text-align: center;">{{__('label.you_want_to_update_the_status')}}</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="cancel" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">{{__('label.button.close')}}</button>
                                        <button type="button" class="btn btn-primary font-weight-bold confirm-update">{{__('label.button.yes')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete all Modal -->
                        <div class="modal fade" id="delete_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div>
                                        <h3 class="swal2-title" id="swal2-title" style="display: center;">{{__('label.are_you_sure')}}</h3>
                                        <div class="swal2-html-container" style="text-align: center;">{{__('label.you_want_to_delete')}}</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">{{__('label.button.close')}}</button>
                                        <button type="button" class="btn btn-primary font-weight-bold confirm-delete">{{__('label.button.yes')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-checked" id="users-table">
                                <thead>
                                <tr>
                                    
                                    <th scope="col">
                                        <label class="checkbox table-checkbox table-checkbox-main">
                                        <input type="checkbox" name="checkbox_action[]" class="checkbox_action" id="checkbox-all">
                                        <span></span>   </label>
                                    </th>
                                    <th scope="col">#</th>
                                    <th scope="col">
                                        <span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'dir' => request()->sort=='name' && request()->dir=='asc' ? 'desc' : 'asc']) }}">
                                            {{ __('user.label.name') }}
                                                @if(request()->sort=='name')
                                                    <i @class(['flaticon2-arrow-up' => request()->dir=='asc', 'flaticon2-arrow-down' => request()->dir=='desc'])></i>
                                                @else
                                                    <i class="flaticon2-arrow-up"></i> <i class="flaticon2-arrow-down"></i>
                                                @endif
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">
                                        <span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'email', 'dir' => request()->sort=='email' && request()->dir=='asc' ? 'desc' : 'asc']) }}">
                                            {{ __('user.label.email') }}
                                                @if(request()->sort=='email')
                                                    <i @class(['flaticon2-arrow-up' => request()->dir=='asc', 'flaticon2-arrow-down' => request()->dir=='desc'])></i>
                                                @else
                                                    <i class="flaticon2-arrow-up"></i> <i class="flaticon2-arrow-down"></i>
                                                @endif
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">
                                        <span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'phone', 'dir' => request()->sort=='phone' && request()->dir=='asc' ? 'desc' : 'asc']) }}">
                                            {{ __('user.label.number') }}
                                                @if(request()->sort=='phone')
                                                    <i @class(['flaticon2-arrow-up' => request()->dir=='asc', 'flaticon2-arrow-down' => request()->dir=='desc'])></i>
                                                @else
                                                    <i class="flaticon2-arrow-up"></i> <i class="flaticon2-arrow-down"></i>
                                                @endif
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">
                                        <span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'dir' => request()->sort=='role' && request()->dir=='asc' ? 'desc' : 'asc']) }}">
                                            {{ __('user.label.role') }}
                                                @if(request()->sort=='role')
                                                    <i @class(['flaticon2-arrow-up' => request()->dir=='asc', 'flaticon2-arrow-down' => request()->dir=='desc'])></i>
                                                @else
                                                    <i class="flaticon2-arrow-up"></i> <i class="flaticon2-arrow-down"></i>
                                                @endif
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">
                                        <span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'department_id', 'dir' => request()->sort=='department_id' && request()->dir=='asc' ? 'desc' : 'asc']) }}">
                                            {{ __('user.label.department') }}
                                                @if(request()->sort=='department_id')
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
                                            {{ __('user.label.status') }}                                                
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">{{ __('user.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
								@if(count($users))
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <td scope="col">
                                            <label class="checkbox table-checkbox">
                                                <input type="checkbox" name="checkbox_action" class="checkbox_action" value="{{$user->id}}">
                                                <span></span>   </label>
                                        </td>
                                        <th scope="row">{{ ($users->perPage() * ($users->currentPage() - 1)) + $key+1 }}</th>
                                        <td>{{ $user->name ?? '-' }}</td>
                                        <td>{{ $user->email ?? '-' }}</td>
                                        <td>{{ $user->phone ?? '-' }}</td>
                                        <td>{{ $user->roles[0]->title ?? '-' }}</td>
                                        <td>{{ $user->department->name ?? '-' }}</td>
                                        
                                        <td>
                                            <span>
                                            @if($user->status==App\Constant\Constant::STATUS_ONE)
                                                <span class="label font-weight-bold label-lg label-light-success label-inline">Active</span>
                                            @else
                                                <span class="label font-weight-bold label-lg label-light-danger label-inline">In-Active</span>
                                            @endif
                                            </span>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="mx-2 btn-icon" title="View details">
                                                <i class="flaticon-eye text-success"></i>
                                            </a>
                                            @if (!$user->hasRole(\App\Constant\Constant::ADMIN))
                                                <a href="javascript:0;" class="mx-2 btn-icon delete-confirmation" title="Delete">
                                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <i class="flaticon2-rubbish-bin-delete-button text-danger"></i>
                                                    </form>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
								@else
								    <td colspan="8" class="text-center">{{__('label.no_matching_records_found')}}</td>
								@endif
                                </tbody>
                            </table>
                        </div>
                        {{ $users->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script src="{{ asset('js/pages/custom/user/list-user.js') }}"></script>
@endsection
