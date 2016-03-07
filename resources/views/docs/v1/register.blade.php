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
                email
                <span class="text-muted">required</span>
            </td>
            <td>
                The email address of the user
                <p>
                    <b>Example Values : </b> cleo@straightarrow.com.ph
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

        <tr>
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
        </tr>

        <tr>
            <td>
                first_name
                <span class="text-muted">required</span>
            </td>
            <td>
                The first name of the user
                <p>
                  <b>Example Values : </b> Cleo
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
                  <b>Example Values : </b> Aceron
                </p>
            </td>
        </tr>

        <tr>
            <td>
                username
                <span class="text-muted">required</span>
            </td>
            <td>
                The username of the user
                <p>
                  <b>Example Values : </b> cleo.aceron
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
            "status_code": true,
            "token": "$2y$10$0l5ltRBKs7Flu9cN076Diez/ImeRkuD8I0hYVeX7WBi4L8jSQrBsa"
        }
    ]
    </pre>
@stop