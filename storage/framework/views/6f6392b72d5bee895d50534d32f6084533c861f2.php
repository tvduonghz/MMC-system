<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Quản lý lớp lớp học phần</h2>
            <span><a href="<?php echo e(route('home')); ?>">Home</a> > Lớp học phần</span>
        </div>
    </div>
    <div class="wrapper wrapper-content  animated fadeInRight blog">
        <?php if(session('status')): ?>
    <br> <div id="error" class="alert alert-info"><?php echo e(session('status')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul style="overflow-y: scroll; max-height: 250px;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Danh sách điển sinh viên</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã sinh viên</th>
                                    <th>Tên sinh viên</th>
                                    <th>Lớp</th>
                                    <th>Điểm hệ 4</th>
                                    <th>Điểm hệ 10</th>
                                    <th>Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                <?php $__currentLoopData = $pointstudent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $std): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($std->mmc_studentid); ?></td>
                                        <td><?php echo e($std->student->mmc_fullname); ?></td>
                                        <td><?php echo e($std->student->class->mmc_classname); ?></td>
                                        <td>
                                            <?php
                                            $count=0;
                                            $item = explode("-",$std->mmc_4grade);
                                                foreach ($item as $hs4){
                                                    $hs4= (int)($hs4);
                                                    if($count == 0){
                                                        if($hs4 == 0){
                                                            echo "F ";
                                                        }elseif($hs4 == 1 ){
                                                            echo "D ";
                                                        }elseif($hs4 == 2){
                                                            echo "C ";
                                                        }elseif($hs4 == 3){
                                                             echo "B ";
                                                        }else{
                                                              echo "A ";
                                                         }
                                                    }else{
                                                        if($hs4 == 0){
                                                            echo "| F";
                                                        }elseif($hs4 == 1 ){
                                                            echo "| D";
                                                        }elseif($hs4 == 2){
                                                            echo "| C";
                                                        }elseif($hs4 == 3){
                                                             echo "| B";
                                                        }else{
                                                              echo "| A";
                                                        }
                                                    }
                                                    $count++;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $count=0;
                                            $item = explode("-",$std->mmc_10grade);
                                            foreach ($item as $hs10){
                                                $hs10= (float)($hs10);
                                                if($count == 0){
                                                    echo $hs10;
                                                }else{
                                                    echo " | ".$hs10;
                                                }
                                                $count++;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo e($std->mmc_note); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Import Excel</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form action="<?php echo e(url('/admin/subject/import')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <input type="file" name="file" class="form-control">
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary"> <i class="fa fa-file-excel-o"></i> Import Excel</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mmc/MMC-system/resources/views/admin/point/index.blade.php ENDPATH**/ ?>