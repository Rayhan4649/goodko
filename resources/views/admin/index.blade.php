<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="{{ URL::to('//fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ URL::to('public/loginpage/css/style.css') }}" />
    </head>
    <body>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">
                            <h3 class="text-center mb-4">Login</h3>

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                            @if (!empty(Session::get('login_faild')))
                            <div class="alert alert-danger">
                            <?php
                            $message= Session::get('login_faild');
                            if($message){
                                echo $message;
                                Session::put('login_faild',null);
                                }
                            ?>
                            </div>
                            @endif
                            @if (!empty(Session::get('password_change')))
                            <div class="alert alert-info">
                            <?php
                            $message1 = Session::get('password_change');
                            if($message1){
                                echo $message1;
                                Session::put('password_change',null);
                                }
                            ?>
                            </div>
                            @endif
                            @if (!empty(Session::get('hyperlink')))
                            <div class="alert alert-danger">
                            <center><span style="color:blue">OR</span></center><br/>
                            <center><a href="{{URL::to('adminLogout')}}">Click Here Then Try To Login</a></center>
                            <?php Session::put('hyperlink', null); ?>
                            
                            </div>
                            @endif

                                {!! Form::open(['url' => 'login','method' => 'post' , 'class'=> 'login-form' ]) !!}
                                <div class="form-group">
                                    <input class="form-control rounded-left" type="number" autocomplete="off" placeholder="Mobile" name="mobile" required />
                                </div>
                                <div class="form-group d-flex">
                                    <input class="form-control rounded-left" type="password" autocomplete="off" placeholder="Password" name="password" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5">LOGIN</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ URL::to('public/loginpage/js/jquery.min.js') }}"></script>
        <script src="{{ URL::to('js/popper.js') }}"></script>
    </body>

</html>
