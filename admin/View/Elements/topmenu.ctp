<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link( 'リリックオートマトン管理画面',array('controller' => 'admin'), array('class' => 'navbar-brand')); ?>
        </div>
        <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <?php echo $this->Html->link( 'マスター管理',array('controller' => 'admin')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link( 'メンテナンス管理',array('controller' => 'maintenance')); ?>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
