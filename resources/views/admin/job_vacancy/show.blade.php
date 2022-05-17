@extends('layouts.admin.master')

@section('title')Job Vacancy
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Job Vacancy</h3>
		@endslot
		<li class="breadcrumb-item active">Job Vacancy</li>
	@endcomponent

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                        <div class="mb-3"><a type="button" class="btn btn-primary btn-sm" href="{{route('job_vacancy.create')}}"><i class="fa fa-plus"></i> Create</a></div>
                            <div class="table-responsive">
							    <table class="display datatables" id="showtable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Open Recruitment Desain Grafis</td>
                                            <td>gabriel-hrd@tekenens.com</td>
                                            <td><span class="badge badge-success">Available</span></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Open Recruitment 3D Animator</td>
                                            <td>gabriel-hrd@tekenens.com</td>
                                            <td><span class="badge badge-danger">Not Available</span></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div>

        </div>
	</div>

	@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script>
        $(function(){
            $('#showtable').DataTable();
        });
    </script>
	@endpush

@endsection
