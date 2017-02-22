@extends('admin.layout')

@section('title','ListUser')

<!-- in thong bao  -->

@section('content')
<div class="col-md-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Content</th>
                <th>Time</th>
            </tr>
        </thead>
        
        <tbody>

            @if($list->count() > 0 )
                <?php $stt = 0 ?>
                    @foreach($list as $report)
                        <tr style="cursor: pointer;">
                            <td> <?php echo ++$stt; ?> </td>
                            <td>{{ App\User::find($report->user_id)->username }}</td>
                            <td>{{ $report->content }}</td>
                            <td>{{ Carbon\Carbon::createFromTimeStamp(strtotime($report->created_at))->diffForHumans() }}</td>
                        </tr>
                    @endforeach
            @else
                <div class="error_msg">Không có dữ liệu </div>
            @endif
        </tbody>
        
    </table>

    <div>
        <b>Total : <?php echo $stt; ?></b>
    </div>
</div>
@stop