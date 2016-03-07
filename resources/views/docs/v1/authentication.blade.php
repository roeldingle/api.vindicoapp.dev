@extends('docs.layouts.master')
@section('page_title')
  Authentication - Vindicoapp API Documentation v1.0
@stop
@section('navbar_title')
    <div class="col-lg-12">
      Vindicoapp REST API 1.0
    </div>
@stop
@section('content')

  <h3>Authentication</h3>
  <hr>

  <ol>

    <li><a href="{{ URL::route('doc.v1.authentication'). '#login' }}">[POST] Login</a></li>
    <li><a href="{{ URL::route('doc.v1.authentication'). '#logout' }}">[GET] Logout</a></li>

  </ol>

  <h4 id="login">1. <b>Login</b></h4>

  <h4>Resource URL</h4>
  <code>
    http://api.straightarrowasset.com/vindicoapp/api/v1/auth/login
  </code>

  <h4>Resource Information</h4>
  <table class="table table-hovered table-striped">
    <tr>
      <td>Request Type</td>
      <td>POST</td>
    </tr>
    <tr>
      <td>
        Response format
      </td>
      <td>JSON</td>
    </tr>
  </table>

  <h4>Parameters</h4>
  <table class="table table-hovered table-striped">



    <tr>
      <td>
        username / email
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> testuser / test@test.com
        </p>
      </td>
    </tr>

    <tr>
      <td>
        password
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> password, 123456
        </p>
      </td>
    </tr>

    <tr>
      <td>
        grant_type
        <span class="text-muted">required</span>
      </td>
      <td>
        String (system constant)
        <p>
          <b>Value : </b> password
        </p>
      </td>
    </tr>

    <tr>
      <td>
        client_id
        <span class="text-muted">required</span>
      </td>
      <td>
        String (system constant)
        <p>
          <b>Value : </b> vindicoapp
        </p>
      </td>
    </tr>

    <tr>
      <td>
        client_secret
        <span class="text-muted">required</span>
      </td>
      <td>
        String (system constant)
        <p>
          <b>Value : </b> password123
        </p>
      </td>
    </tr>

    

  </table>

  <h4>Example Request</h4>

  <code>
    POST http://api.straightarrowasset.com/vindicoapp/api/v1/auth/login
  </code>

  <h5>Example Response</h5>
  <pre>
    {
      "is_logged_in": true,
      "message": "Loggin successful",
      "data": {
        "access_token": "Kvxlic009mcpqLQtjSE1YlUcgDP5YQFffLOkC549",
        "token_type": "Bearer",
        "expires_in": 604800
      }
    }
  </pre>

  <h4 id="logout">2. <b>Logout</b></h4>

  <hr>

  <p>Logout from the application. </p>
  
  <p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>


  <h4>Resource URL</h4>
  <code>
    http://api.straightarrowasset.com/vindicoapp/api/v1/auth/logout
  </code>

  <h4>Resource Information</h4>
  <table class="table table-hovered table-striped">
    <tr>
      <td>Request Type</td>
      <td>GET</td>
    </tr>
    <tr>
      <td>
        Response format
      </td>
      <td>JSON</td>
    </tr>
  </table>

  <h4>Example Request</h4>
  <code>
    GET http://api.straightarrowasset.com/vindicoapp/api/v1/auth/logout
  </code>

  <h5>Example Response</h5>
  <pre>
    {
      "is_logged_out": true,
      "message": "Logout successful"
    }
  </pre>

@stop