<?php

namespace App\Repositories\Frontend\Dashboard;

use App\Constant\Constant;
use App\Helpers\Core\Helper;
use App\Repositories\Core\Repository;

class DashboardRepository extends Repository
{
    /**
     * @var string
     */
    public function __construct()
    {
        $this->blog = config('model-variables.models.blog.class');
    }

    /**
     * Get total blogs count
     *
     * @return int
     */
    public function getBlogCounts(): int
    {
        $blogs = $this->blog::where('created_by', Helper::loggedInUser()->user_id)
            ->where('deleted_at', Constant::NULL)
            ->count();

        return $blogs;
    }
}
