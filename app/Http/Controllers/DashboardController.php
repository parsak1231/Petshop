<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
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
        return view('seller.index', $this->getSellerDashboardData($request));
    }

    private function getSellerDashboardData(Request $request)
    {
        $entries = getEntriesData($request, [5, 10, 20, 25], 10);

        $latestProducts = Product::latest()
            ->where('user_id', '=', Auth::id())
            ->paginate($entries)
            ->sortby('created_at');

        $lowStockProductCount = Product::where('user_id', '=', Auth::id())
            ->where('quantity', '<', 10)
            ->count();

        $averageSale = Order::where('status', 'paid')
            ->whereHas('details.product', function ($query) {
                $query->where('user_id', '=', Auth::id());
            })
            ->avg('total_price');

        $todayRevenue = Order::whereDate('created_at', Carbon::today())
            ->whereHas('details.product', function ($query) {
                $query->where('user_id', '=', Auth::id());
            })
            ->where('status', 'paid')
            ->sum('total_price');

        $bestCustomer = User::withSum(['orders' => function ($query) {
            $query->where('status', 'paid');
        }], 'total_price')
            ->having('orders_sum_total_price', '>', 0)
            ->orderByDesc('orders_sum_total_price')
            ->first();

        return [
            'entries' => $entries,
            'latestProducts' => $latestProducts,
            'lowStockProductCount' => $lowStockProductCount,
            'averageSale' => $averageSale,
            'todayRevenue' => $todayRevenue,
            'bestCustomer' => $bestCustomer
        ];
    }

    public function adminDashboard(Request $request)
    {
        return view('admin.index', $this->getAdminDashboardData($request));
    }

    private function getAdminDashboardData(Request $request)
    {
        $entries = getEntriesData($request, [5, 10, 20, 25], 10);
        $onlineUsers = User::where('last_seen_at', '>=', now()->subMinutes(5))
            ->paginate($entries);

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
            'lastDeletedProduct' => $lastDeletedProduct,
            'entries' => $entries,
            'onlineUsers' => $onlineUsers,
        ];
    }

    public function home()
    {
        return view('Index', $this->getHomeData());
    }

    private function getHomeData()
    {
        $products = Product::latest()->take(4)->get();
        $topComments = Comment::with('user')
            ->whereBetween('rating', [4, 5])
            ->take(5)
            ->get();

        return [
            'products' => $products,
            'topComments' => $topComments,
        ];
    }
}
