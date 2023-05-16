<x-layouts.head-foot>


    <x-slot:title>
        Blog
    </x-slot:title>


    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Blog Detail</h1>
                <a href="/" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h5 text-white">Blog Detail</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->

                    @auth
                        @canany(['update', 'delete'], $page)
                            <div class="row mb-3 col-sm-2 wow zoomIn">
                                <a class="btn btn-warning py-2 px-4 ms-3" href="{{ route('pages.edit', [$page->id]) }}">
                                    Edit
                                </a>
                                <form action="{{ route('pages.destroy', [$page->id]) }}" method="POST"
                                    onsubmit="return confirm('are you sure you wish to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger py-2 px-4 ms-3 mb-4">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endcanany
                    @endauth


                    <h1>{{ $page->name }}</h1>
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5">
                        @if (File::exists($page->photo))
                            <img src="{{ asset('storage/pages-photo' . $page->photo) }}">
                        @else
                            <img src="{{ asset('/storage/avatar/' . $page->user->photo) }}">
                        @endif
                        <h1 class="mb-4">{{ $page->short_content }}</h1>
                        <p>{{ $page->content }}</p>

                    </div>
                    <!-- Blog Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">{{ $page->comment()->count() }} Comments </h3>
                        </div>

                        @foreach ($page->comment as $com)
                            <div class="d-flex mb-4">
                                <img src="{{ asset('/storage/avatar/' . $com->user->photo) }}" class="img-fluid rounded"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6>{{ auth()->user()->name }}</a>
                                        <small><i>{{ $com->created_at }}</i></small>
                                    </h6>
                                    <h5>{{ $com->body }}
                                        <a href="" class="fa fa-edit" style="font-size:25px"></a>
                                        <a href="" id="boot-icon" class="bi bi-trash"
                                            style="font-size:25px; color:red"></a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach



                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Leave A Comment</h3>
                        </div>


                        @auth
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <textarea name="body" class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                                    </div>
                                    <input type="hidden" name="page_id" value="{{ $page->id }}">
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Leave Your
                                            Comment</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div> to leave comment
                                <a href="{{ route('login') }} " class="btn btn-primary"> CLICK </a>
                            </div>
                        @endauth



                    </div>
                    <!-- Comment Form End -->
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Categories</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                                    class="bi bi-arrow-right me-2"></i>Web Design</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                                    class="bi bi-arrow-right me-2"></i>Web Development</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                                    class="bi bi-arrow-right me-2"></i>Web Development</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                                    class="bi bi-arrow-right me-2"></i>Keyword Research</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i
                                    class="bi bi-arrow-right me-2"></i>Email Marketing</a>
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent Post</h3>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="/img/blog-1.jpg"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href=""
                                class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor
                                sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="/img/blog-2.jpg"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href=""
                                class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor
                                sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="/img/blog-3.jpg"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href=""
                                class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor
                                sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="/img/blog-1.jpg"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href=""
                                class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor
                                sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="/img/blog-2.jpg"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href=""
                                class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor
                                sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="/img/blog-3.jpg"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href=""
                                class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor
                                sit amet adipis elit
                            </a>
                        </div>
                    </div>
                    <!-- Recent Post End -->

                    <!-- Image Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="/img/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->

                    <!-- Tags Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Tag Cloud</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                            <a href="" class="btn btn-light m-1">SEO</a>
                            <a href="" class="btn btn-light m-1">Writing</a>
                            <a href="" class="btn btn-light m-1">Consulting</a>
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                            <a href="" class="btn btn-light m-1">SEO</a>
                            <a href="" class="btn btn-light m-1">Writing</a>
                            <a href="" class="btn btn-light m-1">Consulting</a>
                        </div>
                    </div>
                    <!-- Tags End -->

                    <!-- Plain Text Start -->
                    <div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Plain Text</h3>
                        </div>
                        <div class="bg-light text-center" style="padding: 30px;">
                            <p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor
                                clita kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor
                                ipsum amet diam</p>
                            <a href="" class="btn btn-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                    <!-- Plain Text End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="/img/vendor-1.jpg" alt="">
                    <img src="/img/vendor-2.jpg" alt="">
                    <img src="/img/vendor-3.jpg" alt="">
                    <img src="/img/vendor-4.jpg" alt="">
                    <img src="/img/vendor-5.jpg" alt="">
                    <img src="/img/vendor-6.jpg" alt="">
                    <img src="/img/vendor-7.jpg" alt="">
                    <img src="/img/vendor-8.jpg" alt="">
                    <img src="/img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->



</x-layouts.head-foot>
