@extends('backend.layouts.app')
@section('content')
<!-- Page Content -->

<div class="content">
  <div class="bg-image" style="background-image: url('/backend/assets/media/photos/photo26@2x.jpg');">
    <div class="bg-black-75">
      <div class="content content-top content-full text-center">
        <div class="py-3">
          <h1 class="fw-bold text-white mb-2">
            Dashboard
          </h1>
          <h2 class="h4 fw-medium text-white-75">
            Welcome to JC Hardware &amp; Construction Supply - Admin Panel
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('slider.index')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="fa fa-sliders text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Slider</p>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('customer.index')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="fa fa-users text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Customer</p>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('category.index')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="fa fa-list-ol text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Category</p>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('product.create')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="fab fa-opencart text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Add Product</p>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('stock.create')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="fa fa-store text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Stock</p>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('order.index')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="fa fa-shopping-cart text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Order</p>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('order.admin.index')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="fa fa-handshake text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Sales</p>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('message.index')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="far fa-envelope text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Inbox</p>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
      <a class="block block-rounded text-center" href="{{route('setting.index')}}">
        <div class="block-content px-2">
          <p class="mt-1 mb-3">
            <i class="fa fa-cogs text-gray fa-2x"></i>
          </p>
          <p class="fw-semibold fs-sm text-uppercase">Site Setting</p>
        </div>
      </a>
    </div>
  </div>
  <div class="row mt-4">
    <!-- Row #1 -->
    <div class="col-6 col-xl-3">
      <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
          <div class="d-none d-sm-block">
            <i class="fa fa-shopping-cart fa-2x opacity-25"></i>
          </div>
          <div>
            <div class="fs-3 fw-semibold">{{$all}}</div>
            <div class="fs-sm fw-semibold text-uppercase text-muted">All Orders</div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-xl-3">
      <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
          <div class="d-none d-sm-block">
            <i class="fa fa-shopping-cart fa-2x opacity-25"></i>
          </div>
          <div>
            <div class="fs-3 fw-semibold">{{$deliverd}}</div>
            <div class="fs-sm fw-semibold text-uppercase text-muted">Delivered Orders</div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-xl-3">
      <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
          <div class="d-none d-sm-block">
            <i class="fa fa-shopping-cart fa-2x opacity-25"></i>
          </div>
          <div>
            <div class="fs-3 fw-semibold">{{$pandding}}</div>
            <div class="fs-sm fw-semibold text-uppercase text-muted">Panding Orders</div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-xl-3">
      <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
          <div class="d-none d-sm-block">
            <i class="fa fa-shopping-cart fa-2x opacity-25"></i>
          </div>
          <div>
            <div class="fs-3 fw-semibold">{{$rejected}}</div>
            <div class="fs-sm fw-semibold text-uppercase text-muted">Rejected Orders</div>
          </div>
        </div>
      </a>
    </div>
    <!-- END Row #1 -->
  </div>
</div>
<!-- END Page Content -->
@endsection