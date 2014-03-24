<?php

namespace Fuel\Migrations;

class Create_cadastros
{
	public function up()
	{
		\DBUtil::create_table('cadastros', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'nome' => array('constraint' => 128, 'type' => 'varchar'),
			'email' => array('constraint' => 128, 'type' => 'varchar'),
			'tel' => array('constraint' => 14, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('cadastros');
	}
}