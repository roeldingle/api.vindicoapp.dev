@extends('docs.layouts.master')
@section('page_title')
  Installation - Vindicoapp API Documentation v1.0
@stop
@section('navbar_title')
  <div class="row">
      <div class="col-lg-12">
        Vindicoapp REST API 1.0
      </div>
  </div>
@stop
@section('content')
  <h3>Installation</h3>
  <hr>
  <ol>
    <li><a href="{{ URL::route('doc.v1.installation'). '#install-composer' }}">Install Composer</a></li>
    <li><a href="{{ URL::route('doc.v1.installation'). '#clone-project' }}">Clone SportsAce Repository</a></li>
    <li><a href="{{ URL::route('doc.v1.installation'). '#create-environment-variables' }}">Environment Variables</a></li>
    <li><a href="{{ URL::route('doc.v1.installation'). '#upload-database-migrations' }}">Upload Database & Migrations</a></li>
    <li><a href="{{ URL::route('doc.v1.installation'). '#tools' }}">Tools</a></li>
  </ol>
  <h4 id="fetch-all-user-notifications"><b>1. Install Composer</b></h4>
  <hr>
  <p>
    Laravel utilizes <a href="http://getcomposer.org">Composer</a> to manage its dependencies. First, download a copy of the <code>composer.phar</code>.
    Once you have the PHAR archive, you can either keep it in your local project directory or move to <code>usr/local/bin</code> to use it globally on your system.
    On Windows, you can use the Composer <a href="https://getcomposer.org/Composer-Setup.exe">Windows installer</a>.
  </p>


  <h4 id="clone-project"><b>2. Clone Vindicoapp Repository</b></h4>
  <hr>
  <ol>
    <li>
      <code>git clone https://caceron@bitbucket.org/assetdos/valedate-web-services.git</code>
    </li>
    <li>
      <code>composer install</code>
    </li>
  </ol>

  <h4 id="create-environment-variables"><b>3. Environment Variables</b></h4>
  <p>
    In Laravel 5 you don't need to modify this snippet <code>bootstrap/start.php</code>, Follow the instructions below
  </p>
  <ol>
    <li>
      Copy this code snippet and paste it in the <code>.env</code>
      <pre>
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeRandomString

DB_HOST=localhost
DB_DATABASE=YOUR-DATABASE-NAME
DB_USERNAME=YOUR-DATABASE-USERNAME
DB_PASSWORD=YOUR-DATABASE-PASSWORD

CACHE_DRIVER=file
SESSION_DRIVER=file

      </pre>

      <p>To get the application key, Click here <a href="http://laravel.com/docs/master#configuration">Application Key.</a></p>
    </li>
  </ol>

  <h4 id="upload-database-migrations"><b>4. Upload Database and Migrations</b></h4>
  <ol>
    <li>
      Download the <a href="{{ asset('valedate.sql') }}">SQL File</a> and import it using through CLI or any MySQL Client
    </li>
    <li>
      <p>Execute the following commands.</p>
      <ol>
        <li><code>php artisan migrate:install</code></li>
        <li><code>php artisan migrate</code></li>
      </ol>
    </li>
  </ol>

  <h5 id="tools"><b>5. Tools</b></h4>
  <ol>
    <li><a href="https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm?hl=en">Postman</a></li>
  </ol>

@stop