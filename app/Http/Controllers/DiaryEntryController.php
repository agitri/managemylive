<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\DiaryEntry;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiaryEntryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('diary.create');
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
            'title' => 'required',
            'content' => 'required'
        ]);

        /** @var User $user */
        $user = User::find(auth()->user()->getAuthIdentifier());

        /** @var Diary $diary */
        $diary = $user->diary()->first();

        // Create a Diary Entry
        $entry = new DiaryEntry();
        $entry->diary_id = $diary->id;
        $entry->title = $request->input('title');
        $entry->content = $request->input('content');
        $entry->save();

        return redirect('/diary')->with('success', 'Diary Entry Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $entry = DiaryEntry::find($id);

        return view('diary.edit')->with('entry', $entry);
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
            'title' => 'required',
            'content' => 'required'
        ]);

        // Create a Diary Entry
        $entry = DiaryEntry::find($id);
        $entry->title = $request->input('title');
        $entry->content = $request->input('content');
        $entry->save();

        return redirect('/diary')->with('success', 'Diary Entry Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $item = DiaryEntry::find($id);
        $item->delete();

        return redirect('/diary')->with('success', 'Diary Entry Removed');
    }
}
