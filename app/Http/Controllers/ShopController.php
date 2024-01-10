<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\CartItem;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')->where('status', 0)->paginate(8);

        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $products = Product::where('name', 'like', "%$keyword%")->paginate();
        }

        // $categories = Category::all();

        return view('shop.home', compact('products'));
    }


    public function checklogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            // Kiểm tra xem giỏ hàng ban đầu đã được lưu trong session hay chưa
            if ($request->session()->has('initialCart')) {
                // Lấy thông tin giỏ hàng ban đầu từ session
                $initialCart = $request->session()->get('initialCart');
                // Lưu thông tin giỏ hàng ban đầu vào session
                $request->session()->put('cart', $initialCart);
            }

            return redirect()->route('shop.master')->with('successMessage', 'Đăng nhập thành công');
        } else {
            return redirect()->route('shop.login');
        }
    }
    public function login()
    {
        return view('shop.login');
    }
    public function register()
    {
        return view('shop.register');
    }
    public function logout(Request $request)
    {
        // Lấy thông tin giỏ hàng hiện tại từ session
        $currentCart = $request->session()->get('cart', []);

        // Lưu thông tin giỏ hàng hiện tại vào session với khóa 'initialCart'
        $request->session()->put('initialCart', $currentCart);

        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerateToken();

        return redirect()->route('shop.master');
    }
    public function checkRegister(Request $request)
    {
        // $validated = $request->validate([
        //     'email' => 'required|unique:customers|email',
        //     'password' => 'required|min:6',
        // ]);
        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->psw);

        if ($request->psw == $request->psw_repeat) {
            $customer->save();
            return redirect()->route('shop.login');
        } else {
            return redirect()->route('shop.index')->with($notification);
        }
    }
    public function detail(string $id)
    {
        $products = Product::find($id);
        // Lấy các sản phẩm có liên quan (ví dụ: cùng danh mục)
        $relatedProducts = Product::where('category_id', $products->category_id)
            ->where('id', '<>', $products->id) // Loại bỏ sản phẩm hiện tại
            ->inRandomOrder() // Sắp xếp ngẫu nhiên
            ->limit(2) // Giới hạn số lượng sản phẩm hiển thị
            ->get();
        return view('shop.detail', compact('products', 'relatedProducts'));
    }

    // cart
    /**
     * Write code on Method
     *
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('shop.cart');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {

        $products = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $products->name,
                "quantity" => 1,
                "price" => $products->price,
                "image" => $products->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function checkOuts()
    {
        return view('shop.checkout');
    }


    public function order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;

            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');

            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);
        }
        $notification = [
            'message' => 'success',
        ];
        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        Mail::send('mail.mail', compact('data'), function ($email) use ($request) {
            $email->subject('Shein Shop');
            $email->to($request->email, $request->name);
        });

        // dd($request);
        // alert()->success('Thêm Đơn Đặt: '.$request->name,'Thành Công');
        return redirect()->route('shop.index')->with($notification);;
        // }
        // } catch (\Exception $e) {
        //     // dd($request);
        //     Log::error($e->getMessage());
        //     // toast('Đặt hàng thấy bại!', 'error', 'top-right');
        //     return redirect()->route('shop.index');
        // }
    }

    public function viewCheckout()
    {
        return view('shop.checkout');
    }
    public function checkout(Request $request)
    {
        if (Auth::guard('members')->check()) {
            $user = Auth::guard('members')->user();
            return response()->json(['logged_in' => $user]);
        } else {
            $response = [
                'message' => 'Bạn cần phải đăng nhập để tiếp tục.',
                'redirect' => route('login-shop')
            ];
            return response()->json($response);
        }
    }
    public function storeCheckout(Request $request)
    {
        $order = new Order();
        $carts = session()->get('cart', []);
        foreach ($carts as $cart) {
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = Carbon::now(); // Lấy giờ hiện tại
            $order->date_ship = Carbon::now(); // Lấy giờ hiện tại
            $order->note = 'lol';
            $order->save();
        }
        session()->forget('cart');
        return redirect()->route('shop.master')->with('successMessage', 'Thanh toán thành công');
    }


    //     public function updateCart(Request $request)
    // {
    //     $id = $request->input('id');
    //     $quantity = $request->input('quantity');

    //     // Update the quantity in the database
    //     $cartItem = CartItem::findOrFail($id);
    //     $cartItem->quantity = $quantity;
    //     $cartItem->save();

    //     // Return the updated quantity as the response
    //     return response()->json(['quantity' => $quantity]);
    // }
}
