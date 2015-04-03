<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use Session;

class CategoryController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    public function getIndex(Request $request) {
        $categories = \App\Models\Category::paginate($this->recordPerPage);

        $categoryCount = \App\Models\Category::count();

        $categories->setPath('categories');

        return view('category/index')->with('categories', $categories)->with('categoryCount', $categoryCount);
    }

    public function addCategory(Request $request) {
        if ($request->isMethod('post')) {
            $rules = \App\Models\Category::$rules;
            $rules['name'] = $rules['name'] . ',name,null,null';
            $messages = \App\Models\Category::$messages;
            $v = \Validator::make($request->all(), $rules, $messages);
            if ($v->passes()) {
                $categoryObj = new \App\Models\Category();
                $categoryObj->name = \Input::get('name');
                $categoryObj->is_active = \Input::get('is_active', 0);
                $categoryObj->created_at = date('Y-m-d H:i:s');
                $categoryObj->updated_at = date('Y-m-d H:i:s');
                $categoryObj->save();
                return redirect('categories')->with('message', 'Category has been successfully saved.');
            } else {
                return redirect('category/add')->withErrors($v)->withInput();
            }
        }
        return view('category/add');
    }

    public function editCategory(Request $request, $id) {
        if ($request->isMethod('post')) {

            $rules = \App\Models\Category::$rules;
            $messages = \App\Models\Category::$messages;
            $rules['name'] = 'required|unique:categories,name,' . $id . ',id';
            $messages['name.unique'] = 'Name already taken.';

            $v = \Validator::make($request->all(), $rules, $messages);
            if ($v->passes()) {
                $categoryObj = \App\Models\Category::find($id);
                $categoryObj->name = \Input::get('name');
                $categoryObj->is_active = \Input::get('is_active', 0);
                $categoryObj->updated_at = date('Y-m-d H:i:s');
                $categoryObj->save();
            } else {
                return redirect('category/' . $id . '/edit')->withErrors($v)->withInput();
            }
            return redirect('categories')->with('message', 'Category have been successfully updated.');
        }
        $categoryDetail = \App\Models\Category::find($id);
        return view('category/edit')->with('categoryDetail', $categoryDetail);
    }

    public function deleteCategory($id) {
        $categoryObj = \App\Models\Category::find($id);
        $categoryObj->delete();
        return redirect('categories')->with('message', 'Category has been successfully deleted.');
    }

}
