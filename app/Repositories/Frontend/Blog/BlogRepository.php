<?php

namespace App\Repositories\Frontend\Blog;

use Carbon\Carbon;
use App\Constant\Constant;
use App\Helpers\Core\Helper;
use App\Repositories\Core\Repository;

class BlogRepository extends Repository
{
	/**
	 * @var string
	 * Return the model
	 */
	public function __construct()
	{
		$this->model = config('model-variables.models.blog.class');
	}

	/**
	 * Get users records with pagination
	 *
	 * @param  array  $request
	 * @return mixed
	 */
	public function getData(array $request): mixed
	{
		return $this->model::where('created_by', Helper::loggedInUser()->user_id)
			->where('deleted_at', Constant::NULL)
			->when(isset($request['search']), function ($query) use ($request) {
				$query->where('title',  'like', '%'.$request['search'].'%');
			})
			->when(isset($request['status']), function ($query) use ($request) {
				$query->where('status', (int)$request['status']);
			})
			->when(isset($request['sort']) and isset($request['dir']), function ($query) use ($request) {
				$query->orderBy($request['sort'], $request['dir']);
			})
			->when(! isset($request['sort']), function ($query) {
				$query->latest();
			})
			// ->latest()
			->paginate($request['perPage'] ?? config('config-variables.backend.table.per_page'));
	}

	/**
	 * create a blog
	 * 
	 * @param  array  $request
	 * @return mixed
	 */
	public function createBlog(array $request): mixed
	{
		$userId = Helper::loggedInUser()->user_id;
		
		$latestBlogId = $this->model::orderBy('blog_id', 'DESC')->value('blog_id');
		
		$blog = $this->model::create([
			'blog_id' => ++$latestBlogId,
			'title' => $request['title'],
			'description' => $request['description'],
			'post' => $request['post'],
			'status' => $request['status'],
			'created_by' => $userId
		]);

		return $blog;
	}

	/**
	 * Update blog data
	 * 
	 * @param  array  $request
	 * @return mixed
	 */
	public function updateBlog(array $request): mixed
	{
		$blog = $this->model::where('blog_id', (int)$request['blog_id'])		
			->update([
				'title' => $request['title'],
				'description' => $request['description'],
				'post' => $request['post'],
				'status' => $request['status']
			]) ?? [];

		return $blog;
	}

	/**
	 * delete blog data
	 * 
	 * @param int $id
	 * @return mixed
	 */
	public function deleteBlog(int $id): mixed
	{
		$blog = $this->model::where('blog_id', (int)$id)->delete();	
	
		return $blog;
	}
}
