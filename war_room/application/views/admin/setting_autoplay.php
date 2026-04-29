<?
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$this->load->model("base-admin/Crud");

$pgreturn= str_replace("_add", "", $pg);

$pgtitle= $pgreturn;
$pgtitle= churuf(str_replace("_", " ", str_replace("setting_", "", $pgtitle)));

$set= new Crud();
$set->selectByParamsDurasi(array(), -1, -1, $statement);
// echo $set->query;exit;
$set->firstRow();
$reqDurasi= $set->getField("durasi_autoplay");

?>

<script src='assets/multifile-master/jquery.form.js' type="text/javascript" language="javascript"></script> 
<script src='assets/multifile-master/jquery.MetaData.js' type="text/javascript" language="javascript"></script> 
<script src='assets/multifile-master/jquery.MultiFile.js' type="text/javascript" language="javascript"></script> 
<link rel="stylesheet" href="css/gaya-multifile.css" type="text/css">

<style type="text/css">
    .tdcenter{
        text-align: center;
        border: 1px solid black !important;
        vertical-align: top;;
    }

    .tdleft{
        border: 1px solid black !important;
        vertical-align: top;;
    }

    /*table { border-collapse: collapse; width: 100%; }
    th, td { background: #fff; padding: 8px 16px; }

    .tableFixHead {
        overflow: auto;
        height: 100vh;
    }

    .tableFixHead thead th {
        position: sticky;
        top: 0;
    }*/

    .table-sticky>thead>tr>th,
    .table-sticky>thead>tr>td {
        background: #009688;
        color: #fff;
        /*top: 0px;
        position: sticky;*/
    }
    .table-sticky>thead {
        top: -10px;
        position: sticky;   
    }
    .table-height {
        height: 100vh;
        display: block;
        overflow: scroll;
        width: 100%;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td {
        border: 1px solid #ddd;
    }
</style>

<div class="col-md-12">
    
  <div class="judul-halaman">Kelola <?=$pgtitle?></div>

    <div class="konten-area">
        <div class="konten-inner">

            <div>

                <form id="ff" class="easyui-form form-horizontal" method="post" novalidate enctype="multipart/form-data">

                    <div class="page-header">
                        <h3><i class="fa fa-file-text fa-lg"></i> <?=$pgtitle?></h3>       
                    </div>
                                                                             
                    <div class="form-group">  
                        <label class="control-label col-md-2">Durasi</label>
                        <div class='col-md-8'>
                            <div class='form-group'>
                                <div class='col-md-11'>
                                     <input autocomplete="off" class="easyui-validatebox textbox form-control" type="text" name="reqDurasi" id="reqDurasi" value="<?=$reqDurasi?>" data-options="required:true" style="width:100%" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="reqId" value="<?=$reqId?>" />
                    <input type="hidden" name="reqMode" value="<?=$reqMode?>" />
                    <center><a href="javascript:void(0)" class="btn btn-primary" onclick="submitForm()">Submit</a></center>

                </form>
            </div>
            
        </div>

        <div class="konten-inner">
            
        </div>
    </div>
    
</div>

<script>
function submitForm(){
    
    $('#ff').form('submit',{
        url:'json-app/crud_json/addDurasi',
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
                $.messager.alertLink('Info', infoSimpan, 'info', "admin/index/setting_autoplay");
        }
    });
}

function clearForm(){
    $('#ff').form('clear');
}   
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('[id^="reqRadioHeadCheck"]').click(function() {
            var tempId= $(this).attr('id');
            infochecked= $(this).prop('checked');

            arrTempId= String(tempId);
            arrTempId= arrTempId.split('-');
            reqCheckHeadGrup= arrTempId[1];
            // console.log(reqCheckHeadGrup);
            
            $('[id^="reqRadioCheck"]').each(function(){

                var tempId= $(this).attr('id');

                arrTempId= String(tempId);
                arrTempId= arrTempId.split('-');
                // console.log(arrTempId);

                reqCheckGrup= arrTempId[1];
                reqCheckKode= arrTempId[2];
                reqCheckDetil= arrTempId[3];

                if(typeof reqCheckDetil == "undefined")
                    reqCheckDetil= "";

                // console.log(reqCheckGrup+"-"+reqCheckKode+"-"+reqCheckDetil);

                if(reqCheckDetil == reqCheckHeadGrup)
                {
                    if(infochecked == true)
                    {
                        $(this).attr('checked', true);
                        $(this).prop('checked', true);
                    }
                    else
                    {
                        $(this).attr('checked', false);
                        $(this).prop('checked', false); 
                    }
                }

           });

        });

        $('[id^="reqRadioCheck"]').click(function() {
            var tempId= $(this).attr('id');
            infochecked= $(this).prop('checked');

            arrTempId= String(tempId);
            arrTempId= arrTempId.split('-');
            // console.log(arrTempId);

            reqCheckGrup= arrTempId[1];
            reqCheckKode= arrTempId[2];
            reqCheckDetil= arrTempId[3];

            if(typeof reqCheckDetil == "undefined")
                reqCheckDetil= "";

            // reqCheckKodePanjang= reqCheckKode.length;
            // +"-"+reqCheckKodePanjang
            // console.log(reqCheckGrup+"-"+reqCheckKode+"-"+reqCheckDetil);

            if(reqCheckDetil == "")
            {
                if(infochecked == true)
                {
                    $('[id^="reqRadioCheck-'+reqCheckGrup+'-'+reqCheckKode+'"]').attr('checked', true);
                    $('[id^="reqRadioCheck-'+reqCheckGrup+'-'+reqCheckKode+'"]').prop('checked', true);
                }
                else
                {
                    $('[id^="reqRadioCheck-'+reqCheckGrup+'-'+reqCheckKode+'"]').attr('checked', false);
                    $('[id^="reqRadioCheck-'+reqCheckGrup+'-'+reqCheckKode+'"]').prop('checked', false);
                }
            }

         });
    });
</script>