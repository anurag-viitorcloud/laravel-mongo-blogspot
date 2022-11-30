@extends('backend.layouts.app')

@section('title', __('user.user_detail'))

@section('breadcrumb')
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1 justify-content-between w-100">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-start align-items-sm-center mr-sm-5 flex-column flex-sm-row">
                <h1 class="d-flex align-items-center text-dark font-weight-bolder my-1 font-size-h3">
                    {{ __('user.user_detail') }}
                </h1>
                <span class="h-20px border-left-lg mx-4 d-none d-sm-block"></span>
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted">{{ __('breadcrumb.dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.users.index') }}" class="text-muted">{{ __('user.users_list') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="text-dark">{{ __('user.user_detail') }}</span>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
    </div>
</div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom">
                    <div class="card-body">
                        <!--begin::Form-->
                        <form class="form" method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="tab-content mt-5" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                                    <div class="row align-items-center justify-content-end">
                                        <div class="col-md-4 my-2 my-md-0 d-flex justify-content-end">
                                            <button type="button" class="btn btn-md btn-secondary font-weight-bold" id="edit">{{__('buttons.edit')}}</button>
                                            <button type="submit" class="btn btn-md btn-primary font-weight-bold ml-2" id="update" style="display: none;">{{__('buttons.update')}}</button>
                                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary ml-2" id="cancel" style="display: none;">{{ __('buttons.cancel') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label>{{ __('user.label.name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('user.placeholder.name') }}" name="name" value="{{ old('name', $user->name) }}" disabled />
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <label>{{ __('user.label.email') }} <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('user.placeholder.email') }}" name="email" value="{{ old('email', $user->email) }}" disabled />
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label>{{ __('user.label.password') }} <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('user.placeholder.password') }}" name="password" disabled />
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <label>{{ __('user.label.number') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('user.placeholder.number') }}" name="phone" value="{{ old('phone', $user->phone) }}" disabled />
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>{{ __('user.label.address') }} <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('user.placeholder.address') }}" name="address" rows="3" disabled>{{ old('address', $user->address) }}</textarea>
                                        @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label>{{ __('user.label.zipcode') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" placeholder="{{ __('user.placeholder.zipcode') }}" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}" disabled />
                                        @error('zip_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>{{ __('user.label.country') }} </label>
                                        <input type="text" class="form-control country" value="India" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>{{ __('user.label.state') }} </label>
                                        <select class="form-control state @error('state_id') is-invalid @enderror" 
                                            name="state_id"
                                            id="kt_select2_2"
                                            placeholder="{{ __('user.placeholder.state') }}" disabled>
                                            <option selected="" disabled="">{{ __('user.placeholder.state') }}</option>
                                            @foreach ($states as $id => $name)
                                            <option value="{{ $id }}" @selected( $id==$user->state_id )>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>{{ __('user.label.city') }} </label>
                                        <select class="form-control city @error('city_id') is-invalid @enderror" 
                                            name="city_id"
                                            id="kt_select2_3" disabled>
                                            <option selected="" disabled="">{{ __('user.placeholder.city') }}</option>
                                            @foreach($cities as $id => $name)
                                            <option value="{{ $id }}" @selected( $id==$user->city_id )>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label>{{ __('user.label.department') }} </label>
                                        <select class="form-control department @error('department_id') is-invalid @enderror" name="department_id" id="kt_select2_5" disabled>
                                            <option selected="" disabled="">{{ __('user.placeholder.department') }}</option>
                                            @foreach($departments as $id => $name)
                                            <option value="{{ $id }}" @selected( $id==$user->department_id )>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <label>{{ __('user.label.role') }} <span class="text-danger">*</span></label>
                                        <select class="form-control @error('role') is-invalid @enderror" id="kt_select2_1" name="role" disabled>
                                            <option value="" selected disabled>{{ __('user.placeholder.role') }}</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @selected(isset($user->roles[0]->id) && $role->id==$user->roles[0]->id)>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>{{ __('user.label.status') }}</label>
                                        <div class="col-3 pl-0">
                                            <span class="switch">
                                                <label>
                                                    <input type="checkbox" name="status" value="1" id="switch" @checked(old('status', $user->status==App\Constant\Constant::STATUS_ONE)) disabled />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
<script src="{{ asset('js/pages/custom/user/edit-user.js') }}"></script>
<script src="{{ asset('js/pages/custom/site/site.js') }}"></script>
@endsection