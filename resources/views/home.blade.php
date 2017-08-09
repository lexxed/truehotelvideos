@extends('master')

@section('title', 'True Hotel Video Reviews & Travel Guides by real people.')
@section('description', 'Compare Hotels by Videos by real people that was there. See inside room & surroundings of the hotel.')

@section('content')

<section class="hero is-primary is-medium header-image">
    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title is-2">
          Compare Hotels by Videos.
        </h1>
        <h2 class="subtitle is-5">
          Real Videos by Real People.
        </h2>
        <p>
            <span>
              <a href="{{ url('/hotels/thailand/bangkok') }}" class="button is-outlined" >Bangkok Hotels</a>
              &nbsp;
              <a href="{{ url('/hotels/thailand/krabi') }}" class="button is-outlined" >Krabi Hotels</a>
            </span>
        </p>
        <p><br>More destinations coming soon..</p>
      </div>
    </div>
  </section>
  <div class="hero-cta">
    <nav class="level">
      <div class="level-item has-text-centered">
        <form class="nav-item control has-addons searchbox" id="searchhome" method="POST" action="/search/">
          {{ csrf_field() }}
          <input name="q" class="input" type="text" placeholder="Search hotels videos">
          <a class="button is-primary" onclick="document.getElementById('searchhome').submit();">
          &nbsp; <i class="fa fa-search"></i> 
          </a>
        </form>      
      </div>
    </nav>
  </div>
  <?php
  /*
  <div class="section main">
    <div class="container">
      <div class="columns">
        <div class="column is-4">
          <div class="panel">
            <div class="panel-block section">
              <p class="has-text-centered"><i class="fa fa-camera-retro icon-block"></i></p>
              <br>
              <p>
                Truehotelvideos compiles all hotel videos for easy review of which hotel to
              </p>
              <br>
              
            </div>
          </div>
        </div>
        <div class="column is-4">
          <div class="panel">
            <div class="panel-block section">
              <p class="has-text-centered"><i class="fa fa-bar-chart icon-block"></i></p>
              <br>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.</p>
              <br>
              
            </div>
          </div>

        </div>
        <div class="column is-4">
          <div class="panel">
            <div class="panel-block section">
              <p class="has-text-centered"><i class="fa fa-cloud icon-block"></i></p>
              <br>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.</p>
              <br>
              
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  */
  ?>

  <div class="spacer"></div>

@endsection	