<!-- Bootstrap css -->
<link rel="stylesheet" href="{{asset("assets/backend/css/bootstrap.min.css")}}">
<!-- Icomoon Font Icons css -->
<link rel="stylesheet" href="{{asset("assets/backend/fonts/style.css")}}">
<!-- Main css -->
<link rel="stylesheet" href="{{asset("assets/backend/css/main.css")}}">
<link rel="stylesheet" href="{{asset("assets/backend/vendor/daterange/daterange.css")}}" />
<!-- Data Tables -->
<link rel="stylesheet" href="{{asset("assets/backend/vendor/datatables/dataTables.bs4.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/datatables/dataTables.bs4-custom.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/datatables/buttons.bs.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/input-tags/tagsinput.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/summernote/summernote-bs4.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/morris/morris.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/particles/particles.css")}}">
<link rel="stylesheet" href="{{asset("assets/backend/vendor/calendar/css/core/main.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/calendar/css/daygrid/main.css")}}" />
<script src="{{asset("assets/backend/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/backend/vendor/apex/apexcharts.min.js")}}"></script>
<script src="{{asset("assets/backend/vendor/morris/raphael-min.js")}}"></script>
<script src="{{asset("assets/backend/vendor/morris/morris.min.js")}}"></script>
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
</style>


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
