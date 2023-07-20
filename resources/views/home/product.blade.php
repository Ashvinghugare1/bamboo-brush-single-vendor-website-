<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @isset($products)
               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           {{$product->name}}
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="storage/{{$product->image }}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->name}}
                        </h5>
                        @if($product->discount_price!==null)
                        <h6 style="color: red">
                        Discount Price <br>
                        Rs {{$product->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color: blue">
                        Price<br>
                        Rs {{$product->price}}
                        </h6>
                        @else
                        <h6 style="color: blue">
                        Price<br>
                        Rs {{$product->price}}
                        </h6>
                        
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
               @endisset
               <span style="padding-top:20px">
                  {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
               </span>

            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>