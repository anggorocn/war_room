<?
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$this->load->model("base-admin/Pengguna");
$this->load->model("base-admin/Page");
$this->load->model("base-admin/Crud");




$pgreturn= str_replace("_add", "", $pg);

$pgtitle= $pgreturn;
$pgtitle= churuf(str_replace("_", " ", str_replace("master_", "", $pgtitle)));

$reqId = $this->input->get("reqId");
$reqLihat = $this->input->get("reqLihat");


$set= new Pengguna();

if($reqId == "")
{
    $reqMode = "insert";
    $reqExpiredDate=date('d-m-Y', strtotime('+1 year'));
}
else
{
    $reqMode = "update";

    $statement = " AND A.PENGGUNA_ID = '".$reqId."' ";
    $set->selectByParams(array(), -1, -1, $statement);
    // echo $set->query;exit;
    $set->firstRow();
    $reqId= $set->getField("PENGGUNA_ID");
    $reqUsername= $set->getField("USERNAME");
    $reqNama= $set->getField("NAMA");
    $reqRoleApprId= $set->getField("ROLE_ID");
    $reqPenggunaEksternalId= $set->getField("PENGGUNA_EXTERNAL_ID");
    $reqPenggunaEksternalNama =$set->getField("PENGGUNA_EKSTERNAL_INFO");
    $reqInternalId= $set->getField("PENGGUNA_INTERNAL_ID");
    $reqInternalNama =$set->getField("PENGGUNA_INTERNAL_INFO");
    $reqTipe =$set->getField("TIPE");
    $reqJabatan =$set->getField("JABATAN");

    $reqHakAkses= getmultiseparator($set->getField("PENGGUNA_HAK_ID_INFO"));
    $reqDistrik= getmultiseparator($set->getField("DISTRIK_ID_INFO"));
    $reqStatusAll= getmultiseparator($set->getField("STATUS_ALL_INFO"));
    $reqHakPage= getmultiseparator($set->getField("PENGGUNA_PAGE_HAK_INFO"));

    $checked="";
    $reqAuto =$set->getField("AUTO_CONNECT");
    if($reqAuto==1)
    {
        $checked="checked";
    }
    // print_r( $reqStatusAll);exit();
}   

$set= new Crud();
$arrHak= [];
$set->selectByParams(array(), -1,-1);
// echo $set->query;exit;
while($set->nextRow())
{
    $arrdata= array();
    $arrdata["id"]= $set->getField("PENGGUNA_HAK_ID");
    $arrdata["text"]= $set->getField("NAMA_HAK");
    array_push($arrHak, $arrdata);
}
unset($set);

$set= new Page();
$arrHakPage= [];
$set->selectByParams(array(), -1,-1);
// echo $set->query;exit;
while($set->nextRow())
{
    $arrdata= array();
    $arrdata["id"]= $set->getField("PENGGUNA_PAGE_HAK_ID");
    $arrdata["text"]= $set->getField("NAMA_HAK");
    array_push($arrHakPage, $arrdata);
}
unset($set);




$disabled="";
$readonly="";


if($reqLihat ==1 )
{
    $disabled="disabled"; 
}

if($reqTipe ==1 ||  $reqTipe ==2)
{
    $readonly="disabled"; 
} 

?>


<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      color: #000000;
    }
    .select2-container--default .select2-search--inline .select2-search__field:focus {
      outline: 0;
      border: 1px solid #ffff;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
      cursor: default;
      padding-left: 6px;
      padding-right: 5px;
    }
</style>

<script src='assets/multifile-master/jquery.form.js' type="text/javascript" language="javascript"></script> 
<script src='assets/multifile-master/jquery.MetaData.js' type="text/javascript" language="javascript"></script> 
<script src='assets/multifile-master/jquery.MultiFile.js' type="text/javascript" language="javascript"></script> 
<link rel="stylesheet" href="css/gaya-multifile.css" type="text/css">

<div class="col-md-12">
    
  <div class="judul-halaman"> <a href="admin/index/<?=$pgreturn?>">Data <?=$pgtitle?></a> &rsaquo; Kelola <?=$pgtitle?></div>

    <div class="konten-area">
        <div class="konten-inner">

            <div>

                <form id="ff" class="easyui-form form-horizontal" method="post" novalidate enctype="multipart/form-data">

                    <div class="page-header">
                        <h3><i class="fa fa-file-text fa-lg"></i> <?=$pgtitle?></h3>       
                    </div>


                  
                                                                             
                    <div class="form-group">  
                        <label class="control-label col-md-2">Username</label>
                        <div class='col-md-8'>
                            <div class='form-group'>
                                <div class='col-md-11'>
                                     <input autocomplete="off" <?=$disabled?>  class="easyui-validatebox textbox form-control" type="text" name="reqUsername"  id="reqUsername" value="<?=$reqUsername?>"  style="width:100%" <?if($reqUsername){echo "readonly";}?> />
                                </div>
                            </div>
                        </div>
                    </div>

                    <?
                    if(empty($reqId))
                    {   
                    ?>
                    <div id="pass">
                        <div class="form-group">  
                            <label class="control-label col-md-2">Password</label>
                            <div class='col-md-8'>
                                <div class='form-group'>
                                    <div class='col-md-11'>
                                       <input autocomplete="off" <?=$disabled?>  class="easyui-validatebox textbox form-control" type="password" name="reqPass"  id="reqPass" value=""  style="width:100%" />
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                    <?

                    }
                    ?>

                    <div class="form-group">  
                        <label class="control-label col-md-2">Nama User</label>
                        <div class='col-md-8'>
                            <div class='form-group'>
                                <div class='col-md-11'>
                                     <input autocomplete="off" <?=$disabled?>  class="easyui-validatebox textbox form-control" type="text" name="reqNama"  id="reqNama"  readonly value="<?=$reqNama?>" style="width:100%" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">  
                        <label class="control-label col-md-2">Hak Akses Menu</label>
                        <div class='col-md-8'>
                            <div class='form-group'>
                                <div class='col-md-11'>
                                <select class="form-control jscaribasicmultiple" id="reqHakAkses" <?=$disabled?> name="reqHakAkses[]" style="width:100%;" multiple="multiple">
                                    <?
                                    foreach($arrHak as $item) 
                                    {
                                        $selectvalid= $item["id"];
                                        $selectvaltext= $item["text"];

                                        $selected="";
                                        if(in_array($selectvalid, $reqHakAkses))
                                        {
                                            $selected="selected";
                                        }
                                        ?>
                                        <option value="<?=$selectvalid?>" <?=$selected?>><?=$selectvaltext?></option>
                                        <?
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">  
                        <label class="control-label col-md-2">Hak Akses Page</label>
                        <div class='col-md-8'>
                            <div class='form-group'>
                                <div class='col-md-11'>
                                <select class="form-control jscaribasicmultiple" id="reqHakPage" <?=$disabled?> name="reqHakPage[]" style="width:100%;" >
                                    <option value="" >Pilih Role Page</option>
                                    <?
                                    foreach($arrHakPage as $item) 
                                    {
                                        $selectvalid= $item["id"];
                                        $selectvaltext= $item["text"];

                                        $selected="";
                                        if(in_array($selectvalid, $reqHakPage))
                                        {
                                            $selected="selected";
                                        }
                                        ?>
                                        <option value="<?=$selectvalid?>" <?=$selected?>><?=$selectvaltext?></option>
                                        <?
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">  
                        <label class="control-label col-md-2">Auto Connect</label>
                        <div class='col-md-3'>
                            <div class='form-group'>
                                <div class='col-md-2'>
                                     <input autocomplete="off" <?=$disabled?>  type="checkbox" name="reqAuto" <?=$checked?> id="reqAuto" style="width: 200%;" value="" style="width:100%" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" name="reqId" value="<?=$reqId?>" />
                    <input type="hidden" name="reqMode" value="<?=$reqMode?>" />

                </form>

            </div>
            <?
            if($reqLihat ==1)
            {}
            else
            {
            ?>
            <div style="text-align:center;padding:5px">
                <a href="javascript:void(0)" class="btn btn-primary" onclick="submitForm()">Submit</a>

            </div>
             <?
            }
            ?>
        </div>
    </div>
</div>

<script>

$('#reqAuto').change(function(){
     if(this.checked){
          $(this).val('1');
     }else{
          $(this).val('');
     }
});


var reqTipe= '<?=$reqTipe?>';
if(reqTipe==1)
{
    $('#internal').show();
    $('#eksternal').hide();
    $('#pass').hide();
    $('#reqPass').val("");
    $('#btninternal').show();
    $("#reqNama").attr("readonly", true); 
    $('#jabatan').show();
    // $('#reqPass').val("");
    $('#reqUsername').prop('readonly', true);
    $('#reqUsername').prop('required', false);
}
else if(reqTipe==2)
{
    $('#eksternal').show();
    $('#internal').hide(); 
    $('#pass').hide(); 
    $('#reqPass').val("");
    $("#reqNama").attr("readonly", true); 
    $('#jabatan').show();
    $('#reqUsername').prop('readonly', false);
}
else
{
    $('#eksternal').hide();
    $('#internal').hide(); 
    $('#pass').show();
    $("#reqNama").attr("readonly", false);
    $('#jabatan').hide();
    $('#reqUsername').prop('readonly', false);

}


$('#reqTipe').on('change', function() {
    var reqTipe= this.value;

    if(reqTipe==1)
    {
        $('#internal').show();
        $('#eksternal').hide();
        $('#reqPenggunaEksternalId').val("");
        $('#reqPenggunaEksternalNama').val("");
        $('#pass').hide();
        $('#reqPass').val("");
        $('#btninternal').show();
        $("#reqNama").attr("readonly", true); 
        $('#jabatan').show();
        $('#reqUsername').prop('readonly', true);
        $('#reqUsername').prop('required', false);

    }
    else if(reqTipe==2)
    {
        $('#eksternal').show();
        $('#internal').hide(); 
        $('#reqInternalId').val("");
        $('#reqInternalNama').val(""); 
        $('#pass').hide();
        $('#reqPass').val("");
        $("#reqNama").attr("readonly", true);
        $('#jabatan').show(); 
        $('#reqUsername').prop('readonly', false);
    }
    else
    {
       $('#eksternal').hide();
       $('#internal').hide(); 
       $('#pass').show();
       $('#btninternal').hide();
       $("#reqNama").attr("readonly", false);
       $('#jabatan').hide(); 
       $('#reqUsername').prop('readonly', false);
    }

    $('#reqJabatan').val("");

});

function submitForm(){
    
    $('#ff').form('submit',{
        url:'json-admin/pengguna_json/add',
        onSubmit:function(){

            if($(this).form('validate'))
            {
                var win = $.messager.progress({
                    title:'<?=$this->configtitle["progres"]?>',
                    msg:'proses data...'
                });
            }

            return $(this).form('enableValidation').form('validate');
        },
        success:function(data){
            $.messager.progress('close');
            // console.log(data);return false;

            data = data.split("***");
            reqId= data[0];
            infoSimpan= data[1];

            if(reqId == 'xxx')
                $.messager.alert('Info', infoSimpan, 'warning');
            else
                $.messager.alertLink('Info', infoSimpan, 'info', "admin/index/<?=$pgreturn?>");
        }
    });
}

function clearForm(){
    $('#ff').form('clear');
}

function openEksternal()
{
    openAdd('admin/index/lookup_user_eksternal');
}

function setEksternal(values)
{
    // console.log(values);
    $('#reqPenggunaEksternalId').val(values.PENGGUNA_EXTERNAL_ID);
    $('#reqPenggunaEksternalNama').val(values.NAMA);
    $('#reqNama').val(values.NAMA);
    $('#reqJabatan').val(values.JABATAN_INFO);
  

}

function openInternal()
{
    openAdd('admin/index/lookup_user_internal');
}

function setInternal(values)
{
    // console.log(values);
    $('#reqUsername').val(values.NID);
    $('#reqInternalId').val(values.PENGGUNA_INTERNAL_ID);
    $('#reqInternalNama').val(values.NAMA_LENGKAP);
    $('#reqNama').val(values.NAMA_LENGKAP);
    $('#reqJabatan').val(values.NAMA_POSISI);   
}


var reqId= '<?=$reqId?>';
var reqDistrikId= '<?=$reqDistrik[0]?>';
var arrDistrikCheck = $('#reqDistrik').val(); 
var discheck="";
if(jQuery.inArray("0", arrDistrikCheck) != -1) {
    discheck=1;
} 

// console.log(reqDistrik);

if(reqId !== '')
{
    if(reqDistrikId !== '')
    {
        var validasipengukuran= <?php echo json_encode($arrdistrik); ?>;
        validasipengukuran.forEach(function(e) {
            // console.log(discheck);
            if(discheck==1)
            {
                $("#reqDistrik>option[value='"+e.id+"']").attr('disabled','disabled');
            }
            else
            {
                if (e.id != '0' ) 
                { 
                   $("#reqDistrik>option[value='"+e.id+"']").removeAttr('disabled');
                   $("#reqDistrik>option[value='0']").attr('disabled','disabled');   
                }
                else
                {
                    $("#reqDistrik>option[value='"+e.id+"']").attr('disabled','disabled');
                }           
            }            
             
        });
    }
}

var tipe = $("#reqDistrik");
tipe.on("select2:select", function(event) {

    var selected=$(this).val();
    var values = [];

    $(event.currentTarget).find("option:selected").each(function(i, selected)
    { 
       values[i] = selected.value;
    });

    jQuery.each(values, function(index, value) {
        var selected=value;
        $("#reqDistrik option").each(function()
        {
            console.log(selected);
            if(selected==0)
            {
               if ($(this).val() != '0' ) 
               { 

                $("#reqDistrik>option[value='"+$(this).val()+"']").attr('disabled','disabled');
               }
            }
            else
            {

                if ($(this).val() != '0' ) 
                { 
                     $("#reqDistrik>option[value='"+$(this).val()+"']").removeAttr('disabled');   

                }
                else
                {
                    $("#reqDistrik>option[value='"+$(this).val()+"']").attr('disabled','disabled');
                }
               
            }  
        });
    });

});

   $('#reqDistrik').on("select2:unselecting", function(event){
       var value = event.params.args.data.id;
       var keterangan = event.params.args.data.text;

       var values = [];

       $(event.currentTarget).find("option:selected").each(function(i, selected)
       { 
         values[i] = selected.value;
       });

       var selectedlength=values.length;

       if(selectedlength==1)
       {
            $("#reqDistrik>option[value='0']").removeAttr('disabled');
       }

       jQuery.each(values, function(index, value) {
        var selected=value;
            $("#reqDistrik option").each(function()
            {
                if(selected==0)
                {
                    if ($(this).val() != '0' ) 
                    { 
                        $("#reqDistrik>option[value='"+$(this).val()+"']").removeAttr('disabled'); 
                    }
                }
            });
        });
    }).trigger('change');


</script>