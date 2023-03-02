    @php
    $tikets = App\Models\Tiket::where('status', 0)
        ->orderBy('id', 'ASC')
        ->get();
    // var_dump($tikets);
    // exit;
    @endphp

    <section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> New Products </h3>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">

                    @foreach ($tikets as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a
                                            href="{{route('tiket.detail',$product->id)}}">
                                            <img class="default-img"
                                                src="{{ asset('Upload/tiket/' . $product->image) }}" alt="" />

                                        </a>
                                    </div>
                                
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                    
                                    </div>
                                    <h2>
                                        <a
                                            href="{{ url('product/details/' . $product->id) }}">
                                            {{ $product->name }} </a>
                                        </h2>
                                    <div>
                                        <p>
                                                {{ $product->desc }}
                                            </p>
                                    </div>
                                    <div class="clearfix product-price-cover">

                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">${{ $product->price }}</span>
    
                                        </div>
                                
                                </div>
                                    <div class="product-card-bottom">
                                        <div class="add-cart">
                                            <a class="add" href="{{route('tiket.detail',$product->id)}}"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Tiket Detail </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one-->
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two-->

        </div>
        <!--End tab-content-->
    </div>
    </section>
