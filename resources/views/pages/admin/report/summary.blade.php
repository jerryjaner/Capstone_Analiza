@extends('../../layouts.admin')

@section('title')
Summary Report
@endsection

@section('breadcrumbs')
Summary Report
@endsection

@push('custom-links')

<style>


    @media print {
       #report_header{
            margin: 50px !important;
       }

        .action {
            display: none !important;
        }

        table {
            border-collapse: collapse !important;
            border-spacing: 0 !important;
            width: 100% !important;
            border: 1px solid #020202 !important;
        }

        th,
        td {
            text-align: left !important;
            padding: 16px !important;
            border: 1px solid #020202 !important;

        }

        th {
            color: black !important;
            font-size: 15px !important;
            text-align:center !important;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2 !important;
        }
    }
</style>

@endpush

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    {{-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <h2 class="intro-y text-lg font-medium mr-5 text-center">Summary Report</h2>


        <div class="hidden md:block mx-auto text-gray-600"></div>

        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">

        </div>
        </form>

    </div> --}}

    <div class="md:block mx-auto text-gray-600 intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <form method="GET" class="p-5 grid grid-cols-12 gap-4 row-gap-1">
            <div class="col-span-12 sm:col-span-3">
                <input type="text" class="input" name="daterange" id="daterange" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <button type="submit" class="button rounded-md p-3 w-full  mx-auto text-white bg-theme-1 hover:bg-blue-400 flex"><i data-feather="calendar" class="mr-5"></i>Filter by Date</button>
            </div>
            <div class="col-span-6 sm:col-span-3 text-center">
                <a href="{{ route('sell.summary') }}" class="button button--lg text-white text-center bg-theme-9 hover:bg-green-400 flex"><i data-feather="refresh-cw" class="mr-5"></i>Refresh</a>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <button   onclick="printDiv('contentToPrint')" type="button" class="button bg-theme-1 flex items-center w-20 border text-white dark:border-dark-5 dark:text-white" style="background-color: green; "><i data-feather="printer"></i> Print</button>
            </div>
        </form>

    </div>
</div>
{{-- <div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Location</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Count of Complaints</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersByBarangay as $barangay => $count)
                    @include('components.brgy-row', [
                            'brgy' => $barangay,
                            'count' => $count,
                        ])
                @endforeach
            </tbody>
        </table>
        @if($pagination <> true)
        {!! $usersByBarangay->links() !!}
        @endif
    </div>
</div> --}}


<div class="col-span-12 lg:col-span-6" id="contentToPrint">
    <h1 class="intro-y text-xl font-medium mr-5 text-center mt-10" id="report_header">Bulan Water District Summary Report</h1>
    <div class="intro-y overflow-auto xxxl:overflow-visible">
    <table class="table table-report sm:mt-2" >
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;" id="header">Customer Name</th>
                    <th class="bg-theme-1 text-xs text-white" id="header">Request Number</th>
                    <th class="bg-theme-1 text-xs text-white" id="header">Requested Service</th>
                    <th class="bg-theme-1 text-xs text-white" id="header">Date</th>
                    {{-- <th class="bg-theme-1 text-xs text-white">Address</th>
                    <th class="bg-theme-1 text-xs text-white">Technician</th> --}}
                    {{-- <th class="bg-theme-1 text-xs text-white">Assigned Date</th> --}}
                    {{-- <th class="bg-theme-1 text-xs text-white">Status</th>
                    <th class="bg-theme-1 text-xs text-white">Priority Status</th> --}}
                    <th class="bg-theme-1 text-xs text-white" id="header">Total Amount</th>
                    <th class="bg-theme-1 text-xs text-white action hidden" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($summary_report as $data)
                <tr>
                    <td class="w-40">
                        <div class="flex">
                            {{$data->user->name ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{$data->req_no ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{$data->service->name ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{Carbon\Carbon::parse($data->created_at)->format('M d, Y') ?? 'N/A'}}
                        </div>
                    </td>

                    {{-- <td class="w-40">
                        <div class="flex" style=" max-width: 200px;  overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            {{$data->user->house_block_lot}} {{$data->user->street}} {{$data->user->subdivision}} {{$data->user->barangay}} {{$data->user->municipality}} {{$data->user->province}}
                        </div>
                    </td>


                    <td class="w-40">
                        <div class="flex">
                            {{$data->technician->name ?? 'N/A'}}
                        </div>
                    </td> --}}

                    {{-- <td class="w-40">
                        <div class="flex">
                            {{\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'}}
                        </div>
                    </td> --}}

                    {{-- <td class="w-40">
                        @if($data->status != 'Cancelled')
                        <div class="flex {{($data->status == 'Pending')? 'text-red-500' : ($data->status == 'Inprocess' ? 'text-orange-500' : 'text-green-500')}}">
                            {{$data->status ?? 'N/A'}}
                        </div>
                        @else
                        <div class="flex">
                            {{$data->status ?? 'N/A'}}
                        </div>
                        @endif
                    </td>
                    <td class="w-40">
                        @if ($data->priority == 'Low')

                            <div class="flex" style="color: green">
                                {{$data->priority ?? 'N/A'}}
                            </div>

                        @elseif ($data->priority == 'Medium')

                            <div class="flex" style="color: orange">
                                {{$data->priority ?? 'N/A'}}
                            </div>

                        @elseif ($data->priority == 'Completed')

                            <div class="flex" style="color: red">
                                {{$data->priority ?? 'N/A'}}
                            </div>

                        @else

                            <div class="flex">
                                {{$data->priority ?? 'N/A'}}
                            </div>


                        @endif

                    </td> --}}
                    @php
                        $sum = 0;
                        foreach ($assignedAssets as $asset) {
                            if ($asset->service_request_id === $data->id) {
                                $sum += $asset->total_price_amount + $asset->total_cost_lbc;
                            }
                        }
                    @endphp
                    <td class="w-40">
                        <div class="flex">
                              <b> {{$sum}} </b>
                        </div>
                    </td>

                    <td class="w-40 action hidden">
                        <div class="flex">
                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#view{{$data->id}}"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="eye"></i>
                            </a>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center text-red-500">No Data Found!</td>
                </tr>
               @endforelse
            </tbody>
        </table>
        @if($pagination <> false)
        {!! $summary_report->links() !!}
        @endif

    </div>
</div>



@endsection


@push('custom-scripts')
<script>
    $(function() {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
    </script>
<script src="{{asset('js/html2canvas.js')}}"></script>

{{-- FOR THE PRINTING OF RECEIPT--}}
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

@endpush
