@extends('layouts.admin.master')

@section('title')
    Portofolio
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/photoswipe.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Portofolio</h3>
        @endslot
        <li class="breadcrumb-item active">Portofolio</li>
    @endcomponent

    <div class="container-fluid">
        <div class="mb-3">
            <a type="button" class="btn btn-primary btn-sm" href="{{ route('portofolio.create') }}"><i
                    class="fa fa-plus"></i> Create</a>
        </div>
        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-2 d-flex align-items-stretch"">
                 @foreach ($s as $i)
            <div class="col">
                <div class="card">
                    <div class="blog-box blog-grid">
                        <div class="blog-wrraper">
                            <a href="blog-single.html"><img class="img-fluid top-radius-blog" src="<?php echo asset("storage/public/images/portofolio/$i->photo"); ?>"
                                    alt="" /></a>
                        </div>
                        <div class="blog-details-second">
                            <div class="blog-post-date"><span class="blg-month">Apr</span><span
                                    class="blg-date">10</span></div>
                            <a href="blog-single.html">
                                <h6 class="blog-bottom-details">{{ $i->title }}</h6>
                            </a>
                            <p>{{ $i->description }}
                            </p>
                            <div class="detail-footer">
                                <ul class="sociyal-list">
                                    <li><i class="fa fa-user-o"></i>{{ implode(',', $i->team->name) }}</li>
                                    {{-- <li><i class="fa fa-comments-o"></i>5</li>
                                        <li><i class="fa fa-thumbs-o-up"></i>2 like</li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="row">
            <div class="card">
                <div class="my-gallery card-body row gallery-with-description" itemscope="">
                    <figure class="col-xl-3 col-sm-6 xl-33" itemprop="associatedMedia" itemscope="">
                        <a href="{{asset('assets/images/big-lightgallry/01.jpg')}}" itemprop="contentUrl" data-size="1600x950">
                            <img src="{{asset('assets/images/lightgallry/01.jpg')}}" itemprop="thumbnail" alt="Image description" />
                            <div class="caption">
                                <h4>Portfolio Title</h4>
                                <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
                            </div>
                        </a>
                        <figcaption itemprop="caption description">
                            <h4>Portfolio Title</h4>
                            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
                        </figcaption>
                    </figure>
                    <figure class="col-xl-3 col-sm-6 xl-33" itemprop="associatedMedia" itemscope="">
                        <a href="{{asset('assets/images/big-lightgallry/02.jpg')}}" itemprop="contentUrl" data-size="1600x950">
                            <img src="{{asset('assets/images/lightgallry/02.jpg')}}" itemprop="thumbnail" alt="Image description" />
                            <div class="caption">
                                <h4>Portfolio Title</h4>
                                <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
                            </div>
                        </a>
                        <figcaption itemprop="caption description">
                            <h4>Portfolio Title</h4>
                            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div> --}}
    </div>
    {{-- <div class="table-responsive">
                                    <table class="display datatables" id="showtable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Project Name</th>
                                                <th scope="col">Categories</th>
                                                <th scope="col">Published Date</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Status</th>
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
                                                <td><span class="badge badge-success">Available</span></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Genie, tell me your wish</td>
                                                <td>Video</td>
                                                <td>December, 25th 2021</td>
                                                <td>Elizabeth Danubrata</td>
                                                <td><span class="badge badge-danger">Not Available</span></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> --}}

    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
        <script>
            $(function() {
                $('#showtable').DataTable();
            });
        </script>
    @endpush
@endsection
