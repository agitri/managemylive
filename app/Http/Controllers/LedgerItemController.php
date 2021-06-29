<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Models\LedgerItem;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LedgerItemController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('ledger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'description' => 'required',
            'type' => 'required',
            'amount' => 'required'
        ]);

        /** @var User $user */
        $user = User::find(auth()->user()->getAuthIdentifier());

        /** @var Ledger $ledger */
        $ledger = $user->ledger()->first();

        // Create a Ledger Item
        $item = new LedgerItem();
        $item->ledger_id = $ledger->id;
        $item->description = $request->input('description');
        $item->type = $request->input('type');
        $item->amount = $request->input('amount');
        $item->save();

        return redirect('/ledger')->with('success', 'Ledger Item Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $item = LedgerItem::find($id);

        return view('ledger.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validate($request, [
            'description' => 'required',
            'type' => 'required',
            'amount' => 'required'
        ]);

        // Create a Ledger Item
        $item = LedgerItem::find($id);
        $item->description = $request->input('description');
        $item->type = $request->input('type');
        $item->amount = $request->input('amount');
        $item->save();

        return redirect('/ledger')->with('success', 'Ledger Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $item = LedgerItem::find($id);
        $item->delete();

        return redirect('/ledger')->with('success', 'Ledger Item Removed');
    }
}
