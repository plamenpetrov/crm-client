@extends('layout.md')

@section('content')

<div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

    <section class="form-elegant">

        <!--Form without header-->
        <div class="card">

            <div class="card-body mx-4">

                <!--Header-->
                <div class="text-center">
                    <h3 class="dark-grey-text mb-4"><strong>Sign in</strong></h3>
                </div>

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{!!URL::route('login_post')!!}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!--Body-->
                    <div class="form-group">
                        <label for="Form-email1">Your email</label>
                        <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                    </div>

                    <div class="form-group">
                        <label for="Form-pass1">Your password</label>
                        <input type="password" name="password" class="form-control" >
                        
                        <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1"> Password?</a></p>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" name="submit" class="btn btn-primary blue-gradient btn-block m-t-10 waves-effect">Sign in</button>
                    </div>
                    <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in with:</p>

                    <div class="row my-3 d-flex justify-content-center">
                        <!--Facebook-->
                        <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-facebook blue-text text-center"></i></button>
                        <!--Twitter-->
                        <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-twitter blue-text"></i></button>
                        <!--Google +-->
                        <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus blue-text"></i></button>
                    </div>
                </form>
            </div>

            <!--Footer-->
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="#" class="blue-text ml-1"> Sign Up</a></p>
            </div>

        </div>
        <!--/Form without header-->

    </section>

</div>

@stop










