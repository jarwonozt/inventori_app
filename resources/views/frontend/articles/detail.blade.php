<x-frontend-master>
    <div class="main-content">

        <div class="page-content">

            <section class="page-title-box">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="text-center text-white">
                                <h3 class="mb-4">{{ $data->title }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="position-relative" style="z-index: 1">
                <div class="shape">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
                        <path fill="#FFFFFF" fill-opacity="1"
                            d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
                    </svg>
                </div>
            </div>


            <section class="section">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-post">
                                <div class="swiper blogdetailSlider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ $data->image ? asset(config('app.POST_BIG')).'/'.$data->image : asset('frontend').'/assets/images/blog/img-04.jpg' }}" alt="" class="img-fluid rounded-3">
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-inline mb-0 mt-3 text-muted">
                                    <li class="list-inline-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ $data->getUser->profile_photo_path ? asset('storage/images/users').'/'.$data->getUser->profile_photo_path : asset('assets/images/portrait/small/avatar-s-11.jpg') }}" alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="ms-3">
                                                <a href="/author/{{ $data->getUser->name }}" class="primary-link"><h6 class="mb-0">{{ $data->getUser->name }}</h6></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="uil uil-calendar-alt"></i>
                                            </div>
                                            <div class="ms-2">
                                                <p class="mb-0"> {{ $data->date }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="uil uil-eye"></i>
                                            </div>
                                            <div class="ms-2 flex-grow-1">
                                                <p class="mb-0"> {{ $data->counter }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="uil uil-comments-alt"></i>
                                            </div>
                                            <div class="ms-2 flex-grow-1">
                                                <p class="mb-0"> {{ $data->comment_count }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="/category/{{ $data->getCategory->slug }}" class="button btn-sm btn-primary"> {{ strtoupper($data->getCategory->name) }}</a>
                                    </li>
                                </ul>
                                <div class="mt-4">
                                    <p>
                                        {!! $data->content !!}
                                    </p>
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="flex-shrink-0">
                                            <b>Tags:</b>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            @php
                                                $tags = explode(',', $data->tags);
                                                $tagsRows = \App\Models\Tag::whereIn('id', $tags)->get();
                                            @endphp
                                            @foreach ($tagsRows as $tag)
                                                <a href="/tag/{{ $tag->slug }}" class="badge bg-soft-success mt-1 fs-14">{{ $tag->title }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <ul class="blog-social-menu list-inline mb-0 text-end">
                                        <li class="list-inline-item">
                                            <b>Share post:</b>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="social-link bg-soft-primary">
                                                <i class="uil uil-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="social-link bg-soft-success">
                                                <i class="uil uil-whatsapp"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="social-link bg-soft-blue">
                                                <i class="uil uil-linkedin-alt"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="social-link bg-soft-danger">
                                                <i class="uil uil-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>

                                </div>

                                @livewire('frontend.post-comment', ['article_id' => $data->id])

                                <div class="mt-5">
                                    <h5 class="border-bottom pb-3"> Related Blog Posts</h5>
                                    <div class="swiper blogSlider pb-5 mt-4">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="card blog-modern-box overflow-hidden border-0">
                                                    <img src="{{ asset('frontend') }}/assets/images/blog/img-04.jpg" alt="" class="img-fluid">
                                                    <div class="bg-overlay"></div>
                                                    <div class="card-img-overlay">
                                                    <a href="blog-details.html" class="text-white"><h5 class="card-title">Manage white space in responsive layouts ?</h5></a>
                                                    <p class="card-text text-white-50"> <a href="blog-author.html" class="text-white-50">Rebecca Swartz</a> - 5 mins ago</p>
                                                    </div>
                                                </div>
                                            </div><!--end blogSlider-->
                                            <div class="swiper-slide">
                                                <div class="card blog-modern-box overflow-hidden border-0">
                                                    <img src="{{ asset('frontend') }}/assets/images/blog/img-05.jpg" alt="" class="img-fluid">
                                                    <div class="bg-overlay"></div>
                                                    <div class="card-img-overlay">
                                                    <a href="blog-details.html" class="text-white"><h5 class="card-title">A day in the of a professional fashion designer</h5></a>
                                                    <p class="card-text text-white-50"> <a href="blog-author.html" class="text-white-50">Rebecca Swartz</a> - 5 mins ago</p>
                                                    </div>
                                                </div>
                                            </div><!--end blogSlider-->
                                            <div class="swiper-slide">
                                                <div class="card blog-modern-box overflow-hidden border-0">
                                                    <img src="{{ asset('frontend') }}/assets/images/blog/img-06.jpg" alt="" class="img-fluid">
                                                    <div class="bg-overlay"></div>
                                                    <div class="card-img-overlay">
                                                    <a href="blog-details.html" class="text-white"><h5 class="card-title">Design your apps in your own way</h5></a>
                                                    <p class="card-text text-white-50"> <a href="blog-author.html" class="text-white-50">Rebecca Swartz</a> - 5 mins ago</p>
                                                    </div>
                                                </div>
                                            </div><!--swiper-slide-->
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div><!--end blogSlider-->
                                </div><!--end related post-->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <div class="sidebar ms-lg-4 ps-lg-4 mt-5 mt-lg-0">
                                <aside class="widget widget_search">
                                    <form class="position-relative">
                                        <input class="form-control" type="text" placeholder="Search...">
                                        <button class="bg-transparent border-0 position-absolute top-50 end-0 translate-middle-y fs-22 me-2" type="submit"><span class="mdi mdi-magnify text-muted"></span></button>
                                    </form>
                                </aside>

                                <div class="mt-4 pt-2">
                                    <div class="sd-title">
                                        <h6 class="fs-16 mb-3">Polular Post</h6>
                                    </div>
                                    <ul class="widget-popular-post list-unstyled my-4">
                                        @foreach ($popular as $item)
                                            <li class="d-flex mb-3 align-items-center pb-3 border-bottom">
                                                <img src="{{ $item->image ? asset(config('app.POST_MID')).'/'.$item->image : asset('frontend').'/assets/images/blog/img-04.jpg' }}" alt="" class="widget-popular-post-img rounded" />
                                                <div class="flex-grow-1 text-truncate ms-3">
                                                    <a href="/post/{{ $item->slug }}" class="text-dark">{{ $item->title }}</a>
                                                    <span class="d-block text-muted fs-14">{{ $item->date }}</span>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div><!--end Polular Post-->

                                <div class="mt-4 pt-2">
                                    <div class="sd-title">
                                        <h6 class="fs-16 mb-3">Text Widget</h6>
                                    </div>
                                    <p class="mb-0 text-muted mt-3">
                                        Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft
                                        beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v
                                        laborum. Aliquip veniam
                                        delectus, Marfa eiusmod Pinterest in do umami readymade swag.
                                    </p>
                                </div>


                                <div class="mt-4 pt-2">
                                    <div class="sd-title">
                                        <h6 class="fs-16 mb-3">Latest Tags</h6>
                                    </div>
                                    <div class="tagcloud mt-3">
                                        <a class="badge tag-cloud fs-12 mt-2"
                                            href="javascript:void(0)">Fashion</a>
                                        <a class="badge tag-cloud fs-12 mt-2"
                                            href="javascript:void(0)">Jobs</a>
                                        <a class="badge tag-cloud fs-12 mt-2"
                                            href="javascript:void(0)">Business</a>
                                        <a class="badge tag-cloud fs-12 mt-2"
                                            href="javascript:void(0)">Corporate</a>
                                        <a class="badge tag-cloud fs-12 mt-2"
                                            href="javascript:void(0)">E-commerce</a>
                                        <a class="badge tag-cloud fs-12 mt-2"
                                            href="javascript:void(0)">Agency</a>
                                        <a class="badge tag-cloud fs-12 mt-2"
                                            href="javascript:void(0)">Responsive</a>
                                    </div>
                                </div><!--end Latest Tags-->


                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        @include('frontend.layouts.footer')
    </div>

</x-frontend-master>
