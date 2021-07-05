<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ledger;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $ledger = self::getLedgerOrCreate();

        return view('ledger.index')->with('ledger', $ledger);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $item = Ledger::find($id);
        $item->delete();

        return redirect('/ledger')->with('success', 'Ledger Destroyed');
    }

    /**
     * @return Ledger
     */
    private function getLedgerOrCreate(): Ledger
    {
        /** @var User $user */
        $user = User::find(auth()->user()->getAuthIdentifier());

        /** @var Ledger $ledger */
        $ledger = $user->ledger()->first();

        if (! $ledger) {
            $ledger = new Ledger();
            $ledger->user_id = $user->getAuthIdentifier();
            $ledger->save();
        }

        return $ledger;
    }
}
