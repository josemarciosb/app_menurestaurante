<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function addDrinkToCart(Request $request)
    {

        if (!$request->session()->exists('cart')) {
            $cart = session(['cart' => []]);
        }

        $cart = session()->get('cart');


        if (session('cart') == null) {
            $prod_id = 0;
        } else {
            $lastPos = (array_key_last(session('cart')));
            $prod_id = 1 + session('cart.' . $lastPos . '.prod_id');
        }

        $cp = 0;
        $foundProd = false;
        foreach ($cart as $product) {
            if ($product['produto'] == 'refrigerante' or $product['produto'] == 'suco') {
                if ($product['nome'] == $request->name) {
                    $cart = session()->put('cart.' . $cp, collect([
                        'prod_id' => $product['prod_id'], 'produto' => $product['produto'], 'nome' => $product['nome'],
                        'tamanho' => $product['tamanho'], 'valor' => $product['valor'],
                        'quantidade' => strval($product['quantidade'] + $request->quantity)
                    ]));
                    $foundProd = true;
                    break;
                }
            }
            $cp = $cp + 1;
        }

        if ($foundProd == false) {
            $product = collect([
                'prod_id' => $prod_id, 'produto' => $request->type, 'nome' => $request->name,
                'tamanho' => $request->size, 'valor' => $request->price, 'quantidade' => $request->quantity
            ]);

            $cart = session()->push('cart', $product);
        }

        return redirect()->back()->with('success', 'Bebida adicionada ao carrinho');
    }


    public function addMarmitexToCart(Request $request)
    {

        if (!$request->session()->exists('cart')) {
            $cart = session(['cart' => []]);
        }

        $cart = session()->get('cart');

        if (session('cart') == null) {
            $prod_id = 0;
        } else {
            $lastPos = (array_key_last(session('cart')));
            $prod_id = 1 + session('cart.' . $lastPos . '.prod_id');
        }

        $food = $request->except(['size', 'price', '_token']);

        $marmitex = collect([
            'prod_id' => $prod_id,
            'produto' => 'marmitex', 'tamanho' => $request->size, 'comida' => $food, 'valor' => $request->price
        ]);

        $cart = session()->push('cart', $marmitex);

        return redirect()->route('menu')->with('success', 'Pedido adicionado ao carrinho!');
    }

    public static function totalCart()
    {

        $total = 0;

        if (session()->exists('cart')) {
            $cart = session()->get('cart');

            foreach ($cart as $product) {
                if ($product['produto'] == 'marmitex') {
                    $total = $total + $product['valor'];
                } elseif ($product['produto'] == 'refrigerante' or $product['produto'] == 'suco') {
                    $total = $total + ($product['valor'] * $product['quantidade']);
                }
            }
        }

        $total = number_format($total, 2, ',', '.');

        return $total;
    }

    public function showCart()
    {

        $cart = session()->get('cart');


        return view('site.showCart')->with('cart', json_encode($cart));
    }

    public function emptyCart()
    {

        $cart = session()->get('cart');
        $cart = session()->forget('cart');

        return redirect()->back();
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart');

        session()->forget('cart.' . $request->prod_id);

        //dd(session('cart'));
        return redirect()->back()->with('success', 'Produto removido do carrinho');
    }

    public function checkout(Request $request)
    {
        return view('site.checkoutCart', [
            'order' => $request->order
        ]);
    }

    public function sendMessage(Request $request)
    {

        date_default_timezone_set("America/Sao_Paulo");

        $order = 'Pedido: ' . $request->order;
        $customer = 'Nome: ' . $request->customer;
        $address = 'Endereço: Rua ' . $request->street . ' nº' . $request->number . ', ' . $request->district . ' complemento: ' . $request->compliment;
        $payment = 'Forma de pagamento: ' . $request->paymentForm;

        if ($request->paymentForm == 'dinheiro') {
            if ($request->needChange == 'sim') {
                $change = 'Troco para R$' . number_format($request->change, 2, ',', '.');
            } else {
                $change = 'Não precisa de troco';
            }
        } else if ($request->paymentForm == 'cartão') {
            $change = '';
        }


        if (!(empty($request->observations))) {
            $observations = 'Observação: ' . $request->observations;
        } else {
            $observations = '';
        }

        $voucher = "Pedido gerado pelo link em " . date("d/m/Y") . ' às ' . date("H:i");
        $message = $order . $customer . '%0D ' . $address . '%0D ' . $payment . '%0D ' .  $change . '%0D ' . $observations . '%0D ' . $voucher;

        $cel = '';

        $link = 'https://wa.me/' . $cel . '?text=' . $message;

        $cart = session()->get('cart');
        $cart = session()->forget('cart');

        //echo $message;
        return redirect()->away($link);
    }
}
