@extends('layouts.app')

@section('content')
  <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
  </script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('notify') }}">
                        {{ csrf_field() }}
                       @if(Session::has('message'))
						<div class="alert alert-success">{{session('message')}}</div>
                       @endif

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Message</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="message"  required autofocus>{{ old('message') }}</textarea>

                            </div>
                        </div>

                     

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>

                       
                            </div>
                        </div>
                    </form>
                </div>
				
                <!--<div id="app">
				home Vue component 
				<home></home>
			  </div>-->
        </div>
    </div>
</div>
<!--<div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>-->
@endsection

