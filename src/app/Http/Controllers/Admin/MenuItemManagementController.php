<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuItemManagementController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Menu Item Management';
        
        $search = $request->input('search', null);

        if ($search) {
            $menuItems = MenuItem::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $menuItems = MenuItem::all();
        }

        return view('admin.menu-items.index', compact('title', 'menuItems', 'search'));
    }

    public function createPage()
    {
        $title = 'Create Menu Item';
        
        $mode = 'create';

        $menuItem = new MenuItem;

        return view('admin.menu-items.form', compact('title', 'menuItem', 'mode'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:menu_items',
            'price' => 'required',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $menuItem = new MenuItem;

        $menuItem->name = $request->input('name');
        $menuItem->description = $request->input('description', null);
        $menuItem->price = $request->input('price');

        if ($request->file('image')) {
            $menuItem->image_url = $this->uploadImage($request->file('image'));
        }

        if ($menuItem->save()) {
            return redirect()
                ->route('admin.menu-items')
                ->with('success', 'Menu item has been created!');
        }

        return redirect()
            ->back()
            ->withInput($request->input())
            ->with('error', 'Unable to create new menu item at the moment, please contact the system administrators');
    }

    public function updatePage(MenuItem $menuItem)
    {
        $title = 'Update Menu Item';
        
        $mode = 'update';

        return view('admin.menu-items.form', compact('title', 'menuItem', 'mode'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $menuItem->name = $request->input('name');
        $menuItem->description = $request->input('description', null);
        $menuItem->price = $request->input('price');

        if ($request->file('image')) {
            $menuItem->image_url = $this->uploadImage($request->file('image'));
        }

        if ($menuItem->save()) {
            return redirect()
                ->route('admin.menu-items')
                ->with('success', 'Menu item has been updated!');
        }

        return redirect()
            ->back()
            ->withInput($request->input())
            ->with('error', 'Unable to update menu item at the moment, please contact the system administrators');
    }

    public function delete(MenuItem $menuItem)
    {
        if ($menuItem->delete()) {
            return redirect()
                ->back()
                ->with('success', 'Menu item has been deleted from the system');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Unable to delete menu item at the moment, please contact the system administrators');
        }
    }

    private function uploadImage(UploadedFile $imageFile)
    {
        $extension = $imageFile->extension();
        $filePath = MenuItem::DEFAULT_MENU_ITEM_IMAGE_FOLDER . uniqid() . '-' . md5($imageFile->path()) . '-' . strtotime("now") . '.' . $extension; 
        $imageFile->storeAs('/public', $filePath);

        return Storage::url($filePath);            
    }
}