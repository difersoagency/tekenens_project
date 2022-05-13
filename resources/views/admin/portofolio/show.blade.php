@extends('layouts.admin.master')

@section('title')Portofolio
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Portofolio</h3>
		@endslot
		<li class="breadcrumb-item active">Portofolio</li>
	@endcomponent

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>List of Portofolio</h5>
						<span>
                            All <code>Portofolio</code> made by the Artist of <code>Tekenens</code> are here.
						</span>
					</div>
					<div class="card-block row">
						<div class="col-sm-12 col-lg-12 col-xl-12">
							<div class="table-responsive table-border-radius">
								<table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Project Name</th>
                                            <th scope="col">Categories</th>
                                            <th scope="col">Published Date</th>
                                            <th scope="col">Published By</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Kwangya the Universe</td>
                                            <td>2D Anime</td>
                                            <td>March, 02nd 2022</td>
                                            <td>Amira Nur Shifa</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Genie, tell me your wish</td>
                                            <td>Video</td>
                                            <td>December, 25th 2021</td>
                                            <td>Elizabeth Danubrata</td>
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
