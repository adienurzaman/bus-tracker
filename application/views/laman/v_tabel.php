<style type="text/css">
.map-responsive{
    overflow:hidden;
    padding-bottom:50%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:50%;
    width:50%;
    position:absolute;
}
.map-icon-label .map-icon {
   font-size: 12px;
   color: #FFFFFF;
   text-align: center;
   white-space: nowrap;
  }
</style>
<!-- start: page -->
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
	
					<h2 class="panel-title">Data Koordinat Mobil Bus</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="datatable-default" class="table table-bordered table-striped mb-none">
							<thead>
								<tr>
									<th>#</th>
									<th>Latitude</th>
									<th>Longitude</th>
									<th>Keterangan Waktu</th>
									<th>Tampil Riwayat</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach ($sensor->result() as $data) {?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $data->latitude; ?></td>
									<td><?php echo $data->longitude; ?></td>
									<td><?php echo $data->ket_waktu; ?></td>
									<?php 
										$waktu = date_create($data->ket_waktu);

										$tahun = date_format($waktu,'Y');
										$bulan = date_format($waktu,'m');
										$tanggal = date_format($waktu,'d');
										$j = date_format($waktu,'H');
										$m = date_format($waktu,'i');
										$d = date_format($waktu,'s');
									?>
									<td><button class="btn btn-md btn-primary" onclick="tampilModal(<?php echo $data->latitude.",".$data->longitude.",".$tahun.",".$bulan.",".$tanggal.",".$j.",".$m.",".$d; ?>);">Tampil Maps</button></td>
								</tr>
								<?php
								} 
								?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
	
<div class="modal fade" id="modal_maps" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Tampil maps</h4>
      </div>
      <div class="modal-body">
      	<p>Latitude : <strong id="latitude"></strong></p>
      	<p>Longitude : <strong id="longitude"></strong></p>
      	<p>Waktu : <strong id="waktu"></strong></p>
        <div class="map-responsive" id="googleMap" width="300" height="250" frameborder="0" style="border:0">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- end: page -->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOVfpPuuh3VHFvtoas3ZuNTt2Kp9KIkTU&callback=initialize"
  type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="map-icons-master/dist/css/map-icons.css">
 <script type="text/javascript" src="map-icons-master/dist/js/map-icons.js"></script>

<script type="text/javascript">


function initialize(lat,long) {
    
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
    // icon: {
    //  path: mapIcons.shapes.MAP_PIN,
    //  fillColor: '#ba0000',
    //  fillOpacity: 1,
    //  strokeColor: '',
    //  strokeWeight: 0,
    //  scale: 0.8
    // },
    // map_icon_label: = '<span class="map-icon map-icon-museum"></span>'
    animation: google.maps.Animation.BOUNCE,
    icon : 'assets/images/icon2.png'
    
    //icon: 'https://img.icons8.com/FF0000/bus'   
  });

}

function tampilModal(lat,long,thn,bln,tgl,j,m,d)  {
	// alert("OK");
	var w = thn +'-'+ bln +'-'+ tgl + ' ' + j + ':' + m + ':' + d;
	$("#modal_maps").modal("show");
	$("#latitude").html(lat);
	$("#longitude").html(long);
	$("#waktu").text(w);
	initialize(lat,long);
}
</script>