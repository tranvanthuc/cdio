@extends('admin.layout')

@section('title','ListUser')

<!-- in thong bao  -->

@section('content')


<div class="col-md-10 col-md-offset-1">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Name</th>
                <th>Level</th>
                <th class="text-center">Block</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        
        <tbody>

            @if($listUser->count() > 0 )
                <?php $stt = 0 ?>
                    @foreach($listUser as $user)
                        @if($user->id > Auth::user()->id)
                            <tr style="cursor: pointer;">
                                <td> <?php echo ++$stt; ?> </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ App\Level::find($user->level_id)->name }}</td>
                                <td align="center">
                                    @if($user->lock == 0)
                                        <a href="{{ url('admin/user/lock/'. $user->id) }}"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a>
                                    @else 
                                        <a href="{{ url('admin/user/lock/'. $user->id) }}"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                </td>
                                
                                <td align="center">
                                    <a onclick="return confirmMsg('Do you want to delete {{ $user->username }}')" href="{{ url('admin/user/delete/'. $user->id)}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endif
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
@endsection