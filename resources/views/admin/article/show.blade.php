@extends('layouts.admin.master')

@section('title')Article
 {{ $title }}
@endsection

@push('css')
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
					<div class="card-header">
						<h5>Article</h5>
						<span>
                            All <code>Articles</code> that has been published on blog by the Admin of <code>Tekenens</code> are here.
						</span>
					</div>
					<div class="card-block row">
						<div class="col-sm-12 col-lg-12 col-xl-12">
							<div class="table-responsive table-border-radius">
								<table class="table table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Published Date</th>
                                            <th scope="col">Published By</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mengapa Pemilihan Warna Penting?</td>
                                            <td>February, 1st 2022</td>
                                            <td>Natasha Aurelia</td>
                                            <td>
                                                <a class="btn btn-warning btn-pill btn-xs" href="" aria-label="Edit">
                                                    <i data-feather="edit-2"></i>
                                                </a>
                                                <a class="btn btn-danger btn-pill btn-xs" href="" aria-label="Delete">
                                                    <i data-feather="trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Pecinta Anime wajib banget baca Manga ini!</td>
                                            <td>January, 25th 2022</td>
                                            <td>Rifky Asyari</td>
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
	@endpush

@endsection
