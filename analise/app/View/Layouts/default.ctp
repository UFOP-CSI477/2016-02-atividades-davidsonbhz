<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
	<?php echo $this->Html->charset(); ?>
        <title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
        </title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
                echo $this->Html->css('bootstrap');
		echo $this->Html->script('bootstrap');
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>
                    <?php
                    $tipo = $this->Session->read('CTipo');
                    if($this->Session->read('Usuario')!=null) {
                        echo $this->Html->link('Inicio', array('controller'=>'pages', 'action'=>'home'));
                    }
                    
                    ?>
                </h1>
            </div>
            <div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">

                <p style="align-items: center">
                    by Davidson
                </p>
            </div>
        </div>
	
    </body>
</html>
