<?
include_once("functions/string.func.php");
include_once("functions/date.func.php");

$this->load->model("base-admin/Crud");
$this->load->model('base-api/DataCombo');
$arrdatabkn= [];
$arrparam= ["vurl"=>"Kinerja_proyek"];
$set= new DataCombo();
$set->selectdata($arrparam, "", "allrow");
$set= $set->rowResult;
// print_r($set);exit;
$data=$set['data'];
$arrdata[]=array();
for($i=0;$i<count($data);$i++){
    $arrdata[$i]['id']=$data[$i]['id'];
    $arrdata[$i]['nama']=$data[$i]['project_name'];
}
// print_r($arrdata);exit;

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
    <div class="judul-halaman">Kelola Highlight Proyek</div>
    <div class="konten-area">
        <div class="konten-inner">
                <form id="ff" class="easyui-form form-horizontal" method="post" novalidate enctype="multipart/form-data">
                    <div class="page-header">
                        <h3><i class="fa fa-file-text fa-lg"></i>Pilihan Proyek</h3>       
                    </div>                                                                            
                    <div class="box-body table-height">
                        <table class="table table-hover table-sticky">
                            <thead>
                                <tr>
                                    <th class="tdcenter" >Pilihan <a href="javascript:void(0)" class="btn btn-primary" onclick="tambah()">+</a></th>
                                    <th class="tdcenter" >Urutan</th>
                                    <th class="tdcenter" >Hapus</th>
                                </tr>
                            </thead>
                            <tbody id='body'>
                                <?
                                $set= new Crud();
                                $set->selectByParamsPilihanKinerja(array(), -1, -1, $statement);
                                while ($set->nextRow()) {
                                    $arrsaveid=$set->getField("Kinerja_id");
                                    $arrsaveUrutan=$set->getField("Urutan");
                                    ?>
                                    <tr>
                                        <td class="tdcenter" >
                                            <select class="easyui-validatebox textbox form-control" style="width:100%" name="id_kinerja[]">`;
                                                <?for($i=0;$i<count($data);$i++){
                                                    $arrid=$arrdata[$i]['id'];
                                                    $arrnama=$arrdata[$i]['nama'];
                                                    ?>
                                                    <option value="<?=$arrid?>" <?if($arrid==$arrsaveid){echo 'selected';}?>><?=$arrnama?></option>
                                                <?}?>
                                            </select>
                                        </td>
                                        <td class="tdcenter" >
                                            <input class="easyui-validatebox textbox form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" style="width:100%" name="urutan_kinerja[]" value='<?=$arrsaveUrutan?>'/>
                                        </td>
                                        <td class="tdcenter" >
                                            <a class="btn btn-danger" onclick="hapusId(<?=$arrsaveid?>)"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                <?
                                }
                                ?>
                            </tbody>
                        </table>
                        <input type="hidden" name="reqId" value="<?=$reqId?>" />
                        <input type="hidden" name="reqMode" value="<?=$reqMode?>" />
                        <center><a href="javascript:void(0)" class="btn btn-primary" onclick="submitForm()">Submit</a></center>
                    </div>
                </form>
            </div>     
        </div>
    </div>    
</div>

<script>
function submitForm(){
    
    $('#ff').form('submit',{
        url:'json-app/crud_json/addPilihanKinerja',
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

            if(reqId == 'xxx'){
                $.messager.alert('Info', infoSimpan, 'warning');
            }
            else{
                $.messager.alertLink('Info', infoSimpan, 'info', "admin/index/pilihan_kinerja");
            }
        }
    });
}

function tambah(argument) {
    popup=`<tr>
        <td class="tdcenter" >
            <select class="easyui-validatebox textbox form-control" style="width:100%" name="id_kinerja[]">
                <option  selected disable >Pilih data</option>;
            `;
                <?for($i=0;$i<count($data);$i++){?>
                    popup=popup+
                    `<option value='<?=$arrdata[$i]['id']?>'><?=$arrdata[$i]['nama']?></option>`;
                <?}?>

    popup=popup+
            `</select>
        </td>
         <td class="tdcenter" >
            <input class="easyui-validatebox textbox form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" style="width:100%" name="urutan_kinerja[]"/>
        </td>
        <td class="tdcenter" >
            <a class="btn btn-danger remove"><i class="fa fa-times" aria-hidden="true"></i></a>
        </td>
    </tr>`;


    $("#body").append(popup);
}

function hapusId(id){
    $.messager.confirm('Konfirmasi',"Hapus data terpilih?",function(r){
        if (r){
            $.getJSON("json-app/crud_json/deletePilihanKinerja/?reqId="+id,
                function(data){
                    $.messager.alert('Info', data.PESAN, 'info');
                    valinfoid= "";
                    $.messager.alertLink('Info', 'data sudah dihapus', 'info', "admin/index/pilihan_kinerja");
                });

        }
    }); 
};

$(document).ready(function(){
    $(document).on('click','.remove',function(){
        $(this).parents('tr').remove();
    });
});
</script>