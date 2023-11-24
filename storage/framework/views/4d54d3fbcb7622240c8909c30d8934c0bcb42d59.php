<?php $__env->startSection('title'); ?>
Announcement
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Announcement
<?php $__env->stopSection(); ?>

<style>
#content {
  overflow: hidden;
  /* white-space: nowrap; */
  text-overflow: ellipsis;
  text-align: justify;
  text-justify: inter-character;
  font-size:20;
  text-indent: 20px;
}
.header{
      text-align: center;
}
.logo{
    display:flex;
    align-items:center;
    justify-content: center;

}
.header img{
    float:left;
    margin-left: 5%;
    margin-top:2%;
    margin-right: 5%;

}
.header h4{

    margin-right: 10%;
    margin-top: 10px;
    font-family: 'Poppins', sans-serif;
}

</style>
<?php $__env->startSection('content'); ?>
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Announcement
        </h2>
    </div>
</div>
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

<div class="col-span-12">
    <div class="grid grid-cols-12 gap-12  mt-5">
        <?php $__empty_1 = true; $__currentLoopData = $announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-span-6 xl:col-span-6 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5" style="background-image: url('<?php echo e(asset('img/bg(1).jpg')); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative;">
                            <div class="header mb-3">
                                <div class="logo">
                                    <img class="w-20" src="<?php echo e(asset('img/logo.png')); ?>">
                                <h4 class="text-black" style="font-size:20;">
                                    <b>BULAN WATER DISTRICT</b> <br>
                                    <b> De Vera St., Zone 4, Bulan, Sorsogon</b> <br>
                                </h4>
                                </div>
                            </div>
                            <h1 class="text-lg text-black font-medium truncate text-center mt-10" style="font-size:30; font-weight: 900;">
                                 <?php echo e($data->title); ?>

                            </h1>
                            <div class="p-5">

                                <div class="mb-4">
                                    <span class="text-black" style="font-size:20; "><strong>Date:</strong> <?php echo e($data->date); ?></span>
                                </div>
                                <div class="mb-4">

                                    <span class="text-black" style="font-size:20; "><strong>Time:</strong> <?php echo e($data->time); ?></span>
                                </div>

                                <?php if($data->duration > 0): ?>
                                <div class="mb-4">
                                    <span class="text-black" style="font-size:20;"><strong>Duration:</strong> <?php echo e($data->duration); ?></span>
                                </div>
                                <?php endif; ?>

                                <p class="text-black mb-4"style="font-size:20; " >Dear Residents,</p>
                                <p class="text-black mb-4" id="content">
                                     <?php echo e($data->content); ?>

                                </p>
                                <p class="text-black" style="font-size:20;">
                                    For any inquiries or concerns, please contact our customer support at 09292216587.
                                </p>
                            </div>
                            <div class="p-5 text-black">
                                <p style="text-align:center; font-size:20;">Thank you for your cooperation.</p>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>


        <div class="flex items-center justify-center" style="margin:auto 400px;">
            <div>
                <p class="text-black" style="color: red; font-size:80px; text-align:center">NO ANNOUNCEMENT</p>
            </div>
         </div>



        <?php endif; ?>
    </div>
</div>
<div class="mt-5">
    <?php if($pagination <> false): ?>
    <?php echo $announcement->links(); ?>

    <?php endif; ?>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Capstone_Analiza\resources\views/pages/customer/announcement.blade.php ENDPATH**/ ?>