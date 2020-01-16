@extends('home')
@section('maincontent')
<!-- Page Header -->
@if(Session::has('msg'))
<div class="col-md-4 col-sm-5 float-right alert alert-success alert-dismissible m-2 mt-4 fade show" role="alert">
  {{Session::get('msg')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <!-- <span class="text-uppercase page-subtitle">Overview</span> -->
    <h3 class="page-title">Albums</h3>
  <a href="{{ route('album.create')}}" class="btn btn-primary mt-4 ml-2"><i class="fa fa-plus"></i> Add New Album</a>
  </div>
</div>
<!-- End Page Header -->
<!-- Default Light Table -->
<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-body p-3 text-center">
       <div class="table-responsive p-1">
          <table id="event-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Date</th>
                <th>Album Name</th>
                <th>Album Description</th>
                <th>Featured Album Img</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $l)
              <tr>
                <td class="">
                <form class="d-inline float-left mt-2" action="#" method="GET">
                    <button type="submit" class="btn btn-sm "><i class="fa fa-eye"></i> </button>
                </form>
                  <div class="d-inline">{{ date('Y', strtotime($l->created_at)) }}{{ date('-m-d', strtotime($l->created_at)) }}</div>
                <div>{{ date('h:iA', strtotime($l->created_at))}}</div>
                </td>
                <td>{{$l->album_name}}</td>
                <td>{{strlen($l->album_description)>20 ? substr($l->album_description,0,20).'...' : $l->album_description }}</td>
                <td><img style="width:100px; height:100px; object-fit:cover;" src="{{url("images/$l->featuredImage")}}" alt=""></td>
                {{-- <td>
                    @if ($l->status==0)
                <a class="btn btn-md btn-danger" href="{{ route('blog.statusChange',$l->id)}}">Approve</a>
                    @else
                    <a class="btn btn-md btn-success" href="">Approved</a>
                    @endif
                </td> --}}
                <td class="col-md-3 col-sm-4">
                {{-- <form class="d-inline" action="{{ route('album.edit',$l->album_id)}}" method="GET">
                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                </form> --}}
                {!! Form::open(['route' => ['album.edit',$l->album_id],'method'=>'GET','class'=>'d-inline']) !!}
                {!! Form::submit('Edit', array('class' => 'btn btn-sm btn-primary' )) !!}
                    {!! Form::close() !!}
                {!! Form::open(['route' => ['album.destroy',$l->album_id],'method'=>'DELETE','class'=>'d-inline']) !!}
                {!! Form::submit('Delete', array('class' => 'btn btn-sm btn-danger' )) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Default Light Table -->
@section('jsbackend')
<script type="text/javascript">
    $(document).ready(function() {
      setTimeout(function() {
        $('.alert .close').click()
      }, 3000);
      $('#event-table').DataTable({
        // "ajax": "data/objects.txt",
        "columnDefs": [{
            "width": "200px",
            "targets": 0
          },
          {
            "width": "150px",
            "targets": 1
          },
          {
            "width": "150px",
            "targets": 2
          },
          {
            "width": "70px",
            "targets": 3
          },
        ],
      });
    });
  </script>
@endsection

@endsection
