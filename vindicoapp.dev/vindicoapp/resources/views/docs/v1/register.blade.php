@extends('docs.layouts.master')
@section('page_title')
  Register - Vindicoapp API Documentation v1.0
@stop
@section('navbar_title')
  Vindicoapp REST API 1.0
@stop
@section('content')

    <h3>Register</h3>
    <hr>

    <ol>
        <li>
            <a href="{{ URL::route('doc.v1.register'). '#create-a-new-user-account' }}">[POST] Create a new user account</a>
        </li>
    </ol>

    <h4 id="create-a-new-user-account">
        <b>1. Create a New User Account</b>
    </h4>
    <hr>

    <p>Create a new user account in vindicoapp website.</p>

    <h4>Resource URL</h4>

    <code>
        http://api.straightarrowasset.com/vindicoapp/api/v1/auth/register
    </code>

    <h5>Resource Information</h5>
    <table class="table table-hovered table-striped">
        <tr>
            <td>Request Type</td>
            <td>POST</td>
        </tr>
        <tr>
            <td>Response format</td>
            <td>JSON</td>
        </tr>
    </table>

    <h4>Parameters</h4>
    <table class="table table-hovered table-striped">
        <tr>
            <td>
                username
                <span class="text-muted">required</span>
            </td>
            <td>
                The username of the user
                <p>
                  <b>Example Values : </b> testuser
                </p>
            </td>
        </tr>
        <tr>
            <td>
                email
                <span class="text-muted">required</span>
            </td>
            <td>
                The email address of the user
                <p>
                    <b>Example Values : </b> test@test.com
                </p>
            </td>
        </tr>

        <tr>
            <td>
                password
                <span class="text-muted">required</span>
            </td>
            <td>
                The password of the user
                <p>
                  <b>Example Values : </b> *******
                </p>
            </td>
        </tr>

        <!-- <tr>
            <td>
                confirm_password
                <span class="text-muted">required</span>
            </td>
            <td>
                The confirm password of the user
                <p>
                  <b>Example Values : </b> *******
                </p>
            </td>
        </tr> -->

        <tr>
            <td>
                first_name
                <span class="text-muted">required</span>
            </td>
            <td>
                The first name of the user
                <p>
                  <b>Example Values : </b> Juan
                </p>
            </td>
        </tr>

        <tr>
            <td>
                last_name
                <span class="text-muted">required</span>
            </td>
            <td>
                The last name of the user
                <p>
                  <b>Example Values : </b> Cruz
                </p>
            </td>
        </tr>

        

       

    </table>

    <h5>Example Request</h5>
    <code>
        http://api.straightarrowasset.com/vindicoapp/api/v1/auth/register
    </code>

    <h5>Example Response</h5>
    <pre>
    [
        {
          "status": true,
          "message": "Registered successfully",
          "token": "MC45NjAyNDAwMCAxNDU3OTM2MzEzLTYtM3lwUFlYNG1nS1ZNVjV5VXpRZWpQM0p6ZDc0R1RvWkk="
        }
    ]
    </pre>
@stop