@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
				<div class="col-sm-3">
						<ul class="aside-menu" style="font-style: normal;">
							@foreach($type_product as $type)
							<li><a href="{{route('loaisanpham',$type-> id)}}">{{$type-> name}}</a></li>
							@endforeach
						
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm</h4>
							<div class="beta-products-Chi tiết">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} kết quả!</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $s)
								<div class="col-sm-4">
									<div class="single-item">
										@if($s -> promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$s -> id)}}"><img src="{{asset('source/image/product/'.$s-> image)}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body" style="font-size: 15px">
											<p class="single-item-title">{{$s -> name}}</p>
											<p class="single-item-price">
												@if($s -> promotion_price==0)
												
												<span class="flash-sale">Giá:${{$s -> unit_price}}M</span>
												@else 
												<span class="flash-del">Giá:${{$s -> unit_price}}M</span>
												<span class="flash-sale">${{$s -> promotion_price}}M</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$s -> id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-Chi tiết">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} kết quả!</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $dif)
								<div class="col-sm-4">
									<div class="single-item">
										@if($dif -> promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$dif -> id)}}"><img src="{{asset('source/image/product/'.$dif-> image)}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$dif -> name}}</p>
											<p class="single-item-price">
												@if($dif -> promotion_price==0)
												
												<span class="flash-sale">Giá: ${{$dif -> unit_price}}M</span>
												@else 
												<span class="flash-del">Giá:${{$dif -> unit_price}}M</span>
												<span class="flash-sale">${{$dif -> promotion_price}}M</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$dif -> id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$sp_khac -> links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection