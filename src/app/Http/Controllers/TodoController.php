<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(): View
    {
        $todos = Todo::orderBy('id')->get();

        return view('index', compact('todos'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:20'],
        ]);

        Todo::create($validated);

        return redirect('/')->with('message', 'Todoを作成しました。');
    }

    public function update(Request $request, Todo $todo): RedirectResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:20'],
        ]);

        $todo->update($validated);

        return redirect('/')->with('message', 'Todoを更新しました。');
    }

    public function destroy(Todo $todo): RedirectResponse
    {
        $todo->delete();

        return redirect('/')->with('message', 'Todoを削除しました。');
    }
}