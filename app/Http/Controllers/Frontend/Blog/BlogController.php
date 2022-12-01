<?php

namespace App\Http\Controllers\Frontend\Blog;

use Exception;
use Illuminate\View\View;
use App\Constant\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Frontend\Blog\BlogRepository;

class BlogController extends Controller
{
    /**
     * @param  BlogRepository  $blogRepository
     */
    public function __construct(
        private BlogRepository $blogRepository
    ) {
    }

    /**
     * Display a listing of the resource
     * 
     * @param  Request  $request
     * @return View|RedirectResponse
     */
    public function index(Request $request): View|RedirectResponse
    {
        try {
            $blogs = $this->blogRepository->getData($request->all());

            return view('frontend.blog.index', compact('blogs'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('flash_message.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('frontend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function edit(int $id, Request $request)
    {
        try {
            $blog = $this->blogRepository->model::where('blog_id', $id)->first();

            return view('frontend.blog.edit', compact('blog'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('flash_message.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(int $id)
    {
       //
    }

    /**
     * create the specified resource in storage.
     *
     * @param  Request  $request
     */
    public function createBlog(Request $request)
    {
        try {
            $this->blogRepository->createBlog($request->all());

            $data = [
                'success' => true,
                'status' => Constant::CODE_200,
                'message' => __('blog.blog_created_successfully'),
            ];

        } catch (Exception $exception) {
            Log::error($exception);
            $data = [
                'success' => false,
                'status' => Constant::CODE_403,
                'message' => __('flash_message.something_went_wrong_please_try_again'),
            ];
        }

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     */
    public function updateBlog(Request $request)
    {
        try {
            $this->blogRepository->updateBlog($request->all());

            $data = [
                'success' => true,
                'status' => Constant::CODE_200,
                'message' => __('blog.blog_updated_successfully'),
            ];

        } catch (Exception $exception) {
            Log::error($exception);
            $data = [
                'success' => false,
                'status' => Constant::CODE_403,
                'message' => __('flash_message.something_went_wrong_please_try_again'),
            ];
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function deleteBlog(int $id)
    {
        try {
            $this->blogRepository->deleteBlog($id);

            return redirect()->route('blogs.index')
                ->withSuccess(__('blog.blog_deleted_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('flash_message.something_went_wrong_please_try_again'));
        }
    }
}
