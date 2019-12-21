<?php $__env->startSection('css'); ?>
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Lịch giảng dạy</h2>
            <span><a href="<?php echo e(route('home')); ?>">Home</a> > Lịch giảng dạy </span>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInDown">
            <div class="col-lg-3" >
                <div class="ibox ">
                    <div class="ibox-content time_class">
                        <h3>Thời gian ra vào lớp</h3>
                        <div>
                            <table>
                                <tr>
                                    <td><?php if(Auth::user()->mmc_level==1) echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edittime">Sửa thời gian</button>'; ?></td>
                                    <td><h4 id="clock" style="margin-left: 10px;" ></h4></td>
                                </tr>
                            </table>
                            <div class="modal" id="edittime">
                              <div class="modal-dialog">
                                <div class="modal-content" style="width: 102%;">
                                <form action="<?php echo e(route('edittime')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Sửa thời gian ra vào lớp</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <!-- Modal body -->
                                  <div class="modal-body">
                                    <table border="1" style="float: left;">
                                        <tr>
                                            <th rowspan="2">Tiết: </th>
                                            <th colspan="2">Mùa hè(Bắt đầu từ 15/4)</th>
                                        </tr>
                                        <tr>
                                            <th>Giờ vào</th>
                                            <th>Giờ ra</th>
                                        </tr>
                                        <?php $tiet=1;?>
                                        <?php $__currentLoopData = $time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($timeone->season == 2): ?>
                                        <tr>
                                            <td>Tiết <?php echo e($tiet++); ?>: </td>
                                            <td style="display:none;"><input type="text" name="id[]" value="<?php echo e($timeone->id); ?>" hidden=""></td>
                                            <td><input type="time" name="time_in[]" value="<?php echo e($timeone->time_in); ?>"></td>
                                            <td><input type="time" name="time_out[]" value="<?php echo e($timeone->time_out); ?>"></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <table border="1">
                                        <tr>
                                            <th colspan="2">mùa đông(Bắt đầu từ 15/10)</th>
                                        </tr>
                                        <tr>
                                            <th>Giờ vào</th>
                                            <th>Giờ ra</th>
                                        </tr>
                                        <?php $__currentLoopData = $time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($timeone->season == 1): ?>  
                                        <tr>
                                            <td style="display:none;"><input type="text" name="id[]" value="<?php echo e($timeone->id); ?>" hidden=""></td>
                                            <td><input type="time" name="time_in[]" value="<?php echo e($timeone->time_in); ?>"></td>
                                            <td><input type="time" name="time_out[]" value="<?php echo e($timeone->time_out); ?>"></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                  </div>

                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                    <button type="submit" name="luu" class="btn btn-primary">Lưu</button>
                                  </div>
                                </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <?php $tiet=1;?>
                        <?php $__currentLoopData = $time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onetime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($onetime->season == $key_season): ?>
                        <p>Tiết <?php echo e($tiet++); ?> : <?php if($tiet<=10) echo "&nbsp"; ?> <b><?php echo e($onetime->time_in); ?></b> - <b><?php echo e($onetime->time_out); ?></b></p>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Lịch biểu</h5>
                    </div>
                    <div class="ibox-content">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Lịch</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

            <!-- Modal body -->
            <div class="modal-body">
                <b>Thời gian : </b> <span id="tg"> </span><br>
                <b>Dạy : </b> <span id="mh"> </span><br>
                <b>Phòng học : </b> <span id="ph"> </span><br>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="js/plugins/fullcalendar/moment.min.js"></script>

    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- Full Calendar -->
    <script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="js/plugins/fullcalendar/lang/lang-all.js"></script>
    <script>

        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            /* initialize the external events
             -----------------------------------------------------------------*/


            $('#external-events div.external-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                lang: 'vi',
                events: [
                    <?php for( $i=0; $i< count($calendar) ; $i++): ?>
                        {
                            title: 'Tiết <?php echo e($calendar[$i]['tiethoc']); ?>\n <?php echo e($calendar[$i]['tenlophocphan']); ?>\n <?php echo e($calendar[$i]['phonghoc']); ?>',
                            <?php
                                $m3=explode("-",$calendar[$i]['ngayhoc']);
                                $y= (int)$m3[0];
                                $m= (int)$m3[1]-1;
                                $d= (int)$m3[2];
                                $m3=explode(",",$calendar[$i]['tiethoc']);
                                $tiethoc=explode(",",$calendar[$i]['tiethoc']);

                                $start=explode(":",App\Http\Controllers\Admin\ScheduleController::getstar($tiethoc[0]));
                                $end=explode(":",App\Http\Controllers\Admin\ScheduleController::getend($tiethoc[count($tiethoc)-1]));
                            ?>
                            start: new Date(<?php echo e($y); ?>,<?php echo e($m); ?>,<?php echo e($d); ?>,<?php echo e($start[0]); ?>,<?php echo e($start[1]); ?>),
                            end: new Date(<?php echo e($y); ?>,<?php echo e($m); ?>,<?php echo e($d); ?>,<?php echo e($end[0]); ?>,<?php echo e($end[1]); ?>)
                        },
                   <?php endfor; ?>
                ]
            });
        });
            function time() {
                var today = new Date();
                var h=today.getHours();
                var m=today.getMinutes();
                var s=today.getSeconds();
                m=checkTime(m);
                s=checkTime(s);
                nowTime = h+":"+m+":"+s;
                tmp='<span class="date">'+nowTime+'</span>';
                document.getElementById("clock").innerHTML=tmp;
                clocktime=setTimeout("time()","1000","JavaScript");
                function checkTime(i)
                {
                    if(i<10){
                        i="0" + i;
                    }
                    return i;
                }
            }
    $(document).ready(function(){
    time();
    });
    $(document).ready(function(){
        $(document).on('click', '.click', function () {//load document
            var s=$(this).children(".fc-time").text();
            var t=$(this).children(".fc-title").text();
            var p=t.substr(t.length-6, 6);
            var m=t.substring(0,t.length-6);
            $("#tg").text(s);
            $("#mh").text(m);
            $("#ph").text(p);
        });
    });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mmc/MMC-system/resources/views/admin/schedule/index.blade.php ENDPATH**/ ?>