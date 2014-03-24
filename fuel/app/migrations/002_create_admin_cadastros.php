<?php

namespace Fuel\Migrations;

class Create_admin_cadastros
{
	public function up()
	{
		\DBUtil::create_table('admin_cadastros', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'abstract' => array('type' => 'text'),
			'full_text' => array('type' => 'text'),
			'project_id' => array('constraint' => 11, 'type' => 'int'),
			'is_draft' => array('constraint' => 11, 'type' => 'int'),
			'order' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('admin_cadastros');
	}
}