<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
$reqNama = $this->input->get("reqNama");
?>
<!-- SLICK -->
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
<style type="text/css">
  .slider {
      width: 100%;
      margin: 0px auto;
  }

  .slick-slide {
    margin: 0px 5px;
  }

  .slick-slide img {
    width: 100%;
  }

  .slick-prev:before,
  .slick-next:before {
    color: black;
  }


  .slick-slide {
    transition: all ease-in-out .3s;
    opacity: .2;
  }
  
  .slick-active {
    opacity: .5;
  }

  .slick-current {
    opacity: 1;
  }
</style>

<!-- SKILLSET -->
<link rel="stylesheet" href="lib/skillset/skillset.css" type="text/css" />
<script>
jQuery(document).ready(function(){
  jQuery('.skillbar').each(function(){
    jQuery(this).find('.skillbar-bar').animate({
      width:jQuery(this).attr('data-percent')
    },6000);
  });
});
</script>

<!-- DATATABLE -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<!-- <script type="text/javascript" src="lib/datatables-1.10.19/jquery.dataTables.js"></script> -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $('#example').dataTable( {
  "scrollY": "200px",
  "scrollCollapse": true,
  "paging": false
} );


  new DataTable('#example', {
    paging: false,
    scrollCollapse: true,
    scrollY: '200px'
});
new DataTable('#example', {
    paging: false,
    scrollCollapse: true,
    scrollY: '50vh'
});
</script> -->

<style type="text/css">
.dataTables_wrapper.no-footer {
  margin-top: 0px !important;
}
.dataTables_scrollBody {
  max-height: calc(100vh - 400px) !important;
}
.area-wrapper-sub {
  height: calc(100vh - 170px);
}
.status-issue {
  position: absolute;
  right: 260px;
  top: 53px;
  color: #333;
}
body.dark .status-issue {
  color: #FFF;
}
.area-tabel .header select {
  background-color: transparent;
  border: 1px solid rgba(0,0,0,0.2);
  border-radius: 4px;
  padding: 1px 10px;
}
body.dark .area-tabel .header select {
  border: 1px solid rgba(255,255,255,0.2);
}


</style>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                      <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                      <li><a href="app/index/monitoring_proyek_akuisisi">Monitoring Proyek Akuisisi</a></li>
                      <li>Monitoring Proyek Akuisisi Detil</li>
                    </ul> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="area-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> PROJECT : <?=$reqNama?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="area-wrapper-sub">
                          <ul class="nav nav-tabs">
                              <li class="active">
                                <a href="#tab1" data-toggle="tab">
                                  <img src="images/icon-activity.png"> Activity Stage Overall Monitoring 
                                  <span class="keterangan">Project Prospectus : <span id="prospectus_asesment_header"></span></span>
                                </a>
                              </li>
                              <li>
                                <a href="#tab2" data-toggle="tab">
                                  <img src="images/icon-monitoring.png"> Strategic Issue Monitoring
                                </a>
                              </li>
                          </ul>
                          <div class="tab-content">

                              <!-- First Pane -->
                              <div class="tab-pane fade in active" id="tab1">
                                <div class="area-activity-stage">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="item">
                                        <div class="caption">INITIATION</div>
                                        <div class="inner">
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="title">Initial Information</div>
                                              <div class="nilai" id="initial_information"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">NDA</div>
                                              <div class="nilai" id="nda"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Meeting</div>
                                              <div class="nilai" id="meeting"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Collecting Data</div>
                                              <div class="nilai" id="collecting_data"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Site Visit</div>
                                              <div class="nilai" id="site_visit"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Prospectus Assesment</div>
                                              <div class="nilai" id="prospectus_asesment"></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="item development">
                                        <div class="caption">DEVELOPMENT</div>
                                        <div class="inner">
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="title">FS & Due Diligence</div>
                                              <div class="nilai" id="fs_due_diligence"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Proposal Acquisition</div>
                                              <div class="nilai" id="proposal_acquisition"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Valuasi Aset</div>
                                              <div class="nilai" id="valuasi_aset"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Negotiation</div>
                                              <div class="nilai" id="negotiation"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Internal FS Approval</div>
                                              <div class="nilai" id="internal_fs_approval"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Term and Conditional Agreement</div>
                                              <div class="nilai" id="term_conditional_agreement"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Initial KKP to PLN</div>
                                              <div class="nilai" id="initial_kkp_to_pln"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Alignment AP Contribution</div>
                                              <div class="nilai" id="alignment_ap_contribution"></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="item closing-transaction">
                                        <div class="caption">CLOSING TRANSACTION</div>
                                        <div class="inner">
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="title">Internal Preparation</div>
                                              <div class="nilai" id="internal_preparation"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">CSPA & SHA</div>
                                              <div class="nilai" id="cspa_sha"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">KKP Final Approval</div>
                                              <div class="nilai" id="kkp_final_approval"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Technical Trantiton</div>
                                              <div class="nilai" id="technical_trantiton"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Shraholder Approval</div>
                                              <div class="nilai" id="shraholder_approval"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Conditional Final Assesment</div>
                                              <div class="nilai" id="conditional_final_asesment"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Other Key Stakeholder Approval</div>
                                              <div class="nilai" id="other_key_stakeholder_approval"></div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="title">Closing Transaction</div>
                                              <div class="nilai" id="closing_transaction"></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Second Pane -->
                              <div class="tab-pane fade" id="tab2">
                                  <div class="row">
                                      <div class="col-md-6">
                                        <div class="area-tabel">
                                          <div class="header">
                                            <h3>STRATEGIC ISSUE</h3>
                                            <label class="pull-right status-issue">
                                              Status
                                              <select id="reqStrIssue">
                                                <option value="" style="color:black">All</option>
                                                <option value="Open"  style="color:black">Open</option>
                                                <option value="Done"  style="color:black">Done</option>
                                              </select>
                                            </label>
                                            <div class="clearfix"></div>
                                          </div>
                                          <table id="bdd-table" class="table table-bordered" width="100%">
                                            <thead>
                                              <tr>
                                                <th class="headerHor">No      </th>
                                                <th class="headerHor">Activity      </th>
                                                <th class="headerHor">Strategic Issue     </th>
                                                <th class="headerHor">Action Plan Needed    </th>
                                                <th class="headerHor">Due Date    </th>
                                                <th class="headerHor">Status St Issue</th>
                                              </tr>
                                            </thead>
                                            <tbody id='table1'>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="area-tabel">
                                          <div class="header">
                                            <h3>Partner RelatED Issue</h3>
                                            <label class="pull-right status-issue">
                                              Status
                                              <select id="reqPtrIssue">
                                                <option value="" style="color:black">All</option>
                                                <option value="Open"  style="color:black">Open</option>
                                                <option value="Done"  style="color:black">Done</option>
                                              </select>
                                            </label>
                                            <div class="clearfix"></div>
                                          </div>
                                          <table id="bdg-table" class="table table-bordered" width="100%">
                                            <thead>
                                              <tr>
                                                <th class="headerHor">No</th>
                                                <th class="headerHor">Partner Relation Issue      </th>
                                                <th class="headerHor">Action Plan Needed      </th>
                                                <th class="headerHor">Due Date      </th>
                                                <th class="headerHor">Status P Issue</th>
                                              </tr>
                                            </thead>
                                            <tbody id='table2'>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div><!-- tab content -->
                        </div>
                      </div>
                    </div>

                    <div class="area-sumber-data detil">
                          <label>Sumber data : <span>CRP</span></label>
                          <label>Last update : <span id='LastUpdate'></span></label>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- HIGHXHARTS INSIDE TAB -->
<!-- Highcharts -->
<script type="text/javascript" src="lib/highcharts/highcharts.js"></script>
<script>

    jQuery(document).ready(function () {
    	var reqPtrIssue=reqStrIssue="";
    	loadData(reqStrIssue,reqPtrIssue);

	    $('#reqStrIssue').on('change', function() {
	    	var reqPtrIssue = $('#reqPtrIssue').val();
	    	var reqStrIssue = $('#reqStrIssue').val();
	    	
	    	loadData(this.value,reqPtrIssue);
	    	$('#bdd-table').DataTable().clear().destroy();
	    	$('#bdg-table').DataTable().clear().destroy();
	    });

	    $('#reqPtrIssue').on('change', function() {

	    	var reqPtrIssue = $('#reqPtrIssue').val();
	    	var reqStrIssue = $('#reqStrIssue').val();
	    	
	    	loadData(reqStrIssue,this.value);
	    	$('#bdd-table').DataTable().clear().destroy();
	    	$('#bdg-table').DataTable().clear().destroy();

	    });

    });

    function loadData(reqStrIssue,reqPtrIssue){
      $.ajax({
        url : 'json-api/MaStatusAkuisisiDetil_json/home?reqNama=<?=$reqNama?>&reqStrIssue='+reqStrIssue+'&reqPtrIssue='+reqPtrIssue,
        type : 'GET',
        dataType : 'text', 
        beforeSend: function () {
            $('#vlsxloading').show();
        }
        ,
        success : function(text) {
          $('#vlsxloading').hide();
          text= JSON.parse(text);
            
          $('#LastUpdate').html(text['LastUpdate']);

          // header
          $('#prospectus_asesment_header').html(text['prospectus_asesment']);

          // initiation section
          $('#initial_information').html(text['initial_information']);
          $('#nda').html(text['nda']);
          $('#meeting').html(text['meeting']);
          $('#collecting_data').html(text['collecting_data']);
          $('#site_visit').html(text['site_visit']);
          $('#prospectus_asesment').html(text['prospectus_asesment']);

          // DEVELOPMENT section
          $('#fs_due_diligence').html(text['fs_due_diligence']);
          $('#proposal_acquisition').html(text['proposal_acquisition']);
          $('#valuasi_aset').html(text['valuasi_aset']);
          $('#negotiation').html(text['negotiation']);
          $('#internal_fs_approval').html(text['internal_fs_approval']);
          $('#term_conditional_agreement').html(text['term_conditional_agreement']);
          $('#initial_kkp_to_pln').html(text['initial_kkp_to_pln']);
          $('#alignment_ap_contribution').html(text['alignment_ap_contribution']);

          // CLOSING section
          $('#internal_preparation').html(text['internal_preparation']);
          $('#cspa_sha').html(text['cspa_sha']);
          $('#kkp_final_approval').html(text['kkp_final_approval']);
          $('#technical_trantiton').html(text['technical_trantiton']);
          $('#shraholder_approval').html(text['shraholder_approval']);
          $('#conditional_final_asesment').html(text['conditional_final_asesment']);
          $('#other_key_stakeholder_approval').html(text['other_key_stakeholder_approval']);
          $('#closing_transaction').html(text['closing_transaction']);

          $('#table1').html(text['table1']);
          $('#table2').html(text['table2']);

          $('#bdd-table').DataTable({
            paging: false,
            scrollCollapse: true,
            scrollY: 'calc(100vh - 315px)'
          });

          $('#bdg-table').DataTable({
            paging: false,
            scrollCollapse: true,
            scrollY: 'calc(100vh - 315px)'
          });

          if(reqStrIssue ||  reqPtrIssue)
          {
          	$('#bdd-table').DataTable().order([0, 'desc']).draw();
          	$('#bdg-table').DataTable().order([0, 'desc']).draw();
          }

          // fix dimensions of chart that was in a hidden element
          jQuery(document).on( 'shown.bs.tab', 'a[data-toggle="tab"]', function (e) { // on tab selection event
            // console.log(e.target.hash)
            if (e.target.hash == '#tab2') {
              // alert("tab2");
              $('#bdd-table').DataTable().order([0, 'desc']).draw();
              $('#bdg-table').DataTable().order([0, 'desc']).draw();
            }
              jQuery( ".contains-chart" ).each(function() { // target each element with the .contains-chart class
                  var chart = jQuery(this).highcharts(); // target the chart itself
                  chart.reflow() // reflow that chart
              });
          })
        }
      });
    }

</script>
