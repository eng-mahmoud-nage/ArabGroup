 
                        @inject('books', 'App\Book')    
 
 <div class="pro-bg">
              <h2 class="home-heading"><span>Related Products</span></h2>
        <div class="allrow pro-nepr">
          <div id="related" class="owl-carousel owl-theme">

            @foreach ($books->where('category_id', $record->category_id)->orderBy('id', 'desc')->take(10)->get() as $book)
                                    
            <div class="product-layout col-xs-12 propadding text-center">
                <div class="product-thumb transition">
                    <div class="image">
                        <a href="{{url('fronts/book'.'/'.$book->id)}}"><img src="{{url('/uploads/thumbs').'/'.$book->cover_img}}" alt="History of 1984" title="History of 1984" class="img-responsive" width="171" hieght="171"/></a>
                        @if($book->back_img)
                        <!-- insp Images Start -->
                        <a href="{{url('fronts/book'.'/'.$book->id)}}"><img src="{{url('/uploads/thumbs').'/'.$book->back_img}}" class="img-responsive second-img" alt="hover image" width="171" hieght="171" /></a>
                        <!-- End -->
                        @endif
                    </div>
                    <div class="caption">
                        <div class="hoverdes">
                            <h4><a href="{{url('fronts/book'.'/'.$book->id)}}">{{$book->name}}</a></h4>
                            <div class="rating">
                      
                            </div>
                            <p class="price">
                                <span class="price-new">{{$book->price}}</span> $
                            </p>
                        </div>

                        <div class="button-group">
                            <div class="bquickv" title="" data-toggle="tooltip"></div>
                            <button type="button" onclick="AddItem({{$book->id}})"  class="acart">
                            <span><svg width="18px" height="18px" class=""><use xlink:href="#addcart"></use></svg></span>
                        </button>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

      
                </div>
          
          </div>
                </div>
  
                </div>
      </div>
  </div>

  @push('scripts')
  <script>
                                     function AddItem(book_id) {
            var total = parseInt($('#total').text());
                console.log(book_id, total);
              if (book_id) {
                  $.ajax({
                      url: "{{url('fronts/item')}}",
                      type: "POST",
                      data: {
                            "_token": "{{ csrf_token() }}",
                            'book_id': book_id,
                            },
                      success: function(data) {
                            if (data.status === 1) {
                                $('#total').empty();
                                $('#total').text(total + 1);
                            alert("تمت اضافه المنج فى العربه");
                          } else if(data.status === 2) {
                            alert("هذا المنتج تم اختياره من قبل");
                      }  else {
                        alert("حاول مره اخرى");
                          }
                      },           error: function(xhr) {
                        console.log(xhr.responseText);
       },
                  });
              }
            };
  </script>
  @endpush