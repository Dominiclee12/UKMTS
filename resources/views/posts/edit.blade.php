@extends('layouts.apps')

@section('title')
    Edit Post | UKM Trading & Service System
@endsection

@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Edit Post</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">

                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <!-- {{Form::label('title', 'Title')}} -->
                        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{Form::label('deal method', 'Deal Method')}}
                        <div>
                            {{Form::radio('type', 'Sell Only', $post->type == 'Sell Only' ? true : '')}} 
                            {{Form::label('type', 'Sell Only')}} <br>
                            {{Form::radio('type', 'Exchange Only', $post->type == 'Exchange Only' ? true : '')}}
                            {{Form::label('type', 'Exchange Only')}} <br>
                            {{Form::radio('type', 'Sell/Exchange', $post->type == 'Sell/Exchange' ? true : '')}} 
                            {{Form::label('type', 'Sell/Exchange')}}
                        </div>
                            @if ($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <!-- {{Form::label('category', 'Category')}} -->
                        {{Form::select('category', $categories, $post->category, ['class' => 'default-select', 'placeholder' => 'Please Select Category'])}}
                        <br><br>
                        @if ($errors->has('category'))
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- {{Form::label('price', 'Price (RM)')}} -->
                        {{Form::text('price', $post->price, ['class' => 'form-control', 'placeholder' => 'Price(RM) 0.00'])}}
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="ckeditor form-group">
                        <!-- {{Form::label('description', 'Description')}} -->
                        {{Form::textarea('description', $post->description, ['class' => 'ckeditor form-control', 'placeholder' => 'Description'])}}
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{Form::file('cover_image')}}
                    </div>
                    <div class="form-group">
                        <!-- {{Form::label('status', 'Status')}} -->
                        {{Form::select('status', ['Available' => 'Available', 'Pending' => 'Pending', 'Sold' => 'Sold', 'Traded' => 'Traded'], $post->status, ['class' => 'default-select'])}}
                        <br><br>
                    </div>
                    {{Form::hidden('_method', 'PUT')}}
                    <div class="form-group">
                        <button type="submit" value="submit" class="btn primary-btn">Update Post</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection