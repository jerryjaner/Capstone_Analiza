<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ServiceRequest,AssignedTransactionAsset,Asset,User};

class SellController extends Controller
{

    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');

            $assignedAssets = AssignedTransactionAsset::get();
            $request_log = ServiceRequest::with(['service', 'technician'])
                ->where(function ($query) use ($searchQuery) {
                    $query->where('req_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('account_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('status', 'LIKE', "%$searchQuery%")
                        ->orWhere('causes_of_request', 'LIKE', "%$searchQuery%")
                        ->orWhere('findings', 'LIKE', "%$searchQuery%")
                        ->orWhere('action_taking', 'LIKE', "%$searchQuery%")
                        ->orWhere('date_accomp', 'LIKE', "%$searchQuery%");
                })->get();
            $pagination = false;
            return view('pages.admin.report.sell', [
                'request_log' => $request_log,
                'assignedAssets' => $assignedAssets,
                'pagination' => $pagination
            ]);
        } else {
            $pagination = true;
            $query = ServiceRequest::with(['service', 'technician']);

            if ($request->filled('daterange')) {
                list($startDate, $endDate) = explode(' - ', $request->input('daterange'));

                $startDate = date('Y-m-d', strtotime($startDate));
                $endDate = date('Y-m-d', strtotime($endDate));

                $query->whereBetween('updated_at', [$startDate, $endDate]);
            }

            $request_log = $query->paginate(5);
            $assignedAssets = AssignedTransactionAsset::get();

            return view('pages.admin.report.sell', [
                'request_log' => $request_log,
                'assignedAssets' => $assignedAssets,
                'pagination' => $pagination
            ]);
        }
    }

    public function assetListAd($id)
    {
        $service = ServiceRequest::findOrFail($id);
        $assignedAssets = AssignedTransactionAsset::where('service_request_id', $id)->get();
        $totalPriceAmount = $assignedAssets->sum('total_price_amount');
        $totalCostLbc = $assignedAssets->sum('total_cost_lbc');

        return view('pages.admin.report.view-sell', [
            'assets' => Asset::get(),
            'assigned_asset' => $assignedAssets,
            'req_info' => $service,
            'req_id' => $id,
            'totalPriceAmount' => $totalPriceAmount,
            'totalCostLbc' => $totalCostLbc,
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function summary(Request $request)
    {

        // $pagination = true;
        // $summary_report = ServiceRequest::with(['AssignedTransactionAsset', 'service', 'technician'])->get();

        // // Group the AssignedTransactionAsset records by service_request_id
        // $groupedTransactions = $summary_report->flatMap(function ($serviceRequest) {
        //     return $serviceRequest->AssignedTransactionAsset->groupBy('service_request_id');
        // });

        // // Calculate grand totals
        // $grandTotalPrice = $summary_report->flatMap->AssignedTransactionAsset->sum('total_price_amount');
        // $grandTotalCostLBC = $summary_report->flatMap->AssignedTransactionAsset->sum('total_cost_lbc');


        // return view('pages.admin.report.summary', [
        //     'summary_report' => $summary_report,
        //     'grandTotalPrice' => $grandTotalPrice,
        //     'grandTotalCostLBC' => $grandTotalCostLBC,
        //     'pagination' => $pagination,
        // ]);


        if ($request->filled('search')) {
            $searchQuery = $request->input('search');

            $assignedAssets = AssignedTransactionAsset::get();
            $summary_report = ServiceRequest::with(['service', 'technician', 'AssignedTransactionAsset'])
                ->where(function ($query) use ($searchQuery) {
                    $query->where('req_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('account_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('status', 'LIKE', "%$searchQuery%");

                })->get();
            $pagination = false;
            return view('pages.admin.report.summary', [
                'summary_report' => $summary_report,
                'assignedAssets' => $assignedAssets,
                'pagination' => $pagination
            ]);
        } else {
            $pagination = true;
            $query = ServiceRequest::with(['service', 'technician','AssignedTransactionAsset']);

            if ($request->filled('daterange')) {
                list($startDate, $endDate) = explode(' - ', $request->input('daterange'));

                $startDate = date('Y-m-d', strtotime($startDate));
                $endDate = date('Y-m-d', strtotime($endDate));

                $query->whereBetween('created_at', [$startDate, $endDate]);
            }

            $summary_report = $query->paginate(10);
            $assignedAssets = AssignedTransactionAsset::get();

            return view('pages.admin.report.summary', [
                'summary_report' => $summary_report,
                'assignedAssets' => $assignedAssets,
                'pagination' => $pagination
            ]);
        }

    }













    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
