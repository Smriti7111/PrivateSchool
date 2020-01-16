@extends('home')
@section('maincontent')
{{-- @dd($errors) --}}
<style type="text/css">
	label {
		font-weight: bold !important;
	}
	span.required {
		color: red;
	}
</style>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
	<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
		<span class="text-uppercase page-subtitle">Information Pages</span>
		<h3 class="page-title">Add New Page</h3>
	</div>
</div>
<!-- End Page Header -->
<div class="row">
	<div class="col-lg-9 col-md-12">
		<!-- Add New Post Form -->
		<div class="card card-small mb-3">
			<div class="card-body">
                @if(isset($edit))
                    {!! Form::open(['route' => ['activity.update',$edit->id],'method'=>'PUT','id'=>'update','data-parsley-validation'=> '','files' => true]) !!}
                    {!! Form::label('name','Activity Name:') !!}
                    {!! Form::text('name',$edit->name,array('class' => 'form-control','required'=>'','maxlength'=>'20')) !!}
                    {!! Form::label('description','Description:') !!}
                    {!! Form::textarea('description',$edit->description,array('class' =>'form-control','required'=>'')) !!}
                    {!! Form::label('featuredImage','Upload Featured Image:') !!}
                    {!! Form::file('featuredImage',array('class'=>'form-control')) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['activity.store'],'method'=>'POST','id'=>'store','data-parsley-validation'=> '','files' => true]) !!}
                    {!! Form::label('name','Activity Name') !!}
                    {!! Form::text('name', null,array('class' => 'form-control','required'=>'','maxlength'=>'20')) !!}
                    {!! Form::label('description','Description:') !!}
                    {!! Form::textarea('description',null,array('class' =>'form-control','required'=>'')) !!}
                    {!! Form::label('featuredImage','Upload Featured Image:') !!}
                    {!! Form::file('featuredImage',array('class'=>'form-control'))!!}
                    {!! Form::close() !!}
                @endif
			</div>
		</div>
		<!-- / Add New Post Form -->
	</div>
	<div class="col-lg-3 col-md-12">
		<!-- Post Overview -->
		<div class='card card-small mb-3'>
			<div class="card-header border-bottom">
				<h6 class="m-0">Actions</h6>
			</div>
			<div class='card-body p-0'>
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex px-3">
                        @if (isset($edit))
                        {!! Form::button('<i class="material-icons">file_copy</i>Update', ['form'=>'update','type'=>'submit','class'=>'btn btn-sm btn-accent ml-auto']) !!}
                        @else
                        {!! Form::button('<i class="material-icons">save</i> Save Draft', ['form'=>'store','type'=>'submit','class'=>'btn btn-sm btn-outline-accent']) !!}
                        {!! Form::button('<i class="material-icons">file_copy</i> Publish', ['form'=>'store','type'=>'submit','class'=>'btn btn-sm btn-accent ml-auto']) !!}
						@endif
					</li>
				</ul>
			</div>
		</div>
		<!-- / Post Overview -->
	</div>
</div>
<script src="{{asset('scripts/app/app-blog-new-post.1.1.0.js')}}"></script>
<script type="text/javascript">
	$(function() {
		$('#save').on('click', function(e) {
			$('#status').val('save');
			$('form').submit();
		})
		$('#draft').on('click', function(e) {
			$('#status').val('draft');
			$('form').submit();
		})
		$('#update').on('click', function(e) {
			$('#status').val('save');
			$('form').submit();

		});
	});
</script>

@endsection
