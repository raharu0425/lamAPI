<?php echo $this->element('topmenu'); ?>

<!-- パンくずリスト -->
<?php
foreach($crumbs as $name => $path){
    $this->Html->addCrumb($name, $path);
}
?>
<?php echo $this->element('breadcrumbs'); ?>

<?php
    if(!empty($messages)){
        if(!empty($messages['error'])){
            foreach($messages['error'] as $message){
                echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
            }
        }

        if(!empty($messages['success'])){
            foreach($messages['success'] as $message){
                echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
            }
        }
    }
?>

<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            STEP1:CSVファイルアップロード
        </div>
        <div class="panel-body">
            <form action='' method='post' enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" id="InputFile" name='upload_do' value='1'>
                    <input type="file" id="InputFile" name='upfile'>
                    <input type="submit" value='アップロード'>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            STEP2:差分チェック
        </div>
        <div class="panel-body">
            <?php
                if($last_update_time){
                    echo '最終更新日時' . $last_update_time;
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='diff_do' value='1'>";
                    echo "<input type='submit' value='差分チェック'>";
                    echo "</form>";
                }else{
                    echo 'ファイルをアップロードしてください';
                }
            ?>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            STEP3:差分チェック
        </div>
        <div class="panel-body">
            <?php
                if($enbale_import){
                    echo '下記内容でインポートしますか？';

                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='import_do' value='1'>";
                    echo "<input type='submit' value='インポートする'>";
                    echo "</form>";
                }else{
                    echo '差分チェックが終わっていません';
                }
            ?>
        </div>
    </div>
</div>

<table class='table table-striped table-bordered table-hover'>
    <?php

        if(isset($fields)){
            foreach($fields as $colum => $field){
                echo '<th>' . $colum . '</th>';
            }
        }

        if(isset($display_rows['create'])){
            echo $this->element('importer_table', ['rows' => $display_rows['create'], 'model_name' => $model_name, 'color' => 'success']);
        }

        if(isset($display_rows['edit'])){
            echo $this->element('importer_table', ['rows' => $display_rows['edit'], 'model_name' => $model_name, 'color' => 'info']);
        }

        if(isset($display_rows['delete'])){
            echo $this->element('importer_table', ['rows' => $display_rows['delete'], 'model_name' => $model_name, 'color' => 'denger']);
        }

        if(isset($display_rows['default'])){
            echo $this->element('importer_table', ['rows' => $display_rows['default'], 'model_name' => $model_name, 'color' => '']);
        }
    ?>
</table>
