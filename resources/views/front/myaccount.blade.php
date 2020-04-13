<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>

@extends('front.layouts.default')

@section('css_before')
    <title>My Account | {{ $site_title->value }}</title>
@endsection

@section('content')
    <section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
        <h2 class="text-white font-weight-bold"> My Account </h2>
    </section>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 p-b-75">
                    @include('front.include.customerSidebar')
                </div>
                <div class="col-md-8 col-lg-9 p-b-75">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('myaccount.update', $customer->id) }}" method="post" id="form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="font-size-14"> First Name <span>*</span></label>
                                    <input type="text" name="firstname" id="firstname" class="form-control border-secondary border rounded-0 font-size-14" placeholder="First Name" required="" value="{{ $customer->firstname }}">
                                    @if ($errors->has('firstname'))
                                        <label class="error">{{ $errors->first('firstname') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="middlename" class="font-size-14"> Middle Name </label>
                                    <input type="text" name="middlename" id="middlename" class="form-control border-secondary border rounded-0 font-size-14" placeholder="Middle Name" value="{{ $customer->middlename }}">
                                    @if ($errors->has('middlename'))
                                        <label class="error">{{ $errors->first('middlename') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname" class="font-size-14"> Last Name <span>*</span></label>
                                    <input type="text" name="lastname" id="lastname" class="form-control border-secondary border rounded-0 font-size-14" placeholder="Last Name" required="" value="{{ $customer->lastname }}">
                                    @if ($errors->has('lastname'))
                                        <label class="error">{{ $errors->first('lastname') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="font-size-14"> Email Address <span>*</span></label>
                                    <input type="email" name="email" id="email" class="form-control border-secondary border rounded-0 font-size-14" placeholder="Email Address" required="" value="@if(old('email')) {{ old('email') }} @else {{ $customer->email }} @endif">
                                    @if ($errors->has('email'))
                                        <label class="error">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="update" value="update" class="bg1 bo-rad-23 hov1 s-text1 trans-0-4 size14"> Save </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_after')
$wishlist
<script type="text/javascript">
    $(document).ready(function() {
        $('#form').validate({
            errorClass: 'error animated fadeInDown mb-0 mt-1',
            errorPlacement: (error, e) => {
                $(e).parents('.form-group').append(error);
            },
            highlight: e => {
                $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: e => {
                $(e).closest('.form-group').removeClass('is-invalid');
                $(e).remove();
            }
        });
    });
</script>
@endsection