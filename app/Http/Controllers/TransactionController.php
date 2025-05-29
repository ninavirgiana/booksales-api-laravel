<?php


namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TransactionController extends Controller
{
public function index()
{
    $transactions = Transaction::with('customer', 'book')->get(); 
    
    if ($transactions->isEmpty()) {
        return response()->json([
            "success" => true,
            "message" => "Resource data not found!"
        ], 200);
    }
    
    return response()->json([
        "success" => true,
        "message" => "Get all resources",
        "data" => $transactions
    ]);
}

public function store(Request $request)
{
    // 1. Validator & check validator
    $validator = Validator::make($request->all(), [
        'book_id' => 'required|exists:books,id',
        'quantity' => 'required|integer|min:1',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ], 422);
    }

    // 2. Generate orderNumber -> unique | ORD-0003
$uniqueCode = "ORD-" . strtoupper(uniqid());
    // 3. Get logged in user & check login
    $user = auth()->user();
    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized - User not logged in'
        ], 401);
    }

    // 4. Find book data from request
    $book = Books::find($request->book_id);
    

    // 5. Check book stock
    if ($book->stock < $request->quantity) {
        return response()->json([
            'success' => false,
            'message' => 'Stock tidak cukup'
        ], 400);
    }

    // 6. Calculate total price = price * quantity
    $totalAmount = $book->price * $request->quantity;

    // 7. Reduce book stock (update)
    $book->stock -= $request->quantity;
    $book->save();

    // 8. Save transaction data
    $transaction = Transaction::create([
        'order_number' => $uniqueCode,
        'customer_id' => $user->id,
        'book_id' =>  $request->book_id,
        'total_amount' => $totalAmount,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Transaction created successfully',
        'data' => $transaction
    ], 201);
}

    public function show(Transaction $transaction)
    {
        $user = Auth::user();
        
        if ($user->role === 'customer' && $user->id !== $transaction->customer_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($transaction->load(['customer', 'book']));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $user = Auth::user();
        
        if ($user->role === 'customer' && $user->id !== $transaction->customer_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'quantity' => 'sometimes|integer|min:1',
        ]);

        if (isset($validated['quantity'])) {
            $book = $transaction->book;
            $quantityDifference = $validated['quantity'] - $transaction->quantity;
            
            if ($book->stock < $quantityDifference) {
                return response()->json(['message' => 'Not enough stock for this update'], 400);
            }

            $transaction->update([
                'total_amount' => $book->price * $validated['quantity'],
            ]);

            $book->decrement('stock', $quantityDifference);
        }

        return response()->json($transaction->fresh()->load('book'));
    }

    public function destroy(Transaction $transaction)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $book = $transaction->book;
        $book->increment('stock', $transaction->quantity);

        $transaction->delete();
        return response()->json(null, 204);
    }
}
