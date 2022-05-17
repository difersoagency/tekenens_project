@extends('layouts.admin.master')

@section('title')Article
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Article</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('article.show')}}">Article</a></li>
        <li class="breadcrumb-item active">Create Article</li>
    @endcomponent

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                    <form class="theme-form mega-form">
                        <h6>Article Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Title</label>
                        	<input class="form-control" type="text" placeholder="Enter Article Title" />
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Meta Description (Summary)</label>
                        	<textarea class="form-control" placeholder="Enter Meta Description / Summary" id="summary"/></textarea>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Thumbnail</label>
                        	<input class="form-control" type="file" placeholder="Choose JPG/PNG File" />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Category</label>
                            <select class="js-example-basic-multiple col-sm-12" multiple="multiple">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Coming</option>
                                    <option value="WY">Hanry Die</option>
                                    <option value="WY">John Doe</option>
                                </select>
                        </div>
                        <hr class="mt-4 mb-4" />
                        <h6>Content</h6>
                        <div class="mb-3">
                        	<textarea class="form-control" placeholder="" id="content"/></textarea>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
					</form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
	<script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <!-- <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script> -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(function(){
            tinymce.init({
                selector: 'textarea#content', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists',
                toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });
        });
    </script>
	@endpush

@endsection