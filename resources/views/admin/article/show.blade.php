@extends('layouts.admin.master')

@section('title')Article
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Article</h3>
        @endslot
        <li class="breadcrumb-item active">Article</li>
    @endcomponent

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                        <div class="mb-3"><a type="button" class="btn btn-primary btn-sm" href="{{route('article.create')}}"><i class="fa fa-plus"></i> Create</a></div>
                        <div class="table-responsive">
							<table class="display datatables" id="showtable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Published Date</th>
                                        <th>Published By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mengapa Pemilihan Warna Penting?</td>
                                        <td>February, 1st 2022</td>
                                        <td>Natasha Aurelia</td>
                                        <td><span class="badge badge-success">Available</span></td>
                                        <td>
                                        <a class="btn btn-light btn-pill btn-xs" href="" aria-label="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-pill btn-xs" href="" aria-label="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-pill btn-xs" href="" aria-label="Delete">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pecinta Anime wajib banget baca Manga ini!</td>
                                        <td>January, 25th 2022</td>
                                        <td>Rifky Asyari</td>
                                        <td><span class="badge badge-success">Available</span></td>
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
