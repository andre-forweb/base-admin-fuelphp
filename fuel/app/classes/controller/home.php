<?php
namespace Controller;

class Home extends Base
{
	public function action_index()
	{
		return \Response::forge(\View::forge('home'));
	}
}