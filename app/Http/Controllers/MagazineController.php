<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use Session;

class MagazineController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    public function getIndex(Request $request) {

        if ($request->get('searchval') != '' || $request->get('cid') != '') {
            $whereQry = "1=1 ";
            $whereQry .= $request->get('searchval') != '' ? " and name like '%" . $request->get('searchval') . "%' " : "";
            $whereQry .= $request->get('cid') != '' ? " and category_id = '" . $request->get('cid') . "' " : "";
            echo $whereQry;
            $magazines = \App\Models\Magazine::whereRaw($whereQry)->paginate($this->recordPerPage);
        } else {
            $magazines = \App\Models\Magazine::paginate($this->recordPerPage);
        }
        $magazineCount = \App\Models\Magazine::count();

        $magazines->setPath('magazines');

        return view('magazine/index')->with('magazines', $magazines)->with('magazineCount', $magazineCount)
                        ->with('searchval', $request->get('searchval'))->with('category_id', $request->get('cid'));
    }

    public function addMagazine(Request $request) {
        if ($request->isMethod('post')) {
            $rules = \App\Models\Magazine::$rules;
            $rules['name'] = $rules['name'] . ',name,null,null';
            $messages = \App\Models\Magazine::$messages;

            $v = \Validator::make($request->all(), $rules, $messages);
            if ($v->passes()) {
                $magazine = new \App\Models\Magazine();
                $magazine->name = \Input::get('name');
                $magazine->description = \Input::get('description');
                $magazine->category_id = \Input::get('category_id');
                $magazine->is_active = \Input::get('is_active', 0);
                $magazine->created_at = date('Y-m-d H:i:s');
                $magazine->updated_at = date('Y-m-d H:i:s');
                $magazine->save();
                return redirect('magazines')->with('message', 'Magazine has been successfully saved.');
            } else {
                return redirect('magazine/add')->withErrors($v)->withInput();
            }
        }
        return view('magazine/add');
    }

    public function editMagazine(Request $request, $id) {
        if ($request->isMethod('post')) {

            $rules = \App\Models\Magazine::$rules;
            $messages = \App\Models\Magazine::$messages;
            $rules['name'] = 'required|unique:magazines,name,' . $id . ',id';
            $messages['name.unique'] = 'Name already taken.';

            $v = \Validator::make($request->all(), $rules, $messages);
            if ($v->passes()) {
                $magazine = \App\Models\Magazine::find($id);
                $magazine->name = \Input::get('name');
                $magazine->description = \Input::get('description');
                $magazine->category_id = \Input::get('category_id');
                $magazine->is_active = \Input::get('is_active', 0);
                $magazine->updated_at = date('Y-m-d H:i:s');
                $magazine->save();
            } else {
                return redirect('magazine/' . $id . '/edit')->withErrors($v)->withInput();
            }
            return redirect('magazines')->with('message', 'Magazine have been successfully updated.');
        }
        $magazineDetail = \App\Models\Magazine::find($id);
        return view('magazine/edit')->with('magazineDetail', $magazineDetail);
    }

    public function deleteMagazine($id) {
        $magazine = \App\Models\Magazine::find($id);
        $magazine->delete();
        return redirect('magazines')->with('message', 'Magazine has been successfully deleted.');
    }

}

