

<?php $__env->startSection('title'); ?>
Service List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Service
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-12 gap-6 mt-5">

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <h2 class="intro-y text-lg font-medium mr-5 text-center">Service Management</h2>

        <div class="intro-x text-center xl:text-left">
            <a href="javascript:;" data-toggle="modal" data-target="#add" class="rounded-full p-2 w-full text-white text-center hover:bg-blue-400 bg-theme-1 xl:mr-3 flex"><i data-feather="plus"></i><i data-feather="tool"></i></a>
            <!-- Modal show -->
            <div class="modal" id="add">
                <div class="modal__content">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Create Service
                        </h2>
                    </div>

                    <form action="<?php echo e(route('service.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>


                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            
                            <div class="col-span-12 sm:col-span-12">
                                <label for="exampleFormControlFile1">Service Name :</label>
                                <input type="text" name="name" class="input w-full" id="exampleFormControlFile1" required="">
                            </div>

                            <div class="col-span-12 sm:col-span-12">
                                <label for="exampleFormControlFile1">Service Description :</label>
                                <textarea name="description" id="" cols="30" class="input w-full" rows="4" required=""></textarea>
                            </div>

                        </div>
                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                            <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Modal end -->
        </div>
        <div class="hidden md:block mx-auto text-gray-600"></div>

        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" name="search" value="<?php echo e(request()->get('search')); ?>" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" style="padding:10px; border-radius: 20px;" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="col-span-12 lg:col-span-6">
     <?php if(session()->has('success')): ?>
        <div id="alert-border-3" class="flex items-center p-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ml-3 text-sm font-medium">
                <?php echo e(session('success')); ?>

            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            </button>
        </div>
        <?php endif; ?>
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Services</th>
                    <th class="bg-theme-1 text-xs text-white">Description</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <p class="text-xs"><?php echo e($data->name); ?></p>
                            </div>
                        </td>
                        <td class="w-40">
                            <p class="text-xs"><?php echo e($data->description); ?></p>
                        </td>
                        <td class="w-40">
                            <div class="flex">
                                <a href="<?php echo e(route('service.show',$data->id)); ?>" data-toggle="modal" data-target="#view"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="eye"></i></a>
                                <a href="javascript:;" data-toggle="modal" data-target="#edit<?php echo e($data->id); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-9 hover:bg-green-400 xl:mr-3 flex"><i data-feather="edit"></i></a>
                            </div>
                        </td>

                        <div class="modal" id="edit<?php echo e($data->id); ?>">
                            <div class="modal__content">
                                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Create Service
                                    </h2>
                                </div>

                                <form action="<?php echo e(route('service.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>


                                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                      
                                        <div class="col-span-12 sm:col-span-12">
                                            <label for="exampleFormControlFile1">Service Name :</label>
                                            <input type="text" name="name" class="input w-full" id="exampleFormControlFile1" value="<?php echo e($data->name); ?>" required="">
                                        </div>

                                        <div class="col-span-12 sm:col-span-12">
                                            <label for="exampleFormControlFile1">Service Description :</label>
                                            <textarea name="description" id="" cols="30" class="input w-full" rows="4" required=""><?php echo e($data->description); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                        <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                                        <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center text-red-500">No Data Found!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="mt-3">
            <?php if($pagination <> false): ?>
            <?php echo $service->links(); ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<script src="<?php echo e(asset('js/employee.js')); ?>"></script>
<script src="<?php echo e(asset('js/html2canvas.js')); ?>"></script>
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('../../layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Capstone_Analiza\resources\views/pages/admin/service/index.blade.php ENDPATH**/ ?>