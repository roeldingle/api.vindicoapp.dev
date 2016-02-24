@extends('docs.layouts.master')
@section('page_title')
  Profile - ValeDate API Documentation v1.0
@stop
@section('navbar_title')
    <div class="col-lg-12">
      <img src="{{ URL::asset('assets/images/vd-logo1.png') }} " alt="Images" style="border: #fff solid 1px; " /> ValeDate REST API 1.0
    </div>
@stop
@section('content')

	<h3>Profile</h3>
	<hr>

	<ol>

	<li><a href="{{ URL::route('doc.v1.profile'). '#fetch-profile' }}">[GET] Fetch Profile</a></li>
	<li><a href="{{ URL::route('doc.v1.profile'). '#fetch-profile-feeds' }}">[GET] Fetch Profile Feeds</a></li>
	<li><a href="{{ URL::route('doc.v1.profile'). '#fetch-specific-profile-feed' }}">[GET] Fetch Specific Profile Feed</a></li>

	</ol>

	<h4 id="fetch-profile">1. <b>Fetch Profile</b></h4>

	<hr>

  	<p>Fetch user profile in backend.</p>
  
  	<p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>

	<h4>Resource URL</h4>
	<code>
		http://api.straightarrowasset.com/valedate/api/v1/profile
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
		GET http://api.straightarrowasset.com/valedate/api/v1/profile
	</code>

	<h5>Example Response</h5>
	<pre>
{
    "matched_date": "",
    "user_id": "36",
    "name": "Pauline",
    "age": 19,
    "about_me": "About Me",
    "location": "Pasig City",
    "gender": "female",
    "current_time": "2015-04-14 00:51:08",
    "photos": [
        "https://graph.facebook.com/10153049638771855/picture?type=large&return_ssl_resources=1",
    ],
    "traits": [
        {
            "name": "Fashion Enthusiast",
            "points": 25
        },
        {
            "name": "Book Lover",
            "points": 9
        },
        {
            "name": "Adventurous Feet",
            "points": 12
        },
        {
            "name": "Audiofile",
            "points": 0
        },
        {
            "trait_user_id": "2",
            "name": "Animal Lover",
            "points": 24
        },
        {
            "trait_user_id": "3",
            "name": "Chocolate Lover",
            "points": 6
        },
        {
            "trait_user_id": "4",
            "name": "Unthinkable",
            "points": 0
        },
        {
            "trait_user_id": "78",
            "name": "ambitious surfer",
            "points": 0
        }
    ]
}
	</pre>

	<h4 id="fetch-profile-feeds">2. <b>Fetch Profile Feeds</b></h4>

	<hr>

  	<p>Fetch profile feeds in backend.</p>
  
  	<p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>

	<h4>Resource URL</h4>
	<code>
		http://api.straightarrowasset.com/valedate/api/v1/profile-feeds
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
		GET http://api.straightarrowasset.com/valedate/api/v1/profile-feeds
	</code>

	<h5>Example Response</h5>
	<pre>
[
    {
        "user_id": "27",
        "name": "Rhenz",
        "age": 19,
        "kilometers": "29 m Away",
        "location": "Pasig City",
        "photos": [
            "http://1v550a3jlx4d2lc773o373z5qn.wpengine.netdna-cdn.com/wp-content/uploads/2008/08/men.jpg"
        ],
        "traits": [
            {
                "name": "Fashion Enthusiast",
                "points": 0
            },
            {
                "name": "Book Lover",
                "points": 0
            },
            {
                "name": "Adventurous Feet",
                "points": 0
            },
            {
                "name": "Audiofile",
                "points": 0
            }
        ]
    },
    {
        "user_id": "30",
        "name": "Reuben",
        "age": 19,
        "kilometers": "63 m Away",
        "location": "Pasig City",
        "photos": [
            "http://fbppc.com/wp-content/uploads/2012/10/Todd-Herrold-headshot-1.jpeg"
        ],
        "traits": [
            {
                "name": "Fashion Enthusiast",
                "points": 0
            },
            {
                "name": "Book Lover",
                "points": 0
            },
            {
                "name": "Adventurous Feet",
                "points": 0
            },
            {
                "name": "Audiofile",
                "points": 0
            }
        ]
    },
    {
        "user_id": "31",
        "name": "Josiah",
        "age": 19,
        "kilometers": "13 m Away",
        "location": "Pasig City",
        "photos": [
            "https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xpf1/v/t1.0-9/10155998_231537887038354_374422884_n.jpg"
        ],
        "traits": [
            {
                "name": "Fashion Enthusiast",
                "points": 0
            },
            {
                "name": "Book Lover",
                "points": 0
            },
            {
                "name": "Adventurous Feet",
                "points": 0
            },
            {
                "name": "Audiofile",
                "points": 0
            }
        ]
    }
]
	</pre>

<h4 id="fetch-specific-profile-feed">3. <b>Fetch Specific Profile Feed</b></h4>

	<hr>

  	<p>Fetch specific profile feeds in backend.</p>
  
  	<p><b>Note</b>:
  
    You need to include the <i>X-Auth-Token</i> in the header that can be found right after the user
  
    has been authenticated in the <a href="{{ URL::route('doc.v1.authentication') }}">login</a></p>

	<h4>Resource URL</h4>
	<code>
		http://api.straightarrowasset.com/valedate/api/v1/profile-feeds/:id
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
		GET http://api.straightarrowasset.com/valedate/api/v1/profile-feeds/:id
	</code>

	<h5>Example Response</h5>
	<pre>
{
    "matched_date": "",
    "user_id": "27",
    "name": "Rhenz",
    "age": 19,
    "about_me": "About Me",
    "location": "Pasig City",
    "gender": "male",
    "current_time": "2015-04-14 01:06:23",
    "photos": [
        "http://1v550a3jlx4d2lc773o373z5qn.wpengine.netdna-cdn.com/wp-content/uploads/2008/08/men.jpg"
    ],
    "traits": [
        {
            "name": "Fashion Enthusiast",
            "points": 0
        },
        {
            "name": "Book Lover",
            "points": 0
        },
        {
            "name": "Adventurous Feet",
            "points": 0
        },
        {
            "name": "Audiofile",
            "points": 0
        }
    ]
}
	</pre>
@stop
