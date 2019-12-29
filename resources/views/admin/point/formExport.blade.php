<h2>Danh sách điểm sinh viên</h2>
<p><b>Chú thích: </b></p>
<table>
    <thead>
    <tr>
        <th><b>STT</b></th>
        <th><b>Mã sinh viên</b></th>
        <th><b>Họ và tên</b></th>
        <th><b>Tên lớp</b></th>
        <th><b>Khóa</b></th>
        <th><b>Điểm hệ số 4</b></th>
        <th><b>Điểm hệ số 10</b></th>
        <th><b>Xếp loại</b></th>
    </tr>
    </thead>
    <tbody>
    <?php $i= 1; ?>
    @if(!is_null($data) && !isset($hocky))
        @foreach($data as $key)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $key->mmc_studentid }}</td>
                <td>{{ $key->mmc_fullname }}</td>
                <td>
                    @foreach($dataclass as $class)
                        @if($key->mmc_classid == $class->mmc_classid)
                            {{ $class->mmc_classname }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $key->mmc_course }}</td>
                <td>{{ $key->pointdetail->mmc_4grade}}</td>
                <td>{{ $key->pointdetail->mmc_10grade}}</td>
                <td>{{ hienthihocluc($key->pointdetail->mmc_4grade)}}</td>
            </tr>
        @endforeach
    @elseif(!is_null($data) && isset($hocky))
        @foreach($data as $key)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $key->mmc_studentid }}</td>
                <td>{{ $key->mmc_fullname }}</td>
                <td>
                    @foreach($dataclass as $class)
                        @if($key->mmc_classid == $class->mmc_classid)
                            {{ $class->mmc_classname }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $key->mmc_course }}</td>
                <td>{{diemhockyhs4($key->mmc_studentid, $hocky)}}</td>
                <td>{{diemhockyhs10($key->mmc_studentid, $hocky)}}</td>
                <td>{{ hienthihocluc(diemhockyhs4($key->mmc_studentid, $hocky))}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
