        </main>
    </div>

        <!-- Scripts -->

<script src="<?=URL?>theme/bootstrap/js/app.js"></script>
    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
<script src="{{ asset('js/mdtimepicker.js') }}"></script> 
<link href="{{ asset('css/mdtimepicker.css') }}" rel="stylesheet" type="text/css">
<script>

  $(document).ready(function(){

    $('#timepicker').mdtimepicker(); //Initializes the time picker
  });
</script>
<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
        var ckview = document.getElementById("ckview");
        CKEDITOR.replace(ckview,{
            language:'en-gb'
        });
    </script>
</body>
</html>
