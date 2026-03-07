<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{
    //
    public function index()
    {
        $menus = \App\Models\Menu::orderBy('order')->get();
        return view('admin.menu.index', compact('menus'));
    }

    public function toggle($id)
    {
        //toggle menu
        $menu=\App\Models\Menu::findorFail($id);
        $menu->is_active=!$menu->is_active;
        $menu->save();
        Cache::forget('menus');
        return redirect()->back()->with('success', 'Status menu berhasil diubah.');
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'route' => 'nullable|string|max:255',
            'order' => 'required|integer',
        ], [
            'name.required' => 'Nama menu wajib diisi.',
            'name.string' => 'Nama menu harus berupa teks.',
            'name.max' => 'Nama menu tidak boleh lebih dari 255 karakter.',
            'icon.string' => 'Icon menu harus berupa teks.',
            'icon.max' => 'Icon menu tidak boleh lebih dari 255 karakter.',
            'route.string' => 'Route menu harus berupa teks.',
            'route.max' => 'Route menu tidak boleh lebih dari 255 karakter.',
            'order.required' => 'Urutan menu wajib diisi.',
            'order.integer' => 'Urutan menu harus berupa angka.',
        ]);

        \App\Models\Menu::create($request->only('name', 'icon', 'route', 'order'));
        Cache::forget('menus');
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $menu = \App\Models\Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'route' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'required|boolean',
        ],[
            'name.required' => 'Nama menu wajib diisi.',
            'name.string' => 'Nama menu harus berupa teks.',
            'name.max' => 'Nama menu tidak boleh lebih dari 255 karakter.',
            'icon.string' => 'Icon menu harus berupa teks.',
            'icon.max' => 'Icon menu tidak boleh lebih dari 255 karakter.',
            'route.string' => 'Route menu harus berupa teks.',
            'route.max' => 'Route menu tidak boleh lebih dari 255 karakter.',
            'order.required' => 'Urutan menu wajib diisi.',
            'order.integer' => 'Urutan menu harus berupa angka.',
            'is_active.required' => 'Status aktif menu wajib diisi.',
            'is_active.boolean' => 'Status aktif menu harus berupa true atau false.',
        ]);

        $menu = \App\Models\Menu::findOrFail($id);
        $menu->update($request->only('name', 'icon', 'route', 'order', 'is_active'));
        Cache::forget('menus');
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $menu = \App\Models\Menu::findOrFail($id);
        $menu->delete();
        Cache::forget('menus');
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
