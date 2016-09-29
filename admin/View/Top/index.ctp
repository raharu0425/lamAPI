<?php echo $this->element('topmenu'); ?>
<?php echo $this->element('breadcrumbs'); ?>


<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <!-- コンテンツ -->
        <div class="col-sm-12">
            <ul>
                <?php
                    foreach($masters as $master){
                        echo '<li>';
                        echo $this->Html->link($master['name'], array('controller' => $master['controller'], 'action' => $master['action']));
                        echo '</li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
