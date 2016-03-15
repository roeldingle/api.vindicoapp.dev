@extends('docs.layouts.master')

@section('page_title')

  Vindicoapp API Documentation v1.0

@stop

@section('navbar_title')

<div class="row">
    <div class="col-lg-12">
      <!--<img src="{{ asset('images/vd-logo1.png') }}" alt="Images" style="border: #fff solid 1px; " />--> Vindicoapp REST API 1.0
    </div>
</div>
@stop

@section('content')

  <h3>Documentation</h3>

  <p>

    Welcome to Vindicoapp REST API v1 documentation. This will guide you to have an overview

    on how the API works.Feel free to update this. Thanks! &#9829;

    <br>

    <b>Note</b>: Feature that doesn't have any links is not yet done.

  </p>

  <h3><a href="{{ URL::route('doc.v1.installation') }}">Installation</a></h3>

  <ul>

    <li><a href="{{ URL::route('doc.v1.installation'). '#install-composer' }}">Install Composer</a></li>

    <li><a href="{{ URL::route('doc.v1.installation'). '#clone-project' }}">Clone Vindicoapp Repository</a></li>

    <li><a href="{{ URL::route('doc.v1.installation'). '#create-environment-variables' }}">Environment Variables</a></li>

    <li><a href="{{ URL::route('doc.v1.installation'). '#upload-database-migrations' }}">Upload Database & Migrations</a></li>

    <li><a href="{{ URL::route('doc.v1.installation'). '#tools' }}">Tools</a></li>

  </ul>

  <h3><a href="{{ URL::route('doc.v1.authentication') }}">Authentication</a></h3>

  <ul>

    <li><a href="{{ URL::route('doc.v1.authentication'). '#login' }}">[POST] Login</a></li>

    <li><a href="{{ URL::route('doc.v1.authentication'). '#logout' }}">[GET] Logout</a></li>

  </ul>

  

@stop