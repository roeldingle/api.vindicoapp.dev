@extends('docs.layouts.master')
@section('page_title')
  Reports - Vindicoapp API Documentation v1.0
@stop
@section('navbar_title')
    <div class="col-lg-12">
      Vindicoapp REST API 1.0
    </div>
@stop
@section('content')

  <h3>Reports</h3>
  <hr>

  <ol>
    <li><a href="{{ URL::route('doc.v1.reports'). '#create-reports' }}">[POST] Create new Report</a></li>
    <li><a href="{{ URL::route('doc.v1.reports'). '#reports' }}">[GET] All Reports</a></li>
    <li><a href="{{ URL::route('doc.v1.reports'). '#view-report' }}">[GET] View a Report</a></li>
    <li><a href="{{ URL::route('doc.v1.reports'). '#delete-report' }}">[GET] Delete Report</a></li>

  </ol>

  <h4 id="create-reports">1. <b>Create a new Report</b></h4>
  <hr>

  <p>Create and save a new report by login user. </p>
  <p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>

  <h4>Resource URL</h4>
  <code>
  POST http://www.api.vindicoapp.dev/api/v1/reports
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


  <h4>Example Request</h4>

  <code>
    POST http://www.api.vindicoapp.dev/api/v1/reports
  </code>

   <h4>Parameters</h4>
  <table class="table table-hovered table-striped">
     <tr>
      <td>
        name
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>- description of report you want to save</p>
        <p>
          <b>Example Values : </b> Small airport establishments, Big clients Report
        </p>
      </td>
    </tr>

    <tr>
      <td>
        location_id
        <span class="text-muted">required</span>
      </td>
      <td>
        Integer
        <p>- id of location search</p>
        <p>
          <b>Example Values : </b> 1
        </p>
      </td>
    </tr>

    <tr>
      <td>
        brand_id
        <span class="text-muted">required</span>
      </td>
      <td>
        Integer
        <p>- id of brand search</p>
        <p>
          <b>Example Values : </b> 8
        </p>
      </td>
    </tr>

    <tr>
      <td>
        area_range
        <span class="text-muted">required</span>
      </td>
      <td>
        String / Array format
        <p>- area range search</p>
        <p>
          <b>Example Values : </b> [150,180]
        </p>
      </td>
    </tr>

    <tr>
      <td>
        search_group
        <span class="text-muted">required</span>
      </td>
      <td>
        String / Array format
        <p>- id of groups search</p>
        <p>
          <b>Example Values : </b> [1,2,3]
        </p>
      </td>
    </tr>

  </table>

  <h5>Example Response</h5>
  <pre>
    {
      "status": true,
      "message": "Saved successfully"
    }
  </pre>

   <h4 id="reports">2. <b>All Reports</b></h4>
  <hr>

  <p>Get all reports that belongs to the login user. </p>
  <p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>

  <h4>Resource URL</h4>
  <code>
  GET http://www.api.vindicoapp.dev/api/v1/reports
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
    GET http://www.api.vindicoapp.dev/api/v1/reports
  </code>

  <h5>Example Response</h5>
  <pre>
    {
    "status": true,
    "message": "Search success",
    "data": {
      "reports": [
        {
          "id": 1,
          "user_id": 2,
          "location_id": 1,
          "brand_id": 8,
          "area_range": "[100,12000]",
          "search_group": "[1,2,3]",
          "name": "First report",
          "created_at": "2016-03-14 05:47:26",
          "updated_at": "2016-03-14 05:47:26"
        },
        {
          "id": 2,
          "user_id": 2,
          "location_id": 1,
          "brand_id": 8,
          "area_range": "[100,12000]",
          "search_group": "[1,2,5]",
          "name": "First report",
          "created_at": "2016-03-14 05:47:53",
          "updated_at": "2016-03-14 05:47:53"
        }
      ]
    }
  }
  </pre>

  <h4 id="view-report">3. <b>View a Report</b></h4>
  <hr>

  <p>View a specific report of the login user. </p>
  <p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>

  <h4>Resource URL</h4>
  <code>
  GET http://www.api.vindicoapp.dev/api/v1/reports
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
    GET http://www.api.vindicoapp.dev/api/v1/reports/3
  </code>

  <h5>Example Response</h5>
  <pre>
    {
      "status": true,
      "message": "Report found",
      "data": {
        "reports": {
          "id": 3,
          "user_id": 2,
          "location_id": 1,
          "brand_id": 8,
          "area_range": "[100,12000]",
          "search_group": "[1,2,5]",
          "name": "First report",
          "created_at": "2016-03-14 11:14:02",
          "updated_at": "2016-03-14 19:14:53"
        }
      }
    }
  </pre>

  <h4 id="delete-report">4. <b>Delete report</b></h4>

  <hr>

  <p>
    Will delete reports saved by user. 
  </p>
  
  <p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>


  <h4>Resource URL</h4>
  <code>
   GET http://www.api.vindicoapp.dev/api/v1/reports-delete
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

  <h4>Parameters</h4>
  <table class="table table-hovered table-striped">

    <tr>
      <td>
        report_id
        <span class="text-muted">required</span>
      </td>
      <td>
        Integer
        <p>- id of report to delete</p>
        <p>
          <b>Example Values : </b> 1
        </p>
      </td>
    </tr>

  </table>

  <h4>Example Request</h4>
  <code>
    GET http://www.api.vindicoapp.dev/api/v1/reports-delete?report_id=2
  </code>

  <h5>Example Response</h5>
  <pre>
    {
      "status": true,
      "message": "Deleted successfully"
    }
  </pre>

@stop