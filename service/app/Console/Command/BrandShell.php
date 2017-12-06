<?php
App::uses('Shell', 'Console');
class BrandShell extends Shell {

	public $uses = array('Product', 'Brand');

	public function main() {
              echo "I am here";
		}

}
 