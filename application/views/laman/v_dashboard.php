<style type="text/css">

.map-responsive{

    overflow:hidden;

    padding-bottom:100%;

    position:relative;

    height:0;

}

.map-responsive iframe{

    left:0;

    top:0;

    height:80%;

    width:80%;

    position:absolute;

}



</style>

<?php 

$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");

$hari = date("w");

$hari_ini = $seminggu[$hari];

?>



<script type="text/javascript">

    //set timezone

    <?php date_default_timezone_set('Asia/Jakarta'); ?>

    //buat object date berdasarkan waktu di server

    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);

    //buat object date berdasarkan waktu di client

    var clientTime = new Date();

    //hitung selisih

    var Diff = serverTime.getTime() - clientTime.getTime();    

    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik

    function displayServerTime(){

        //buat object date berdasarkan waktu di client

        var clientTime = new Date();

        //buat object date dengan menghitung selisih waktu client dan server

        var time = new Date(clientTime.getTime() + Diff);

        //ambil nilai jam

        var sh = time.getHours().toString();

        //ambil nilai menit

        var sm = time.getMinutes().toString();

        //ambil nilai detik

        var ss = time.getSeconds().toString();

        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)

        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);

    }

</script>



<body onload="setInterval('displayServerTime()', 1000);">



<div class="row">

  <div class="col-md-12">

    <section class="panel">

      <header class="panel-heading">

        <div class="panel-actions">

          

          <a href="#" class="fa fa-times"></a>

        </div>



        <h2 class="panel-title">Selamat Datang</h2>

        <p class="panel-subtitle">di Aplikasi Monitoring Posisi Bus Primajasa</p>

      </header>

      <div class="panel-body">

        <p align=center>Realtime GPS Tracker 

                    <br/>Dibawah ini merupakan hasil visualisasi dari GPS tracker Bus Primajasa

                    <br /> <b><?php echo $hari_ini;?>, <?php echo date('d-m-Y');?>,&nbsp;<span id="clock"><?php print date('H:i:s'); ?></span></b> WIB

                </p>

      </div>

    </section>

  </div>

</div>



<div class="row">

  <div class="col-md-12">

    <section class="panel">

      

      <div class="panel-body">



        <div class="map-responsive" id="googleMap" width="600" height="450" frameborder="0" style="border:0">

          

        </div>



      </div>

    </section>

  </div>

  

</div>

<!-- end: page -->



</body>

<!-- AIzaSyBOVfpPuuh3VHFvtoas3ZuNTt2Kp9KIkTU OTHER-->

<!-- AIzaSyBMdwxyPPy90oC-E2uZWlcuHXdqW49HVps ME-->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOVfpPuuh3VHFvtoas3ZuNTt2Kp9KIkTU&callback=initialize"

  type="text/javascript"></script>





<script type="text/javascript">





$(function(){

  setInterval(function(){

    cek();

  },10000);

});



function cek() {

  $.ajax({

    url: "<?php echo site_url('dashboard/get_data_sensor'); ?>",

    cache: false,

    success: function(data){

      var str = data.split("/");

      initialize(str[0],str[1]);

    }

    });

}



function initialize(lat,long) {

  

  if((lat == "" && long == "" ) || (lat!=0 && long=="")){

    lat = "-7.018801";   

    long = "108.369439";    

  } else if ((lat=="" && long!=0) || (lat==0 && long==0)){

    lat = "-7.018801";   

    long = "108.369439"; 

  }

  

  var propertiPeta = {



    // center:new google.maps.LatLng(-6.895064199999999,108.29113939999999),

    center:new google.maps.LatLng(lat,long),

    zoom:17,

    mapTypeId:google.maps.MapTypeId.roadmap

  };



  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);



  // membuat Marker

  var marker=new google.maps.Marker({

    // position: new google.maps.LatLng(-6.895064199999999,108.29113939999999),

    map: peta,

    position: new google.maps.LatLng(lat,long),
   
    animation: google.maps.Animation.BOUNCE,
    icon : 'assets/images/icon2.png'
    //icon: 'https://img.icons8.com/FF0000/bus'   

  });



}



</script>