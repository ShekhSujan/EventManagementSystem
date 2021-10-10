<html>
<head>
  <title>{{ (isset($title)?$title:"Home") }}</title>
  <style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Oswald');
  *
  {
    margin: 0;
    padding: 0;
    border: 0;
    box-sizing: border-box
  }

  body
  {
    background-color: #dadde6;
    font-family: arial
  }

  .fl-left{float: left}

  .fl-right{float: right}

  .container
  {
    width: 70%;
    margin: 100px auto
  }

  h1
  {
    text-transform: uppercase;
    font-weight: 900;
    border-left: 10px solid #fec500;
    padding-left: 10px;
    margin-bottom: 30px
  }

  .row{
    overflow: hidden;
      padding-left: 20px;
  }

  .card
  {
    display: table-row;
    width: 80%;
    background-color: #fff;
    color: #000;
    margin-bottom: 10px;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    border-radius: 4px;
    position: relative;
    border: 1px solid #ea1e76;

  }
  .pl{
    padding-left: 5px;
  }
  .card + .card{margin-left: 2%}

  .date
  {
    display: table-cell;
    width: 25%;
    position: relative;
    text-align: center;
    border-right: 2px dashed #dadde6
  }

  .date:before,
  .date:after
  {
    content: "";
    display: block;
    width: 30px;
    height: 30px;
    background-color: #DADDE6;
    position: absolute;
    top: -15px ;
    right: -15px;
    z-index: 1;
    border-radius: 50%
  }

  .date:after
  {
    top: auto;
    bottom: -15px
  }

  .date time
  {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
  }

  .date time span{display: block}

  .date time span:first-child
  {
    color: #ea1e76;
    font-weight: 600;
    font-size: 250%
  }

  .date time span:last-child
  {
    text-transform: uppercase;
    font-weight: 600;
    margin-top: -10px
  }

  .card-cont
  {
    display: table-cell;
    width: 75%;
    font-size: 85%;
    padding: 10px 10px 30px 50px
  }

  .card-cont h3
  {
    color: #ea1e76;
    font-size: 130%
  }

  .row:last-child .card:last-of-type .card-cont h3
  {
    text-decoration: line-through
  }

  .card-cont > div
  {
    display: table-row
  }

  .card-cont .even-date i,
  .card-cont .even-info i,
  .card-cont .even-date time,
  .card-cont .even-info p
  {
    display: table-cell
  }

  .card-cont .even-date i,
  .card-cont .even-info i
  {
    padding: 5% 5% 0 0
  }

  .card-cont .even-info p
  {
    padding: 30px 50px 0 0
  }

  .card-cont .even-date time span
  {
    display: block
  }

  .card-cont a
  {
    display: block;
    text-decoration: none;
    width: 80px;
    height: 30px;
    background-color:#AA1740;;
    color: #fff;
    text-align: center;
    line-height: 30px;
    border-radius: 2px;
    position: absolute;
    right: 10px;
    bottom: 10px
  }

  .row:last-child .card:first-child .card-cont a
  {
    background-color: #037FDD
  }

  .row:last-child .card:last-child .card-cont a
  {
    background-color: #F8504C
  }

  @media screen and (max-width: 860px)
  {
    .card
    {
      display: block;
      float: none;
      width: 100%;
      margin-bottom: 10px
    }

    .card + .card{margin-left: 0}

    .card-cont .even-date,
    .card-cont .even-info
    {
      font-size: 75%
    }
  }
  .row:last-child .card:first-child .card-cont a {
    background-color: #037FDD;
  }
</style>
<!-- ################## -->
<style>
@page {
  size: A4 portrait;
  /*size: portrait;*/
  margin: 0px;
}
@media screen {
  div.divFooter {
    display: none;
  }

  div.divHeader {
    display: none;
  }
}
@media print {
  body * {
    visibility: hidden;
  }

  div.divHeader {
    position: fixed;
    top: 0;
  }

  div.divFooter {
    position: fixed;
    bottom: 0;
  }

  #printableArea, #printableArea * {
    visibility: visible;
  }
  #printableArea {
    position: absolute;
    left: 0;
    top: 50;
    padding:0 70px
  }
  #hid{
    display: none;
  }
  .hdd{
    display: none;
  }
  .content{

    margin: 0px;
  }
}
.button-des{
  background-color: #ea1e76;
  border: none;
  color: white;
  padding: 8px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 4px;
  cursor: pointer;
  float: left !important;
}
</style>

<script src="{{asset("assets/frontend/js/jquery.min.js")}}"></script>
<script>
$(document).ready(function () {
  $("#print").click(function () {
    $("#pin-sidebar").click();
    window.print();
    $("#pin-sidebar").click();
    ;
  });
});
</script>
</head>
<body>
  <section class="container">
    <h1>Events Tickets</h1>
    <div class="row">
      <article class="card">
      </article>
      <button type="submit" id="print" class="button-des">Print Ticket</button>
    </div>
    @foreach($allStripe as $value)
    <div class="row" id="printableArea">
      <article class="card fl-left" >
        <section class="date">
          <time datetime="23th feb">
            <span>{{ date('d', strtotime($value->event_date)) }}</span><span>{{ date('M', strtotime($value->event_date)) }}</span>
          </time>
        </section>
        <section class="card-cont">
          <small>{{$value->event_host}}</small>
          <h3>{{$value->event_title}}</h3>
          <div class="even-date">
            <i class="fa fa-calendar"></i>
            <time>
              <span>{{ date('d,M Y', strtotime($value->event_date)) }}</span>
              <span>{{$value->time}}</span>
              <span>Ticket:{{$value->qty}}</span>
              <span>Token Key:{{$value->customerid}}</span>
            </time>
          </div>
          <div class="even-info">
            <i class="fa fa-map-marker"></i>
            <p>
              Welcome To Enternals Event,Have Enjoyable Moments!
            </p>
          </div>
        </section>
      </article>
    </div>
    @endforeach
    <div class="row">
      <h3>Back To:</h3>
      <a href="{{route('home')}}" >Home</a>/
      <a href="{{route('account')}}">Account</a>
    </div>
  </body>
  </html>
