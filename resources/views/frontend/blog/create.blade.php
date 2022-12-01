@extends('frontend.layouts.app')

@section('title', __('blog.view'))

@section('breadcrumb')
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1 justify-content-between w-100">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-start align-items-sm-center mr-sm-5 flex-column flex-sm-row">
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
                        <a href="{{ route('blogs.index') }}" class="text-muted">{{ __('breadcrumb.blog_list') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="text-dark">{{ __('breadcrumb.view_blog') }}</span>
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
                        <form class="form" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content mt-5" id="myTabContent">
                                <div class="row">
                                    <div class="cont mt-3">
                                        <div id="editor" contenteditable="false">
                                            <section id="toolbar">
                                                <div id="bold" class="icon fa fa-bold"></div>
                                                <div id="italic" class="icon fa fa-italic"></div>
                                                <div id="createLink" class="icon fa fa-link"></div>
                                                <div id="insertUnorderedList" class="icon fa fa-list"></div>
                                                <div id="insertOrderedList" class="icon fa fa-list-ol"></div>
                                                <div id="justifyLeft" class="icon fa fa-align-left"></div>
                                                <div id="justifyRight" class="icon fa fa-align-right"></div>
                                                <div id="justifyCenter" class="icon fa fa-align-center"></div>
                                                <div id="justifyFull" class="icon fa fa-align-justify"></div>
                                                <div class="float-right">
                                                    <div class="col-3 pl-0">
                                                        <span class="switch">
                                                            <label>
                                                                <input type="checkbox" class="status" name="status" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </section>
                                            <div id="page" contenteditable="true">
                                                <div class="title">
                                                    <b>{{ __('blog.label.default_title') }}</b>
                                                </div>
                                                <div class="bg-transparent border-bottom border-primary fw-bold mt-2 mb-2 description">
                                                    <i>{{ __('blog.label.default_description') }}</i>
                                                </div>
                                                <div id="post">
                                                    <p id="page-content">{{ __('blog.label.default_content') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="log-out-client save" type="button">
                                            <i class="fa fa-save"></i>
                                            <span>{{ __('buttons.save_content') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script src="{{ asset('js/pages/custom/blog/add-blog.js') }}"></script>
@endsection