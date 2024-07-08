<?php

namespace App\Http\Controllers;

use App\Models\Criteria as ModelsCriteria;
use App\Models\CriteriaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Criteria extends Controller
{
    public function index()
    {
        $criteria = ModelsCriteria::latest()->whereNull('deleted_at')->paginate(5);
        return view('criteria.index', compact('criteria'));
    }

    public function create()
    {
        return view('criteria.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'percentage' => "required",
            'note' => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        ModelsCriteria::create([
            'name' => $request->name,
            'note' => $request->note,
            'percentage' => $request->percentage,
        ]);
        return redirect()->route('criteria.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(ModelsCriteria $criterion)
    {
        return view("criteria.edit", compact('criterion'));
    }

    public function update(Request $request, ModelsCriteria $criterion)
    {
        $this->validate($request, [
            'name' => "required",
            'percentage' => "required",
            'note' => "required"
        ]);

        $criterion->update([
            'name' => $request->name,
            'note' => $request->note,
            'percentage' => $request->percentage,
        ]);
        return redirect()->route('criteria.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(ModelsCriteria $criterion)
    {
        $criterion->deleted_at = now();
        $criterion->save();
        return redirect()->route('criteria.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
