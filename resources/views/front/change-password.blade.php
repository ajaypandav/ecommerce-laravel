<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>

@extends('front.layouts.default')

@section('css_before')
    <title>Change Password | {{ $site_title->value }}</title>
@endsection

@section('content')
    <section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
        <h2 class="text-white font-weight-bold"> Change Password </h2>
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
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('myaccount.update-password', $customer->id) }}" method="post" id="form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="curr_pass" class="font-size-14"> Current Password <span>*</span></label>
                                    <input type="password" name="curr_pass" id="curr_pass" class="form-control border-secondary border rounded-0 font-size-14" placeholder="Current Password" required="">
                                </div>
                                <div class="form-group">
                                    <label for="new_pass" class="font-size-14"> New Password <span>*</span></label>
                                    <input type="password" name="new_pass" id="new_pass" class="form-control border-secondary border rounded-0 font-size-14" placeholder="New Password" required="">
                                </div>
                                <div class="form-group">
                                    <label for="conf_pass" class="font-size-14"> Confirm New Password <span>*</span></label>
                                    <input type="password" name="conf_pass" id="conf_pass" class="form-control border-secondary border rounded-0 font-size-14" placeholder="Confirm New Password" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="update" value="update" class="bg1 bo-rad-23 hov1 s-text1 trans-0-4 size11"> Change Password </button>
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
            },
            rules: {
                new_pass: {
                    required: true,
                    minlength: 6
                },
                conf_pass: {
                    required: true,
                    equalTo: '#new_pass'
                }
            },
            messages: {
                new_pass: {
                    minlength: 'Please enter password 6 character long.'
                },
                conf_pass: {
                    equalTo: 'Please enter same password again.'
                }
            }
        });
    });
</script>
@endsection