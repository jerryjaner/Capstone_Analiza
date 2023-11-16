<tr class="intro-x">
    <td class="w-40">
        <div class="flex">
            <p class="text-xs"><?php echo e($formattedDate); ?></p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <p class="text-xs"><?php echo e($data->req_no); ?></p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <p class="text-xs"><?php echo e($data->user->name); ?></p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <p class="text-xs"><?php echo e($data->user->house_block_lot); ?> <?php echo e($data->user->street); ?> <?php echo e($data->user->subdivision); ?> <?php echo e($data->user->barangay); ?> <?php echo e($data->user->municipality); ?> <?php echo e($data->user->province); ?></p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <p class="text-xs"><?php echo e($totalAmount); ?></p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <a href="<?php echo e(route('sell.assetListAd', $data->id)); ?>" data-toggle="modal" data-target="#view"
                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="eye"></i></a>
        </div>
    </td>
</tr>
<?php /**PATH C:\Users\th_developer\Desktop\Capstone_Analiza\resources\views/components/request-log-row.blade.php ENDPATH**/ ?>