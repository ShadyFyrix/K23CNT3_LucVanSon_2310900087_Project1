@extends('layouts.admin.master')
@section('tittle','Quản Trị Nội Dung')
@section('container-body')

@section('content-body')
    <div class="container">
        <div class="row border">
            <h1>

                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h3 class="card-title">{{ $productCount }}</h3>
                            <p class="card-text">Sản phẩm</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.index') }}" class="text-white text-decoration-none">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h3 class="card-title">{{ $productCount }}</h3>
                            <p class="card-text">Sản phẩm</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.index') }}" class="text-white text-decoration-none">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h3 class="card-title">{{ $productCount }}</h3>
                            <p class="card-text">Sản phẩm</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.index') }}" class="text-white text-decoration-none">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h3 class="card-title">{{ $productCount }}</h3>
                            <p class="card-text">Sản phẩm</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.index') }}" class="text-white text-decoration-none">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </h1>
        </div>
    </div>
@endsection