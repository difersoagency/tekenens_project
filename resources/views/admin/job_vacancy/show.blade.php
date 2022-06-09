@extends('layouts.admin.master')

@section('title')Job Vacancy
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
<style>
    .max-lines {
    display: block; /* or inline-block */
    text-overflow: Ellipsis;
    Word-wrap: break-Word;
    overflow: hidden;
    max-height: 5.4em;
    line-height: 1.8em;
    }
</style>
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Job Vacancy</h3>
		@endslot
		<li class="breadcrumb-item active">Job Vacancy</li>
	@endcomponent

	<div class="container-fluid">
        <div class="mb-3"><a type="button" class="btn btn-primary btn-sm" href="{{ route('job_vacancy.create') }}"><i
        class="fa fa-plus"></i> Create</a></div>
        <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-2 d-flex align-items-stretch">
            @forelse($j as $i)
            <div class="col">
                <div class="card h-100">
                    <div class="job-search">
                        <div class="card-body">
                            <div class="media">
                                <img class="img-40 img-fluid m-r-20" src="{{asset('storage/images/job_vacancy/'.$i->photo)}}" alt="" />
                                <div class="media-body">
                                    <h6 class="f-w-700"><a href="javascript:void(0)">{{$i->title}}</a></h6>
                                    <p><span class="badge @if($i->status == '1') badge-primary @else badge-danger @endif">@if($i->status == '1') Available @else Not Avaliable @endif</span></p>
                                </div>
                            </div>
                            <div class="max-lines">
                                {!! $i->description !!}
                            </div>
                            <p class="pull-right pull-bottom">
                                <button type="button" id="btnedit" class="btn btn-warning btn-sm" data-id="{{$i->id}}">Edit</button>
                                <button type="button" id="btndelete" class="btn btn-danger btn-sm" data-id="{{$i->id}}">Delete</button>
                            </p>
                        </div>
                    </div>
	            </div>
            </div>
            @empty
            @endforelse
        </div>
	</div>

	@push('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script>
        $(function(){
                $(document).on('click', '#btnedit', function(){
                    var id = $(this).attr('data-id');
                    swal({
                        title: "Edit Job vacancy?",
                        text: "Are you sure you want to edit this Job Vacancy?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willEdit) => {
                        if (willEdit) {
                            window.location.href = "/admin/job_vacancy/edit/"+id;
                        }
                    })
                })
                $(document).on('click', '#btndelete', function(){
                    var id = $(this).attr('data-id');
                    swal({
                        title: "Delete Job Vacancy?",
                        text: "Once deleted, you will not be able to recover Job Vacancy",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/job_vacancy/delete',
                                type: 'DELETE',
                                dataType: 'json',
                                data: {"id": id, "_method": "DELETE", _token: "{{csrf_token()}}"},
                                success: function(result) {
                                    if(result.info == "success"){
                                        window.location.reload();
                                        swal(result.msg, {
                                            icon: "success",
                                        });
                                        window.location.reload();
                                    }
                                    else{
                                        swal(result.msg, {
                                            icon: "error",
                                        });
                                    }
                                }
                            });
                        } else {
                            swal("Delete has been cancelled");
                        }
                    })
                });
            });
        </script>
	@endpush

@endsection
