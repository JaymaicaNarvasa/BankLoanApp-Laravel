<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Loan_application;

class ApplicationController extends Controller
{
    public function getLoans() {
        $loans = Loan_application::with('user', 'Status', 'Type')->get();
        return response()->json(['loans' => $loans]);
    }

    public function addLoan(Request $request) {
        $validator = $this->validateLoan($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loan = Loan_application::create([
            'user_id' => Auth::id(),
            'loan_status_id' => $request->loan_status_id,
            'loan_type_id' => $request->loan_type_id,
            'amount' => $request->amount,
            'interest_rate' => $request->interest_rate,
        ]);

        return response()->json(['message' => 'Loan application successfully added!', 'loan' => $loan]);
    }

    public function editLoan(Request $request, $id) {
        $validator = $this->validateLoan($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loan = Loan_application::find($id);

        if (!$loan) {
            return response()->json(['message' => 'Loan application not found.'], 404);
        }

        $loan->update($request->all());

        return response()->json(['message' => 'Loan application successfully updated!', 'loan' => $loan]);
    }

    public function deleteLoan($id) {
        $loan = Loan_application::find($id);

        if (!$loan) {
            return response()->json(['message' => 'Loan application not found.'], 404);
        }

        $loan->delete();

        return response()->json(['message' => 'Loan application successfully deleted!']);
    }

    protected function validateLoan(array $data) {
        return Validator::make($data, [
            'loan_status_id' => ['required', 'exists:loan_statuses,id'],
            'loan_type_id' => ['required', 'exists:loan_types,id'],
            'amount' => ['required', 'numeric'],
            'interest_rate' => ['required', 'numeric'],
            'application_date' => ['date'],
        ]);
    }
}
