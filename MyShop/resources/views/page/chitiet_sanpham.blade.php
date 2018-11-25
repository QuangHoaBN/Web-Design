@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham -> name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							@if($sanpham -> promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
							<img src="{{asset('source/image/product/'.$sanpham -> image)}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sanpham -> name}}</p>
								<p class="single-item-price">
									@if($sanpham -> promotion_price==0)
												
												<span class="flash-sale">Giá:${{$sanpham -> unit_price}}M</span>
												@else 
												<span class="flash-del">Giá:${{$sanpham -> unit_price}}M</span>
												<span class="flash-sale">${{$sanpham -> promotion_price}}M</span>
												@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>


							<p>Tùy chỉnh:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Lượt xem (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham -> description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Gợi ý sản phẩm</h4>

						<div class="row">
							@foreach($sp_goiy as $g)
							<div class="col-sm-4">
								<div class="single-item">
									@if($g -> promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$g -> id)}}"><img src="{{asset('source/image/product/'.$g -> image)}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$g-> name}}</p>
										<p class="single-item-price">
											@if($g -> promotion_price==0)
												
												<span class="flash-sale">Giá:${{$g -> unit_price}}M</span>
												@else 
												<span class="flash-del">Giá:${{$g -> unit_price}}M</span>
												<span class="flash-sale">${{$g -> promotion_price}}M</span>
												@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sp_goiy -> links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bán chạy nhất</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							@foreach($sp_moi as $moi)
							<div class="beta-sales beta-lists">
								@if($moi -> promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$moi -> id)}}"><img src="{{asset('source/image/product/'.$moi-> image)}}" alt=""></a>
									<div class="media-body">
										{{$moi-> name}}<br>
										@if($moi -> promotion_price==0)
												
												<span class="flash-sale">Giá:${{$moi -> unit_price}}M</span>
												@else 
												<span class="flash-del">Giá:${{$moi -> unit_price}}M</span>
												<span class="flash-sale">${{$moi -> promotion_price}}M</span>
												@endif
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sp_moi -> links()}}</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection