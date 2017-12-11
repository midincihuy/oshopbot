@extends('adminlte::page')
{{-- @extends('layouts.app') --}}

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Telegram Update</div>
          <div class="panel-body">
            @foreach ($update as $key => $value)
              <article class="">
                <div class="body">
                  Update ID : {{ $value->id }}
                  <br/>
                  Chat ID : {{ $value->chat_id }}
                  <br/>
                  Message ID : {{ $value->message_id }}
                  <br/>
                  Date : {{ $value->date }}
                  <br/>
                  Text : {{ $value->text }}
                  <br/>
                  Type : {{ $value->type }}
                  <br/>
                </div>
              </article>
              <hr>
            @endforeach
            {{ $update->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
