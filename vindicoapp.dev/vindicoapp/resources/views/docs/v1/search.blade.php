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

  <h3>Search</h3>
  <hr>

    

  <ol>

    <li><a href="{{ URL::route('doc.v1.search'). '#search' }}">[GET] Search</a></li>
    <li><a href="{{ URL::route('doc.v1.search'). '#search-item' }}">[GET] Search Items</a></li>

  </ol>

  <h4 id="search">1. <b>Search</b></h4>
  <hr>

  <p>Search any table and field. </p>
  <p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>

  <h4>Resource URL</h4>
  <code>
  GET http://www.api.vindicoapp.dev/api/v1/search
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
        search_category
        <span class="text-muted">required</span>
      </td>
      <td>
        String
        <p>- search table on the db</p>
        <p>
          <b>Example Values : </b> groups, brands, locations, items
        </p>
      </td>
    </tr>

    <tr>
      <td>
        search_specific
      </td>
      <td>
        String
        <p>- search specific field on the table</p>
        <p>
          <b>Example Values : </b> group_name, area, etc
        </p>
      </td>
    </tr>

  </table>

  <h4>Example Request</h4>

  <code>
    GET http://www.api.vindicoapp.dev/api/v1/search?search_category=groups&search_specific=group_name
  </code>

  <h5>Example Response</h5>
  <pre>
    {
    "message": "Search success",
    "data": [
      {
        "group_name": "Electrical"
      },
      {
        "group_name": "Gas"
      },
      {
        "group_name": "Air Conditioning"
      },
      {
        "group_name": "Ventilation"
      },
      {
        "group_name": "Plumbing"
      },
      {
        "group_name": "Fire Fighting"
      },
      {
        "group_name": "IT"
      }
    ]
  }
  </pre>

  <h4 id="search-item">2. <b>Search Items</b></h4>

  <hr>

  <p>
    Will display list of search items and the search average via location, brand and area range. 
   Result will also depend on group fields that are set to display.
  </p>
  
  <p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>


  <h4>Resource URL</h4>
  <code>
   GET http://www.api.vindicoapp.dev/api/v1/search-item
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
        group_id
      </td>
      <td>
        String / Array format
        <p>- id of groups you want to display</p>
        <p>
          <b>Example Values : </b> [1,2,3]
        </p>
      </td>
    </tr>

  </table>

  <h4>Example Request</h4>
  <code>
    GET http://www.api.vindicoapp.dev/api/v1/search-item?location_id=1&brand_id=8&area=[150,180]&group_id=[1,2,3]
  </code>

  <h5>Example Response</h5>
  <pre>
    {
      "status": true,
      "data": {
        "search-list": [
          [
            {
              "id": 32,
              "item_id": 2,
              "group_name": "Electrical",
              "subgroup_name": "Actual Power load (kw)",
              "subgroup_id": 1,
              "value": "50"
            },
            {
              "id": 33,
              "item_id": 2,
              "group_name": "Electrical",
              "subgroup_name": "Provided Power (kw) Total load",
              "subgroup_id": 2,
              "value": "49"
            },
            {
              "id": 34,
              "item_id": 2,
              "group_name": "Gas",
              "subgroup_name": "Req LPG Demand (kg/hr)",
              "subgroup_id": 3,
              "value": "N/A"
            },
            {
              "id": 35,
              "item_id": 2,
              "group_name": "Gas",
              "subgroup_name": "Provided LPG Supply (kg/hr)",
              "subgroup_id": 4,
              "value": "N/A"
            },
            {
              "id": 36,
              "item_id": 2,
              "group_name": "Air Conditioning",
              "subgroup_name": "Using CHW",
              "subgroup_id": 5,
              "value": "0.85"
            },
            {
              "id": 37,
              "item_id": 2,
              "group_name": "Air Conditioning",
              "subgroup_name": "Req Cooling Capacity (tonnage)",
              "subgroup_id": 6,
              "value": "9.01"
            },
            {
              "id": 38,
              "item_id": 2,
              "group_name": "Air Conditioning",
              "subgroup_name": "Provide CHW/LS",
              "subgroup_id": 7,
              "value": "0.85"
            },
            {
              "id": 39,
              "item_id": 2,
              "group_name": "Air Conditioning",
              "subgroup_name": "Provide Cooling capacity (tonnage)",
              "subgroup_id": 8,
              "value": "9.01"
            }
          ],
          [
            {
              "id": 63,
              "item_id": 3,
              "group_name": "Electrical",
              "subgroup_name": "Actual Power load (kw)",
              "subgroup_id": 1,
              "value": "35"
            },
            {
              "id": 64,
              "item_id": 3,
              "group_name": "Electrical",
              "subgroup_name": "Provided Power (kw) Total load",
              "subgroup_id": 2,
              "value": "35"
            },
            {
              "id": 65,
              "item_id": 3,
              "group_name": "Gas",
              "subgroup_name": "Req LPG Demand (kg/hr)",
              "subgroup_id": 3,
              "value": "N/A"
            },
            {
              "id": 66,
              "item_id": 3,
              "group_name": "Gas",
              "subgroup_name": "Provided LPG Supply (kg/hr)",
              "subgroup_id": 4,
              "value": "N/A"
            },
            {
              "id": 67,
              "item_id": 3,
              "group_name": "Air Conditioning",
              "subgroup_name": "Using CHW",
              "subgroup_id": 5,
              "value": "0.93"
            },
            {
              "id": 68,
              "item_id": 3,
              "group_name": "Air Conditioning",
              "subgroup_name": "Req Cooling Capacity (tonnage)",
              "subgroup_id": 6,
              "value": "9.86"
            },
            {
              "id": 69,
              "item_id": 3,
              "group_name": "Air Conditioning",
              "subgroup_name": "Provide CHW/LS",
              "subgroup_id": 7,
              "value": "0.97"
            },
            {
              "id": 70,
              "item_id": 3,
              "group_name": "Air Conditioning",
              "subgroup_name": "Provide Cooling capacity (tonnage)",
              "subgroup_id": 8,
              "value": "10.28"
            }
          ],
          [
            {
              "id": 94,
              "item_id": 4,
              "group_name": "Electrical",
              "subgroup_name": "Actual Power load (kw)",
              "subgroup_id": 1,
              "value": "25"
            },
            {
              "id": 95,
              "item_id": 4,
              "group_name": "Electrical",
              "subgroup_name": "Provided Power (kw) Total load",
              "subgroup_id": 2,
              "value": "38"
            },
            {
              "id": 96,
              "item_id": 4,
              "group_name": "Gas",
              "subgroup_name": "Req LPG Demand (kg/hr)",
              "subgroup_id": 3,
              "value": "N/A"
            },
            {
              "id": 97,
              "item_id": 4,
              "group_name": "Gas",
              "subgroup_name": "Provided LPG Supply (kg/hr)",
              "subgroup_id": 4,
              "value": "N/A"
            },
            {
              "id": 98,
              "item_id": 4,
              "group_name": "Air Conditioning",
              "subgroup_name": "Using CHW",
              "subgroup_id": 5,
              "value": "0.93"
            },
            {
              "id": 99,
              "item_id": 4,
              "group_name": "Air Conditioning",
              "subgroup_name": "Req Cooling Capacity (tonnage)",
              "subgroup_id": 6,
              "value": "8.32"
            },
            {
              "id": 100,
              "item_id": 4,
              "group_name": "Air Conditioning",
              "subgroup_name": "Provide CHW/LS",
              "subgroup_id": 7,
              "value": "0.93"
            },
            {
              "id": 101,
              "item_id": 4,
              "group_name": "Air Conditioning",
              "subgroup_name": "Provide Cooling capacity (tonnage)",
              "subgroup_id": 8,
              "value": "9.86"
            }
          ]
        ],
        "search-ave": [
          36.666666666667,
          40.666666666667,
          0,
          0,
          0.90333333333333,
          9.0633333333333,
          0.91666666666667,
          9.7166666666667
        ]
      }
    }
  </pre>

@stop