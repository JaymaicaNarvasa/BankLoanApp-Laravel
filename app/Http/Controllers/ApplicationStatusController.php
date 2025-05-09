<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LoanStatus;

class LoanStatusController extends Controller
{
    public function getLoanStatuses() {
        $statuses = LoanStatus::all();
        return response()->json(['statuses' => $statuses]);
    }

    public function addLoanStatus(Request $request) {
        $validator = $this->validateLoanStatus($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $status = LoanStatus::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Loan status successfully added!', 'status' => $status]);
    }

    public function editLoanStatus(Request $request, $id) {
        $validator = $this->validateLoanStatus($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $status = LoanStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Loan status not found.'], 404);
        }

        $status->update($request->all());

        return response()->json(['message' => 'Loan status successfully updated!', 'status' => $status]);
    }

    public function deleteLoanStatus($id) {
        $status = LoanStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Loan status not found.'], 404);
        }

        $status->delete();

        return response()->json(['message' => 'Loan status successfully deleted!']);
    }

    protected function validateLoanStatus(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }
}
