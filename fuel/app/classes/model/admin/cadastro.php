<?php
class Model_Admin_Cadastro extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'abstract',
		'full_text',
		'project_id',
		'is_draft',
		'order',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('abstract', 'Abstract', 'required');
		$val->add_field('full_text', 'Full Text', 'required');
		$val->add_field('project_id', 'Project Id', 'required|valid_string[numeric]');
		$val->add_field('is_draft', 'Is Draft', 'required|valid_string[numeric]');
		$val->add_field('order', 'Order', 'required|valid_string[numeric]');

		return $val;
	}

}
