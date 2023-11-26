@extends('layouts.admin')

@section('title')
All Requests
@endsection

@section('breadcrumbs')
All Requests
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">All Requests</h2>
        <div class="hidden md:block mx-auto text-gray-600"></div>

        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" style="padding:10px; border-radius: 20px;" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </div>
        </div>
        </form>
    </div>
</div>
@if (session()->has('success'))
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
        {{ session('success') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif
@if (session()->has('warning'))
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:bg-gray-800 dark:border-orange-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
        {{ session('warning') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-orange-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif
<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible">
    <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Date</th>
                    <th class="bg-theme-1 text-xs text-white">Request Number</th>
                    <th class="bg-theme-1 text-xs text-white">Requested Service</th>
                    <th class="bg-theme-1 text-xs text-white">Customer Name</th>
                    <th class="bg-theme-1 text-xs text-white">Address</th>
                    <th class="bg-theme-1 text-xs text-white">Landmark</th>
                    <th class="bg-theme-1 text-xs text-white">Mobile</th>
                    <th class="bg-theme-1 text-xs text-white">Plumber</th>
                    <th class="bg-theme-1 text-xs text-white">Assigned Date</th>
                    <th class="bg-theme-1 text-xs text-white">Status</th>
                    <th class="bg-theme-1 text-xs text-white">Priority Status</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($AllRequest as $data)
                <tr>
                    <td class="w-40">
                        <div class="flex">
                            {{Carbon\Carbon::parse($data->created_at)->format('M d, Y') ?? 'N/A'}}
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
                            {{$data->user->name ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex"  style=" max-width: 100px;  overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            {{$data->user->house_block_lot}} {{$data->user->street}} {{$data->user->subdivision}} {{$data->user->barangay}} {{$data->user->municipality}} {{$data->user->province}}
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            {{$data->user->landmark ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{$data->user->cp ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{$data->technician->name ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
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

                    </td>

                    <td class="w-40">
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

                <!-- View Service Information -->
                <div class="modal" id="view{{$data->id}}">
                    <div class="modal__content modal__content--lg p-5">



                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Assigned Work Details</h2>
                                <p>Request No. <u>{{$data->req_no ?? 'N/A'}}</u></p>
                            </div>
                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Name</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->name}}" readonly>
                                </div>

                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Address</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->house_block_lot}} {{$data->user->street}} {{$data->user->subdivision}} {{$data->user->barangay}} {{$data->user->municipality}} {{$data->user->province}} "readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Email</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->email}}" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer CP#</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->cp}}" readonly>
                                </div>
                                <div class="col-span-12">
                                    <label>Landmark</label>
                                    <textarea class="input w-full border mt-2 flex-1"  readonly>{{$data->user->landmark ?? 'N/A'}}</textarea>
                                </div>
                                <hr class="col-span-12 mt-2">
                                <div class="col-span-12">
                                    <label>Request Information</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->service->name ?? 'N/A'}}" readonly>
                                </div>
                                <div class="col-span-12">
                                    <label>Request Description</label>
                                    <textarea class="input w-full mt-2 flex-1 border" id="" cols="30" rows="5" readonly>{{$data->service->description ?? 'N/A'}}</textarea>
                                </div>
                                <div class="col-span-12">
                                    <label>Concerns</label>
                                    <textarea class="input w-full mt-2 flex-1 border" id="" cols="30" rows="5" readonly>{{$data->concern ?? 'N/A'}}</textarea>
                                </div>
                                <div class="col-span-12">
                                    <label>Assign Plumber</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->technician->name ?? 'N/A'}}" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->priority ?? 'N/A'}}" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500">{{$data->status ?? 'N/A'}}</p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500">{{\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'}}</p>
                                    @if($data->status == 'Completed')
                                    <label>Date Accomplished</label>
                                    <p class="text-blue-500">{{\Carbon\Carbon::parse($data->date_accomp)->format('M d, Y') ?? 'N/A'}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                            </div>

                    </div>
                </div>


                @empty
                <tr>
                    <td colspan="12" class="text-center text-red-500">No Data Found!</td>
                </tr>
               @endforelse
            </tbody>
        </table>
        @if($pagination <> false)
        {!! $AllRequest->links() !!}
        @endif

    </div>
</div>

<x-request-log-modal />
@endsection
@push('custom-scripts')
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );


</script>
@endpush
