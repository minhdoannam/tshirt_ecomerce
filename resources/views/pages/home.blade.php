@extends('layouts.main')

@section('title')
    MDN Boutique
@stop

@section('style')
a {
    color: black;
}   

a:hover {
    color: #544949;
}
@stop

@section ('header')

	<header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('storage/img/bg4.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Ấn tượng</h3>
                        <p>Đoàn Nam Minh</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('storage/img/bg5.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Cuốn hút</h3>
                        <p>Trương Thị Bích Chi</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('storage/img/bg6.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Thời trang</h3>
                        <p>Nguyễn Duy Cương</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
        </div>
    </header>
@stop

@section('content')
    <h1 class="my-4">Sản phẩm mới nhất</h1>
        <!-- Marketing Icons Section -->
        <div class="row">
            @foreach ($idSanphamMoi as $id)
            <?php
                $sp = \App\Http\Controllers\ProductController::getProductByID($id->id);
            ?>
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="{{ url('detail', [$sp->id]) }}">
                        <img src="/storage/product/{{ $sp->defaultImage }}" class="imgProduct">
                    </a>
                     <strong>{{$sp->productName }}</strong>
                    <p class="price-tag">{{number_format (\App\Http\Controllers\PricelistController::getPriceByProductID($sp->id),0,",","." ) }} VND</p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->
        @foreach ($theloai as $tl)
        <div class="row spaceProduct">
            <div class="my-4">
                <h2>{{$tl->categoryName}}</h2>
            </div>
            <div class="col-md-9 dvTitlehr"></div>
            <div class="row">
                 <?php
                    $sanphamList = \App\Http\Controllers\HomeController::showProductByCategory($tl->id);
                ?>
                    @foreach ($sanphamList as $spl)
                     <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="{{ url('detail', [$spl->id]) }}">
                        <img src="/storage/product/{{ $spl->defaultImage }}" class="imgProduct">
                    </a>
                     <strong>{{$spl->productName }}</strong>
                    <p class="price-tag">{{number_format (\App\Http\Controllers\PricelistController::getPriceByProductID($spl->id),0,",","." ) }} VND</p>
                </div>
            </div>
                    @endforeach
            </div>
        </div>
        @endforeach
        <!-- Dòng có 4 sản phẩm 

        <div class="row spaceProduct">
            <div class="col-lg-3 dvTitlepd">
                <h3>Áo thun không cổ</h3>
            </div>
            <div class="col-md-9 dvTitlehr"></div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
        <img src="img/ts1.jpg" class="imgProduct">
        <strong>Renewable Energy tshirt</strong>
        <p>by Weenietees</p>
      </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
        <img src="img/ts5.jpg" class="imgProduct">
        <strong>Renewable Energy tshirt</strong>
        <p>by Weenietees</p>
      </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
      <img src="img/ts3.jpg" class="imgProduct">
      <strong>Renewable Energy tshirt</strong>
      <p>by Weenietees</p>
    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
                        <div style="height: 255px">
                            <img src="img/ts4.jpg" class="imgProduct">
                        </div>
                        <div>
                            <strong>Renewable Energy tshirt</strong>
                            <p>by Weenietees</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        -->
        <!-- Features Section -->
        <div class="col-md-9 dvTitlehr"></div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Sunfrog Boytique có gì hot?</h2>
                <p>Tất cả những sản phẩm thời trang thời thượng nhất!</p>
                <ul>
                    <li>Áo thun</li>
                    <li>Hodie</li>
                    <li>Giày thể thao</li>
                    <li>Túi xách</li>
                </ul>
                <p>Hãy lựa chọn cho mình những sản phẩm ưng ý nhất!</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="storage/img/girl_background.png" alt="">
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">Liên lạc ngay với chúng tôi</a>
            </div>
        </div>
    </div>
            <!-- Modal giỏ hàng -->
            <!-- End Model giỏ hàng -->
	<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
@stop