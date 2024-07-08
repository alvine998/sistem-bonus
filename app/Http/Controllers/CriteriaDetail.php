<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\CriteriaDetail as ModelsCriteriaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CriteriaDetail extends Controller
{
    public function index(Criteria $criterion)
    {
        $criteria_detail = ModelsCriteriaDetail::where('criteria_id', '=', $criterion->id)->whereNull('deleted_at')->orderBy('score', 'desc')->paginate(5);
        return view('criteriadetail.index', compact('criteria_detail', 'criterion'));
    }

    public function create(Criteria $criterion)
    {
        return view('criteriadetail.create', compact('criterion'));
    }

    public function store(Request $request, Criteria $criterion)
    {
        $validator = Validator::make($request->all(), [
            'detail' => "required",
            'score' => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        ModelsCriteriaDetail::create([
            'criteria_id' => $criterion->id,
            'criteria_name' => $criterion->name,
            'detail' => $request->detail,
            'score' => $request->score,
        ]);
        return redirect()->route('detail.index', $criterion)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Criteria $criterion, ModelsCriteriaDetail $detail)
    {
        return view("criteriadetail.edit", compact('criterion', 'detail'));
    }

    public function update(Request $request, Criteria $criterion, ModelsCriteriaDetail $detail)
    {
        $this->validate($request, [
            'detail' => "required",
            'score' => "required"
        ]);

        $detail->update($request->all());
        return redirect()->route('detail.index', ['criterion' => $criterion->id])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(Criteria $criterion, ModelsCriteriaDetail $detail)
    {
        $detail->deleted_at = now();
        $detail->save();
        return redirect()->route('detail.index', ['criterion' => $criterion->id])->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
