@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.includes.side-settings')
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Cissie Ednas Fancies - Settings</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">@csrf
                        <input type="hidden" name="id" value="{{$settings[0]->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_name">Site Name</label>
                                    <input type="text" name="site_name" id="site_name" class="form-control @error('site_name') is-invalid @enderror" value="{{ $settings[0]->site_name }}">
                                    @error('site_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_slogan">Site Slogan</label>
                                    <input type="text" name="site_slogan" id="site_slogan" class="form-control @error('site_slogan') is-invalid @enderror" value="{{ $settings[0]->site_slogan }}">
                                    @error('site_slogan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_description">Site Description</label>
                                    <textarea name="site_description" id="site_description" class="form-control @error('site_description') is-invalid @enderror" cols="30" rows="4">{{ $settings[0]->site_description }}</textarea>
                                    @error('site_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about_title">About Title</label>
                                    <input type="text" name="about_title" id="about_title" class="form-control @error('about_title') is-invalid @enderror" value="{{ $settings[0]->about_title }}">
                                    @error('about_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about_description">About Description</label>
                                    <textarea name="about_description" id="about_description" class="form-control @error('about_description') is-invalid @enderror" cols="30" rows="4">{{ $settings[0]->about_description }}</textarea>
                                    @error('about_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footerleft_title">Footer Left Title</label>
                                    <input type="text" name="footerleft_title" id="footerleft_title" class="form-control @error('footerleft_title') is-invalid @enderror" value="{{ $settings[0]->footerleft_title }}">
                                    @error('footerleft_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footerright_title">Footer Right Title</label>
                                    <input type="text" name="footerright_title" id="footerright_title" class="form-control @error('footerright_title') is-invalid @enderror" value="{{ $settings[0]->footerright_title }}">
                                    @error('footerright_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footerleft_desc">Footer Left Description</label>
                                    <textarea name="footerleft_desc" id="footerleft_desc" class="form-control @error('footerleft_desc') is-invalid @enderror" cols="30" rows="3">{{ $settings[0]->footerleft_desc }}</textarea>
                                    @error('footerleft_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footerright_desc">Footer Right Description</label>
                                    <textarea name="footerright_desc" id="footerright_desc" class="form-control @error('footerright_desc') is-invalid @enderror" cols="30" rows="3">{{ $settings[0]->footerright_desc }}</textarea>
                                    @error('footerright_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ $settings[0]->facebook }}">
                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ $settings[0]->twitter }}">
                                    @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <input type="submit" value="Save Settings" class="btn btn-dark">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    ul.category_list {
        margin-left:0px;
        padding:0px;
    }
    ul.category_list li {
        width:100%;
        display: inline-flex;
        justify-content: space-between;
        list-style-type: none;
        border-bottom: 1px solid #e2e2e2;
        padding:10px 0px;
    }
</style>
