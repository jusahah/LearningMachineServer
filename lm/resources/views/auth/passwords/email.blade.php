@extends('layouts.guest')

<!-- Main Content -->
@section('content')
    <div class="well no-padding">
           

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="smart-form client-form" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}
                         <header>
                            Reset Password
                        </header>
                        <fieldset>
                                    
                                    <section>
                        
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                       </section>
                       </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        Send password reset link
                                    </button>

                                </footer>

                    </form>
    </div>
@endsection
