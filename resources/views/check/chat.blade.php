@extends('adminlte::page')
{{-- @extends('layouts.app') --}}

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Chat</div>
          <div class="panel-body">
            @foreach ($chat as $key => $value)
              <article class="">
                <div class="body">
                  Chat_id : {{ $value->chat_id }}
                  <br/>
                  Title : {{ $value->title }}
                  <br/>
                  Type : {{ $value->type }}
                  <br/>
                  Username : {{ $value->username }}
                  <br/>
                  FirstName : {{ $value->first_name }}
                  <br/>
                  LastName : {{ $value->last_name }}
                  <br/>
                </div>
              </article>
              <hr>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
