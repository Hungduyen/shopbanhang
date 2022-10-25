@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
								
							</div>
							<!-- <div id="similar-product" class="carousel slide" data-ride="carousel">
								
								 
								    <div class="carousel-inner">

										<div class="item active">
										  <a href=""><img src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
										</div>
										
										
										
									</div>
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div> -->

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>Tên sản phẩm: <span style="color: red">{{$value->product_name}}</span></h2>
								<p>Mã sản phẩm: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								
								<form action="{{URL::to('/save-cart')}}" method="POST">
									@csrf
									<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                          
								<!-- <span>
								<span>Giá: {{number_format($value->product_price,0,',','.').' vnđ'}}</span><br>
									<label>
										<label>Số lượng:</label>
										<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
										<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ hàng
										</button>
									
								</label>
								
								</span> -->

								<span>
									<span>
										<span>
											Giá: 
										</span>
										<span style="color: red; display: block;">
											{{number_format($value->product_price,0,',','.').' ₫'}}
										</span>
									</span><br>
									<label>
									<label>Chọn số lượng đặt mua:</label>
									<input name="qty" type="number" max="{{$value->product_quantity}}" min="0" class="cart_product_qty_{{$value->product_id}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
									</label>
								</span>
								<input type="button" value="Thêm vào giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
								</form>

								<p>Điều kiện:<b> Hàng mới 100%</b></p>

								<?php
                                   if($value->product_quantity == 0){ 
                                 ?>
                                 <p>Tình trạng:<b><a style="line-height: 1.3em; font-size: 16px; color: #d0021b; text-transform: uppercase; margin-bottom: 10px;"><i> Cháy hàng</i></a></b></p>
                                 <?php 
                                }else{
                                ?>
                                <p>Tình trạng:<b><a style="line-height: 1.3em; font-size: 16px; color: #058231c7; text-transform: uppercase; margin-bottom: 10px;"> Còn hàng</a></b></p>
                                <?php
                                 }
                                ?>

								<p>Thương hiệu:<b><a href="{{URL::to('/thuong-hieu/'.$value->brand_slug)}}" style="color: red">{{$value->brand_name}}</a></b></p>


								<p>Danh mục:<b><a href="{{URL::to('/danh-muc/'.$value->slug_category_product)}}"> {{$value->category_name}}</a></b></p>


								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
							
								<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!!$value->product_desc!!}</p>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$value->product_content!!}</p>
								
						
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
	@endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h1></h1><h2 class="title text-center" style="color: red;">Sản phẩm cùng danh mục: {{$value->category_name}}</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							@foreach($relate as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
		                                        <div class="productinfo text-center product-related">
		                                        	<a href="{{URL::to('/chi-tiet/'.$lienquan->product_slug)}}">
		                                            <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" /></a>
		                                            <h2>{{number_format($lienquan->product_price,0,',','.').' '.'VNĐ'}}</h2>
		                                            <p>{{$lienquan->product_name}}</p>
		                                         	
		                                        </div>
		                                      
                                			</div>
										</div>
									</div>
							@endforeach		

								
								</div>
									
							</div>
									
						</div>
					</div>
					<div class="recommended_items"><!--recommended_items-->
						<h1></h1><h2 class="title text-center" style="color: green;">Sản phẩm cùng hãng: {{$value->brand_name}}</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							@foreach($cunghang as $key => $ch)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
		                                        <div class="productinfo text-center product-related">
		                                        	<a href="{{URL::to('/chi-tiet/'.$ch->product_slug)}}">
		                                            <img src="{{URL::to('public/uploads/product/'.$ch->product_image)}}" alt="" /></a>
		                                            <h2>{{number_format($ch->product_price,0,',','.').' '.'VNĐ'}}</h2>
		                                            <p>{{$ch->product_name}}</p>
		                                         	
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

@endsection