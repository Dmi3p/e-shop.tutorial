<html>
    <head>
       <?=$this->getMeta();?>
    </head>
    <body>
        <h1>Layout Default</h1>
        
        <?=$content;?>
        
        <?php
            $logs = RedBeanPHP\R::getDatabaseAdapter()->getDatabase()->getLogger();
            debug($logs->grep('SELECT'));
        ?>
    </body>
</html>


