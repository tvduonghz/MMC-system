<?php $__env->startSection('content'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Sửa Thông Tin Giảng Viên</h2>
		<span><a href="<?php echo e(route('home')); ?>">Home</a> > <a href="<?php echo e(route('danh-sach-giang-vien')); ?>">Quản Lý Giảng Viên</a> > <a href="<?php echo e(route('get-sua-thong-tin-giang-vien',$sua->id)); ?>">Sửa Thông Tin Giảng Viên</a></span>
	</div>
</div>


<div class="wrapper wrapper-content  animated fadeInRight blog">
    					
    <div class="row my-3">
        <div class="col-lg-12">
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <strong>Lỗi! </strong><?php echo e($err); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> 
            <?php endif; ?>

            <?php if(session('thongbao')): ?>
                <div class="alert alert-success ">
                    <strong>Thành Công! </strong> <?php echo e(session('thongbao')); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="container">

                    <form action="<?php echo e(route('post-sua-thong-tin-giang-vien',$sua->id)); ?>" method="post" enctype="multipart/form-data" role="form">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-lg-2 mt-5">
                                <div class="text-cent">
                                    <div class="form-group" >
                                        <?php if(is_null($sua->mmc_avatar)): ?>
                                            <input hidden id="img" type="file" name="mmc_avatar" class="form-control hidden" onchange="changeImg(this)">
                                            <img id="avatar" class="thumbnail" width="170px" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                        <?php else: ?>
                                            <input hidden id="img" type="file" name="mmc_avatar" class="form-control hidden" onchange="changeImg(this)" >
                                            <img id="avatar" class="thumbnail" width="170px" src="/IMG/<?php echo e($sua->mmc_avatar); ?>" >
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home">THÔNG TIN CƠ BẢN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu1">NGHỀ NGHIỆP</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu2">LƯƠNG THƯỞNG</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu3">TRÌNH ĐỘ HỌC VẤN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu4">ĐẢNG</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu5">SỨC KHỎE</a>
                                    </li>
                                </ul>
                                
                                <!-- Tab panes -->
                                <div class="tab-content mt-3">
                                    <div class="tab-pane container active" id="home">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Họ Và Tên: <b style="color:red;" >*</b></span>
                                                    </div>
                                                    <input type="text" name="mmc_name" minlength="3" maxlength="50" class="form-control" required autocomplete="off" value="<?php echo e($sua->mmc_name); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Mã giảng viên: <b style="color:red;" >*</b></span>
                                                    </div>
                                                    <input type="text" name="mmc_employeeid" minlength="3" maxlength="50" class="form-control" required autocomplete="off" value="<?php echo e($sua->mmc_employeeid); ?>" readonly>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Mã bộ môn: <b style="color:red;" >*</b></span>
                                                    </div>
                                                    <select class="form-control" id="sel1" name="mmc_deptid">
                                                        <option value="<?php echo e($sua->mmc_deptid); ?>"><?php echo e($sua->mmc_deptid); ?></option>
                                                    </select>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Ngày tháng và năm sinh: </span>
                                                    </div>
                                                    <input type="date" name="mmc_dateofbirth" class="form-control" data-format="dd/mm/yyyy" autocomplete="off" value="<?php echo e($sua->mmc_dateofbirth); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Giới tính: </span>
                                                    </div>
                                                    <div class="form-check-inline" style="margin-left: 10px;">
                                                        <label class="form-check-label" for="radio1">
                                                            <input type="radio" class="form-check-input" id="radio1" name="mmc_gender" value="0" checked >Nam
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label" for="radio2">
                                                            <input type="radio" class="form-check-input" id="radio2" name="mmc_gender" value="1" >Nữ
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Số chứng minh nhân dân:</span>
                                                    </div>
                                                    <input type="number" name="mmc_personalid" class="form-control" min="0" minlength="3" maxlength="15"  autocomplete="off" value="<?php echo e($sua->mmc_personalid); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Ngày cấp:</span>
                                                    </div>
                                                    <input type="date" name="mmc_dateofpid" class="form-control" data-format="dd/mm/yyyy"  autocomplete="off" value="<?php echo e($sua->mmc_dateofpid); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Số bảo hiểm xã hội: </span>
                                                    </div>
                                                    <input type="number" name="mmc_socialinsuranceid" class="form-control" min="0" minlength="3" maxlength="15"  autocomplete="off" value="<?php echo e($sua->mmc_socialinsuranceid); ?>">
                                                </div>
                                                
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Số điện thoại: <b style="color:red;" >*</b> </span>
                                                    </div>
                                                    <input type="number" name="mmc_phone" min="0" minlength="3" maxlength="12" class="form-control" required autocomplete="off" value="<?php echo e($sua->mmc_phone); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Email: <b style="color:red;" >*</b> </span>
                                                    </div>
                                                    <input type="email" name="email" minlength="3" maxlength="225" class="form-control" required autocomplete="off" value="<?php echo e($sua->email); ?>">
                                                </div>
                                                
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Dân tộc:</span>
                                                    </div>
                                                    <input type="text" name="mmc_religion" class="form-control" minlength="3" autocomplete="off" value="<?php echo e($sua->mmc_religion); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Tôn giáo:</span>
                                                    </div>
                                                    <input type="text" name="mmc_ethnic" class="form-control" minlength="3" autocomplete="off" value="<?php echo e($sua->mmc_ethnic); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Nơi Sinh:</span>
                                                    </div>
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_placeofbirth" minlength="3" placeholder="Số nhà, đường phố, thành phố, xóm, thôn, xã, huyện, tỉnh.." autocomplete="off" value="<?php echo e($sua->mmc_placeofbirth); ?>"><?php echo e($sua->mmc_placeofbirth); ?></textarea>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Quê quán:</span>
                                                    </div>
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_hometown" minlength="3" placeholder="Số nhà, đường phố, thành phố, xóm, thôn, xã, huyện, tỉnh.." autocomplete="off" value="<?php echo e($sua->mmc_hometown); ?>"><?php echo e($sua->mmc_hometown); ?></textarea>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Hộ khẩu thường trú:</span>
                                                    </div>
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_address" minlength="3" placeholder="Số nhà, đường phố, thành phố, xóm, thôn, xã, huyện, tỉnh.." autocomplete="off" value="<?php echo e($sua->mmc_address); ?>"><?php echo e($sua->mmc_address); ?></textarea>
                                                </div>
        
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane container fade" id="menu1">
                                         
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Ngày tuyển dụng : </span>
                                                    </div>
                                                    <input type="date" name="mmc_dateofrecruit" class="form-control" data-format="dd/mm/yyyy" autocomplete="off" value="<?php echo e($sua->mmc_dateofrecruit); ?>">
                                                </div>
                                                
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Chức vụ hiện tại: </span>
                                                    </div>
                                                    
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_position" minlength="3" autocomplete="off" value="<?php echo e($sua->mmc_position); ?>"><?php echo e($sua->mmc_position); ?></textarea>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Công việc chính được giao: </span>
                                                    </div>
                                                    
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_maintask" minlength="3" autocomplete="off" value="<?php echo e($sua->mmc_maintask); ?>"><?php echo e($sua->mmc_maintask); ?></textarea>
                                                </div>
        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane container fade" id="menu2">
                                         
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Ngạch công chức : </span>
                                                    </div>
                                                    <input type="text" name="mmc_nameofjob" class="form-control" minlength="1" autocomplete="off" value="<?php echo e($sua->mmc_nameofjob); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Mã Ngạch: </span>
                                                    </div>
                                                    <input type="text" name="mmc_codeofjob" class="form-control" minlength="1" autocomplete="off" value="<?php echo e($sua->mmc_codeofjob); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Bậc lương:</span>
                                                    </div>
                                                    <input type="number" step="any" min="0" name="mmc_salarylevel" class="form-control" minlength="1"  autocomplete="off" value="<?php echo e($sua->mmc_salarylevel); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Hệ số: </span>
                                                    </div>
                                                    <input type="number" step="any" min="0" name="mmc_salaryratio" class="form-control" minlength="1" autocomplete="off" value="<?php echo e($sua->mmc_salaryratio); ?>">
                                                </div>
                                                
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Phụ cấp chức vụ:  </span>
                                                    </div>
                                                    <input type="number" step="any" min="0" name="mmc_salaryposition" class="form-control" minlength="1" autocomplete="off" value="<?php echo e($sua->mmc_salaryposition); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Phụ cấp khác: </span>
                                                    </div>
                                                    <input type="number" step="any" min="0" name="mmc_salaryother" class="form-control" minlength="1" autocomplete="off" value="<?php echo e($sua->mmc_salaryother); ?>">
                                                </div>
        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane container fade" id="menu3">
                                               
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Trình độ chuyên môn cao nhất: </span>
                                                        </div>
                                                        <textarea class="form-control md-textarea" rows="2" name="mmc_degree" minlength="1" placeholder="TSKH, TS, ThS, cử nhân, kỹ sư, cao đẳng, trung cấp, sơ cấp, chuyên ngành..." autocomplete="off" value="<?php echo e($sua->mmc_degree); ?>"><?php echo e($sua->mmc_degree); ?></textarea>
                                                    </div>
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Ngoại ngữ:  </span>
                                                        </div>
                                                        <textarea class="form-control md-textarea" rows="2" name="mmc_language" minlength="1" placeholder="Tên ngoại ngữ + Trình độ A, B, C, D......" autocomplete="off" value="<?php echo e($sua->mmc_language); ?>"><?php echo e($sua->mmc_language); ?></textarea>
                                                    </div>
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Tin học: </span>
                                                        </div>
                                                        <textarea class="form-control md-textarea" rows="2" name="mmc_itlevel" minlength="1" placeholder="Trình độ A, B, C,......" autocomplete="off" value="<?php echo e($sua->mmc_itlevel); ?>"><?php echo e($sua->mmc_itlevel); ?></textarea>
                                                    </div>
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Lý luận chính trị: </span>
                                                    </div>
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_politiclevel" minlength="1" autocomplete="off" value="<?php echo e($sua->mmc_politiclevel); ?>"><?php echo e($sua->mmc_politiclevel); ?></textarea>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Quản lý nhà nước: </span>
                                                    </div>
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_managementlevel" minlength="1" autocomplete="off" value="<?php echo e($sua->mmc_managementlevel); ?>"><?php echo e($sua->mmc_managementlevel); ?></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane container fade" id="menu4">
                                               
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Ngày vào Đảng Cộng sản Việt Nam: </span>
                                                    </div>
                                                    <input type="date" name="mmc_partydate" class="form-control" data-format="dd/mm/yyyy" autocomplete="off" value="<?php echo e($sua->mmc_partydate); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Ngày chính thức: </span>
                                                    </div>
                                                    <input type="date" name="mmc_partydateprimary" class="form-control" data-format="dd/mm/yyyy" autocomplete="off" value="<?php echo e($sua->mmc_partydateprimary); ?>">
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Khen thưởng:  </span>
                                                    </div>
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_reward" minlength="1" placeholder="Hình thức cao nhất, năm nào" autocomplete="off" value="<?php echo e($sua->mmc_reward); ?>"><?php echo e($sua->mmc_reward); ?></textarea>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Kỷ luật: </span>
                                                    </div>
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_discipline" minlength="1" placeholder="về đảng, chính quyền, đoàn thể hình thức cao nhất, năm nào" autocomplete="off" value="<?php echo e($sua->mmc_discipline); ?>"><?php echo e($sua->mmc_discipline); ?></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane container fade" id="menu5">
                                         
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Tình trạng sức khoẻ: </span>
                                                    </div>
                                                    <textarea class="form-control md-textarea" rows="2" name="mmc_heathlevel" minlength="1" autocomplete="off" value="<?php echo e($sua->mmc_heathlevel); ?>"><?php echo e($sua->mmc_heathlevel); ?></textarea>
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Nhóm máu: </span>
                                                    </div>
                                                    <input type="text" name="mmc_bloodgroup" class="form-control" minlength="1" placeholder="O, A, B" autocomplete="off" value="<?php echo e($sua->mmc_bloodgroup); ?>">
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Chiều cao: </span>
                                                    </div>
                                                    <input type="number" step="any" min="0" name="mmc_tall" class="form-control" minlength="1" placeholder="m" autocomplete="off" value="<?php echo e($sua->mmc_tall); ?>">
                                                </div>
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Cân nặng: </span>
                                                    </div>
                                                    <input type="number" step="any" min="0" name="mmc_weight" class="form-control" minlength="1" placeholder="kg" autocomplete="off" value="<?php echo e($sua->mmc_weight); ?>">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-success float-right">Thêm Thông Tin Giảng Viên</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mmc/MMC-system/resources/views/admin/GiangVien/SuaGV.blade.php ENDPATH**/ ?>