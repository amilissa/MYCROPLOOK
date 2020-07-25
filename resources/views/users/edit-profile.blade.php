{{-- @extends('layouts.app')

@section('content')


        <div class="col-md-9">
            <div class="main-content">
                <div class="container">
                    <div class="form-row">
                        <div class="col-12">
                            <div id="display_info" class="box box-white">
                                <div class="box-header">
                                    <h5>Edit Profile</h5>
                                    <hr>
                                </div>
                                <div class="box-body">
                                    <div class="row">

                                        @foreach ($user_profile as $current_user)

                                        {!! Form::open(['action' => ['MyAccountController@update', $current_user->user_profile_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('firstName','First Name:')}}
                                                        <div class="col-15">
                                                            {{Form::text('firstName', $current_user->first_name, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('middleName','Middle Name')}}
                                                        <div class="col-15">
                                                            {{Form::text('middleName', $current_user->middle_name, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
                                                        </div>
                                                        <small>please use +63</small>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('lastName','Last Name')}}
                                                        <div class="col-15">
                                                            {{Form::text('lastName', $current_user->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('mobileNumber','Mobile Number:')}}
                                                        <div class="col-15">
                                                            {{Form::text('mobileNumber', $current_user->mobile_no, ['class' => 'form-control', 'placeholder' => 'Mobile Number'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('emailAddress','Email Address')}}
                                                        <div class="col-15">
                                                            {{Form::text('emailAddress', $current_user->email_add, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('birthday','Birthday')}}
                                                        <div class="col-15">
                                                            {{Form::date('birthday', $current_user->birthday, ['class' => 'form-control', 'placeholder' => 'Brithday'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('company','Company')}}
                                                        <div class="col-15">
                                                            {{Form::text('company', $current_user->company, ['class' => 'form-control', 'placeholder' => 'Company'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('jobTitle','Job Title')}}
                                                        <div class="col-15">
                                                            {{Form::text('jobTitle', $current_user->job_title, ['class' => 'form-control', 'placeholder' => 'Job Title'])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <i class="fa fa-camera-retro fa-lg"></i>
                                                        {{Form::file('userImage')}}
                                                    </div>
                                                    {{Form::hidden('_method', 'PUT')}}

                                                    {{form::submit('Submit', ['class' => 'btn btn-primary'])}}


                                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection --}}
