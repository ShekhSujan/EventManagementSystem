<script src="{{asset("assets/frontend/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/popper.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/wow.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/counterup.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/jquery.downCount.js")}}"></script>
<script src="{{asset("assets/frontend/js/jquery.fancybox.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/perfect-scrollbar.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/slick.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/isotope.min.js")}}"></script>
<script src="{{asset("assets/frontend/js/custom-scripts.js")}}"></script>
<script>
function readURLa(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#imgload').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imgInp").change(function () {
  readURLa(this);
});

</script>