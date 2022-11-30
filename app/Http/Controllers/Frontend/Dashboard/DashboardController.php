<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Dashboard\DashboardRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * @param  DashboardRepository  $dashboardRepository
     */
    public function __construct(
        private DashboardRepository $dashboardRepository
        )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        try {
            $blogs = $this->dashboardRepository->getBlogCounts();

            return view('backend.dashboard.index', compact('blogs'));
        } catch (Exception $ex) {
            Log::error($ex);

            return redirect()->back()
                ->withError(__('dashboard.something_went_wrong'));
        }
    }
}
