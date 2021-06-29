<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $diary = self::getDiaryOrCreate();

        return view('diary.index')->with('diary', $diary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $diary = Diary::find($id);
        $diary->delete();

        return redirect('/diary')->with('success', 'Diary Destroyed');
    }

    /**
     * @return Diary
     */
    private function getDiaryOrCreate(): Diary
    {
        /** @var User $user */
        $user = User::find(auth()->user()->getAuthIdentifier());

        /** @var Diary $diary */
        $diary = $user->diary()->first();

        if (! $diary) {
            $diary = new Diary();
            $diary->user_id = $user->getAuthIdentifier();
            $diary->save();
        }

        return $diary;
    }
}
