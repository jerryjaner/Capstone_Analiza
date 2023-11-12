<?php $__env->startSection('title'); ?>
Login | SRMS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #000;
    }

    th, td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    .NotFound{

        border: 1px solid white;
    }
</style>
<form  action="<?php echo e(route('account.search')); ?>"  method="GET">
    <?php echo csrf_field(); ?>
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-0 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <img alt="" class="-intro-x w-30 mx-auto" src="<?php echo e(asset('img/logo.png')); ?>">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center">
                Search Account
            </h2>

            <div class="flex">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'intro-x mt-4 mx-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-x mt-4 mx-auto']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if(session('status')): ?>
                    <div class="mb-4 font-medium text-lg text-green-700">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('error_message')): ?>
                    <div class="mb-4 font-medium text-lg text-red-700">
                        <?php echo e(session('error_message')); ?>

                    </div>
                <?php endif; ?>
            </div>


            <div class="intro-x mt-8 flex">
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" name="account_no" placeholder="Search Account Number">
                

            </div>

            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left" style="display: flex; justify-content: space-between;">
                <a href="<?php echo e(route('login')); ?>" class="button button--lg w-32 text-white bg-theme-9 xl:mr-3">Login</a>
                <button type="submit" class="button button--lg w-32 text-white bg-theme-1 xl:mr-3">Submit</button>

            </div>




            <div class="intro-x mt-8">
                <table>
                    <thead>
                        <tr>
                            <?php if(request()->filled('account_no') && count($accounts) > 0): ?>
                                <th>Account Number</th>
                                <th>Account Name</th>
                                <th>Login Approval</th>
                            <?php elseif(request()->filled('account_no') && count($accounts) === 0): ?>


                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(request()->filled('account_no') && count($accounts) > 0): ?>
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($account->account_no); ?></td>
                                    <td><?php echo e($account->name); ?></td>

                                    <?php if($account->verification == '1'): ?>
                                       <td><p  style="color: green;">Approved</p></td>
                                    <?php elseif($account->verification == '0'): ?>
                                        <td><p style="color: red;">Not Approved</p></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php elseif(request()->filled('account_no') && count($accounts) === 0): ?>
                            <tr>
                                <td  class="NotFound" ><p style="color: red; text-align:center;">No Account Found.</p></td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>

            </div>

            




        </div>
    </div>
</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/auth/account-search.blade.php ENDPATH**/ ?>