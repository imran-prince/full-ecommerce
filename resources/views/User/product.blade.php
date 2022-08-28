<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
            <div>
                <form action="{{url('user_search')}}" method="GET">
                    @csrf
                    <input type="text" name="search" placeholder="search by name or category">
                    <input type="submit" class="btn btn-info" value="search">
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($product as $data)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product.details', $data->id) }}" class="option1">
                                    Product Details
                                </a>
                                <form action="{{ route('add.cart', $data->id) }}" method="post">
                                    @csrf
                                    <input type="number" name="quantity" min="1">
                                    <input type="submit" value="add to cart">
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{ $data->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $data->title }}
                            </h5>
                            @if ($data->discount_price)
                                <h6 style="color: red">
                                    discount_price
                                    <br>
                                    {{ $data->discount_price }}
                                </h6>

                                <h6 style="text-decoration: line-through;color:blue">
                                    price
                                    <br>
                                    {{ $data->price }}
                                </h6>
                            @else
                                <h6 style="color: blue">
                                    {{ $data->price }}
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="  w-75 m-auto">
            {{ $product->links() }}
        </div>
        {{-- <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div> --}}
    </div>
</section>
