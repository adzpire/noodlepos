<?php
/**
 * Created by PhpStorm.
 * User: cmmsNetAdmin
 * Date: 8/1/2559
 * Time: 20:10
 */
use yii\helpers\Url;
$test = Url::remember(Url::current());
//echo $test;
?>
<style>
    legend{
        margin-bottom: 5px;
        font-size: 16px;
    }
</style>
<div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><u>application version 1.0.1 <- 1.0.0</u></strong> <a id="blink" data-original-title="ปิดการแจ้งเตือน 30 วัน" data-toggle="tooltip" href="<?php echo Url::toRoute('/itinfo/default/setvercookies'); //echo Yii::$app()->baseUrl.'/cmmslib/default/setvercookies' ?>" class="alert-link text-danger glyphicon glyphicon-off"></a>
    <fieldset>
        <legend>version 1.0.1</legend>
        <ul>
            <li>แก้ไขชื่อระบบ</li>
        </ul>
    </fieldset>
</div>
<script>
    function blinker() {  $('#blink').fadeOut(500).fadeIn(500); }
    setInterval(blinker, 1000);
</script>