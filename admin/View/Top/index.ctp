<?php echo $this->element('topmenu'); ?>
<?php echo $this->element('breadcrumbs'); ?>


<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <!-- コンテンツ -->
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    マスター管理
                </div>
                <div class="panel-body">
                    <div class='list-group'>
                    <?php
                        foreach($masters as $master){
                            echo $this->Html->link($master['name'], array('controller' => $master['controller'], 'action' => $master['action']), array('class' => 'list-group-item'));
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
