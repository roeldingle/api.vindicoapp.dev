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

    <li><a href="{{ URL::route('doc.v1.authentication'). '#login' }}">[POST] Login with facebook</a></li>
    <li><a href="{{ URL::route('doc.v1.authentication'). '#logout' }}">[GET] Logout</a></li>

  </ol>

  <h4 id="login">1. <b>Login with facebook. </b></h4>

  <h4>Resource URL</h4>
  <code>
    http://api.straightarrowasset.com/valedate/api/v1/auth/login
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
        facebook_id
        <span class="text-muted">required</span>
      </td>
      <td>
        Integer
        <p>
          <b>Example Values : </b> 10153049638771855
        </p>
      </td>
    </tr>


    <tr>
      <td>
        email
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> ann@straightarrow.com.ph
        </p>
      </td>
    </tr>

    <tr>
      <td>
        about_me
        <span class="text-muted">optional</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> My name is Ann Smith. I am a senior in high school. Everyone can agree that I am a good student and that I like to study. My favorite subjects are chemistry and biology. I am going to enter the university because my goal is to study these subjects in future and to become a respected professional in one of the fields. 
        </p>
      </td>
    </tr>

    <tr>
      <td>
        gender
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> Female
        </p>
      </td>
    </tr>

    <tr>
      <td>
        first_name
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> Ann
        </p>
      </td>
    </tr>

    <tr>
      <td>
        middle_name
        <span class="text-muted">optional</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> David
        </p>
      </td>
    </tr>

    <tr>
      <td>
        last_name
        <span class="text-muted">optional</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> Smith
        </p>
      </td>
    </tr>

    <tr>
      <td>
        locale
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> en_US
        </p>
      </td>
    </tr>

    <tr>
      <td>
        timezone
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> -8
        </p>
      </td>
    </tr>

    <tr>
      <td>
        date_of_birth
        <span class="text-muted">required</span>
      </td>
      <td>
        Date
        <p>
          <b>Example Values : </b> 1990-05-15
        </p>
      </td>
    </tr>

    <tr>
      <td>
        updated_time
        <span class="text-muted">required</span>
      </td>
      <td>
        Date
        <p>
          <b>Example Values : </b> 2015-02-01T15:27:27+0000
        </p>
      </td>
    </tr>

    <tr>
      <td>
        status
        <span class="text-muted">required</span>
      </td>
      <td>
        boolean
        <p>
          <b>Example Values : </b> 1
        </p>
      </td>
    </tr>

    <tr>
      <td>
        longitude
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> 121.0760663544022
        </p>
      </td>
    </tr>

    <tr>
      <td>
        latitude
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> 14.58469835111368
        </p>
      </td>
    </tr>

    <tr>
      <td>
        location
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> Houston, California
        </p>
      </td>
    </tr>


    <tr>
      <td>
        age
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>
          <b>Example Values : </b> 24
        </p>
      </td>
    </tr>

    <tr>
      <td>
        photos[]
        <span class="text-muted">required</span>
      </td>
      <td>
        Array
        <p>
          <b>Example Values : </b>
            <ul>
                  <li>
                    photos[0] = images/photos01.jpg
                  </li>
                  <li>
                    photos[1] = images/photos02.jpg
                  </li>
                  <li>
                    photos[2] = images/photos03.jpg
                  </li>
              </ul>
        </p>
      </td>
    </tr>

  </table>

  <h4>Example Request</h4>

  <code>
    POST http://api.straightarrowasset.com/valedate/api/v1/auth/login
  </code>

  <h5>Example Response</h5>
  <pre>
    {
      "is_logged_in": true,
      "token": "MC42NzI0ODEwMCAxNDE3NjY3NTE5LTIzNy1JWE5lWWdGejMyejFLa0dtb0FiOHNIVlViZ0hpcmRQSg=="
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
    http://api.straightarrowasset.com/valedate/api/v1/auth/logout
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
    GET http://api.straightarrowasset.com/valedate/api/v1/auth/logout
  </code>

  <h5>Example Response</h5>
  <pre>
    {
      "is_logged_out": true,
      "data": "You have successfully logged out into the system"
    }
  </pre>

@stop