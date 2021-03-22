@extends('layouts.app')

@section('title')
    Overview
@endsection

@section('content')
    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <div class="inner">
            <div class="app-card-body p-3 p-lg-4">
                <h3 class="mb-3">Welcome, developer!</h3>
                <div class="row gx-5 gy-3">
                    <div class="col-12 col-lg-9">
                        <div>Portal is a free Bootstrap 5 admin dashboard template. The design is simple, clean
                            and modular so it's a great base for building any modern web app.
                        </div>
                    </div><!--//col-->
                    <div class="col-12 col-lg-3">
                    </div><!--//col-->
                </div><!--//row-->
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div><!--//app-card-body-->

        </div><!--//inner-->
    </div><!--//app-card-->
@endsection
