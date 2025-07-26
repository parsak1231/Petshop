<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function sellerDashboard(Request $request)
    {
        $entries = getEntriesData($request, [5, 10, 20, 25], 10);
        $latestProducts = $this->getProductData($entries);
        return view('seller.index',
            compact('latestProducts', 'entries')
        );
    }

    private function getProductData($entries)
    {
        return Product::latest()
            ->where('user_id', '=', Auth::id())
            ->paginate($entries)
            ->sortby('created_at');
    }

    public function adminDashboard(Request $request)
    {
        $entries = getEntriesData($request, [5, 10, 20, 25], 10);
        $onlineUsers = User::where('last_seen_at', '>=', now()->subMinutes(5))
            ->paginate($entries);

        $mainData = ['entries' => $entries, 'onlineUsers' => $onlineUsers];
        $otherData = $this->getAdminDashboardData();

        return view('admin.index', array_merge($mainData, $otherData));
    }

    private function getAdminDashboardData()
    {
        $totalUsers = User::count();
        $mostUsedCategory = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->first();
        $totalRoles = Role::count();
        $lastDeletedProduct = Product::onlyTrashed()
            ->orderBy('deleted_at', 'desc')
            ->first();

        return [
            'totalUsers' => $totalUsers,
            'mostUsedCategory' => $mostUsedCategory,
            'totalRoles' => $totalRoles,
            'lastDeletedProduct' => $lastDeletedProduct
        ];
    }
}
