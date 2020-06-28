<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mixer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  </head>
  <body>

  <div id="app">

    <section class="section">
      
      <div class="container">

        <div class="columns is-multiline header">
          <div class="column is-6 is-offset-6 pl-0 ">
            <h1 class="title">Mixer User Lookup</h1>
          </div>
          <div class="column is-3 is-offset-6 is-paddingless pr-5">
            <p>Search for a Mixer user by typing their handle</p>
          </div>
           <div class="column is-3 underline"></div>

          <!--  <div class="column is-3">
             <img src="{{ asset('images/digitalglue.png') }}">
           </div> -->
        </div>

      </div>

    </section>

    <section class="section is-dark-blue-bg">

      <div class="container">

        <div class="columns">
          <div class="column is-12">
            <user-search-component></user-search-component>
          </div>
        </div>

      </div>
        
    </section>
  </div>

  <script src="{{ mix('js/app.js') }}" defer></script>
  </body>
</html>