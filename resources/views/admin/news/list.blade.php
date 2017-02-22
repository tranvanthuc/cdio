@extends('admin.layout')

@section('title','List News')

<!-- in thong bao  -->

@section('content')


<div class="col-md-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Major</th>
                <th>Subject</th>
                <th>Price</th>
                <th>Image</th>
                <th>Post by</th>
                <th class="text-center">Status</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        
        <tbody>

            @if($listNews->count() > 0 )
                <?php $stt = 0 ?>
                    @foreach($listNews as $news)
                        <tr style="cursor: pointer;">
                            <td> <?php echo ++$stt; ?> </td>
                            <td>{{ str_limit($news->title, 30) }}</td>
                            <td>{{ App\Major::find($news->major_id)->name }}</td>
                            <td>{{ str_limit($news->subject, 30) }}</td>
                            <td>{{ $news->price }}</td>
                            <td>{{ str_limit($news->image, 15) }}</td>
                            <td>{{ App\User::find($news->user_id)->username }}</td>
                            <td align="center">
                                @if($news->status == 1)
                                    <a href="{{ url('admin/news/lock/'. $news->id) }}"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a>
                                @else 
                                    <a href="{{ url('admin/news/lock/'. $news->id) }}"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a>
                                @endif
                            </td>
                            
                            <td align="center">
                                <a href="{{ url('admin/news/edit/'. $news->id)}}"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                            </td>

                            <td align="center">
                                <a onclick="return confirmMsg('Do you want to delete {{ $news->title }}')" href="{{ url('admin/news/delete/'. $news->id)}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                            </td>
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
@endsection