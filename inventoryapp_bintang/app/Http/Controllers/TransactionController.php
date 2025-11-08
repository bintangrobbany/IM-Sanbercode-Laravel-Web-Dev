<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'user'])->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|integer|min:1', // Diubah dari quantity
            'type' => 'required|in:in,out',
            'notes' => 'nullable|string', // Validasi untuk notes
        ]);

        $product = Product::findOrFail($request->product_id);

        // Validasi stok jika barang keluar
        if ($request->type == 'out' && $request->amount > $product->stock) {
            return back()->withInput()->withErrors(['amount' => 'Stok tidak mencukupi. Stok saat ini: ' . $product->stock]);
        }

        DB::transaction(function () use ($request, $product) {
            // 1. Buat catatan transaksi sesuai kolom baru
            Transaction::create([
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'amount' => $request->amount, // Diubah dari quantity
                'type' => $request->type,
                'notes' => $request->notes, // Menambahkan notes
            ]);

            // 2. Update stok produk
            if ($request->type == 'in') {
                $product->stock += $request->amount; // Diubah dari quantity
            } else {
                $product->stock -= $request->amount; // Diubah dari quantity
            }
            $product->save();
        });

        return redirect('/transaction')->with('alert', [
            'type' => 'success',
            'message' => 'Transaksi berhasil dicatat!'
        ]);
    }
}