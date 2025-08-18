<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show()
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'draft')
            ->with('details.product')
            ->first();

        if ($order) {
            $removed = false;
            foreach ($order->details as $detail) {
                if ($this->isRemoved($detail->product)) {
                    $detail->delete();
                    $removed = true;
                }
            }
            if ($removed) {
                $order->refresh();
                return redirect()->route('site.cart.index')
                    ->withErrors('برخی محصولات به علت ناموجود بودن از سبد حذف شدند.');
            }
        }

        return view('cart', compact('order'));
    }

    public function add(Product $product)
    {
        if ($this->isRemoved($product)) {
            return redirect()
                ->back()
                ->withErrors('این محصول قابلیت افزودن به سبد خرید را ندارد');
        }

        $order = Order::firstOrCreate(
            ['user_id' => Auth::id(), 'status' => 'draft'],
            ['total_price' => 0]
        );

        $detail = $order->details()->where('product_id', $product->id)->first();
        if ($detail) {
            $detail->quantity += 1;
            $detail->save();
        } else {
            $order->details()->create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('site.cart.index');
    }

    public function update(OrderDetail $detail, Request $request)
    {
        $this->authorizeOrder($detail);

        $newQuantity = intval($request->quantity);

        if ($newQuantity < 1) {
            $detail->delete();
            $this->deleteIfEmpty($detail->order);

            redirect()->back();
        } else {
            $product = $detail->product;
            $error = $this->validateWithErrText($product, $newQuantity);

            if ($error) {
                return redirect()->back()->withErrors($error);
            }

            $detail->update(['quantity' => $newQuantity]);
        }
        return redirect()->route('site.cart.index');
    }

    public function remove(OrderDetail $detail)
    {
        $this->authorizeOrder($detail);
        $order = $detail->order;

        $detail->delete();
        $this->deleteIfEmpty($order);

        return redirect()->back();
    }

    private function authorizeOrder($detail)
    {
        if ($detail->order->user_id !== Auth::id()) {
            abort(403, 'شما اجازه انجام این عملیات را ندارید.');
        }
    }

    private function isRemoved($product): bool
    {
        return match ($product) {
            !$product,
                $product->status == 0,
                $product->qunatity < 1 => true,
            default => false,
        };
    }

    private function deleteIfEmpty($order)
    {
        if ($order->details()->count() === 0) {
            $order->delete();
        }
    }

    private function validateWithErrText(?Product $product, int $newQuantity): ?string
    {
        return match (true) {
            !$product => 'محصول مورد نظر پیدا نشد',
            $product->status != 1 => 'این محصول در حال حاضر در سیستم وجود ندارد',
            $product->quantity < $newQuantity => 'تعداد انتخاب شده برای این محصول بیشتر از تعداد موجود است',
            default => null
        };
    }

    public function checkout()
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'draft')
            ->with('details.product')
            ->first();

        if (!$order){
            return redirect()->back()->withErrors('سبد خرید شما خالی است.');
        }

        $total_price = $this->getTotalPrice($order);

        $order->update([
            'status' => 'pending',
            'total_price' => $total_price
        ]);

        return redirect()->route('site.cart.index');
    }

    private function getTotalPrice($order)
    {
        $total = 0;

        foreach ($order->details as $detail) {
            $product = $detail->product;
            $newQuantity = $detail->quantity;
            $error = $this->validateWithErrText($product, $newQuantity);

            if ($error)
            {
                return redirect()->back()->withErrors($error);
            }

            $total += $product->price * $newQuantity;
        }

        return $total;
    }
}
