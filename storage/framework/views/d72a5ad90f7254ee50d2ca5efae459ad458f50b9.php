<?php $__env->startSection('title'); ?>
Summary Report
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Summary Report
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-links'); ?>

<style>
    .button{

        justify-content: center !important;
    }


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

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-12 gap-6 mt-5">
    

    <div class="md:block mx-auto text-gray-600 intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <form method="GET" class="p-5 grid grid-cols-12 gap-4 row-gap-1">
            <div class="col-span-12 sm:col-span-3">
                <input type="text" class="input" name="daterange" id="daterange"  style="padding:11px;"/>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <button type="submit" class="button rounded-md p-3 w-full  mx-auto text-white bg-theme-1 hover:bg-blue-400 flex"><i data-feather="calendar" class="mr-5"></i>Filter by Date</button>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <a href="<?php echo e(route('sell.summary')); ?>" class="button button--lg w-full mx-auto text-white text-center bg-theme-9 hover:bg-green-700 flex"><i data-feather="refresh-cw" class="mr-5"></i>Refresh Filter</a>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <button onclick="printDiv('contentToPrint')"  class="button rounded-md p-3 w-full mx-auto text-white bg-theme-7 hover:bg-blue-400 flex"><i data-feather="printer" class="mr-5"></i>Print Report</button>
            </div>
        </form>
    </div>
</div>



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
                    <th class="bg-theme-1 text-xs text-white" id="header">Total Amount</th>
                    <th class="bg-theme-1 text-xs text-white action hidden" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $summary_report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $sum = 0;
                        foreach ($assignedAssets as $asset) {
                            if ($asset->service_request_id === $data->id) {
                                $sum += $asset->total_price_amount + $asset->total_cost_lbc;
                            }
                        }
                    ?>
                <tr>
                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->req_no ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->service->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e(Carbon\Carbon::parse($data->created_at)->format('M d, Y') ?? 'N/A'); ?>

                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                              <b> <?php echo e($sum); ?> </b>
                        </div>
                    </td>

                    <td class="w-40 action hidden">
                        <div class="flex">
                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#view<?php echo e($data->id); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="12" class="text-center text-red-500">No Data Found!</td>
                </tr>
               <?php endif; ?>
            </tbody>
        </table>
        <?php if($pagination <> false): ?>
             <?php echo $summary_report->links(); ?>

        <?php endif; ?>

    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('custom-scripts'); ?>
<script>
    $(function() {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
    </script>
<script src="<?php echo e(asset('js/html2canvas.js')); ?>"></script>


<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('../../layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Capstone_Analiza\resources\views/pages/admin/report/summary.blade.php ENDPATH**/ ?>