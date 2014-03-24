<?php
namespace Controller;

class Admin_Cadastro extends Admin_Base
{
	public function action_index()
	{
		$data['admin_cadastros'] = Model_Admin_Cadastro::find('all');
		$this->template->title = "Admin_cadastros";
		$this->template->content = View::forge('admin/admin/cadastro/index', $data);

	}

	public function action_view($id = null)
	{
		$data['admin_cadastro'] = Model_Admin_Cadastro::find($id);

		$this->template->title = "Admin_cadastro";
		$this->template->content = View::forge('admin/admin/cadastro/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Admin_Cadastro::validate('create');

			if ($val->run())
			{
				$admin_cadastro = Model_Admin_Cadastro::forge(array(
					'title' => Input::post('title'),
					'abstract' => Input::post('abstract'),
					'full_text' => Input::post('full_text'),
					'project_id' => Input::post('project_id'),
					'is_draft' => Input::post('is_draft'),
					'order' => Input::post('order'),
				));

				if ($admin_cadastro and $admin_cadastro->save())
				{
					Session::set_flash('success', e('Added admin_cadastro #'.$admin_cadastro->id.'.'));

					Response::redirect('admin/admin/cadastro');
				}

				else
				{
					Session::set_flash('error', e('Could not save admin_cadastro.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Admin_Cadastros";
		$this->template->content = View::forge('admin/admin/cadastro/create');

	}

	public function action_edit($id = null)
	{
		$admin_cadastro = Model_Admin_Cadastro::find($id);
		$val = Model_Admin_Cadastro::validate('edit');

		if ($val->run())
		{
			$admin_cadastro->title = Input::post('title');
			$admin_cadastro->abstract = Input::post('abstract');
			$admin_cadastro->full_text = Input::post('full_text');
			$admin_cadastro->project_id = Input::post('project_id');
			$admin_cadastro->is_draft = Input::post('is_draft');
			$admin_cadastro->order = Input::post('order');

			if ($admin_cadastro->save())
			{
				Session::set_flash('success', e('Updated admin_cadastro #' . $id));

				Response::redirect('admin/admin/cadastro');
			}

			else
			{
				Session::set_flash('error', e('Could not update admin_cadastro #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$admin_cadastro->title = $val->validated('title');
				$admin_cadastro->abstract = $val->validated('abstract');
				$admin_cadastro->full_text = $val->validated('full_text');
				$admin_cadastro->project_id = $val->validated('project_id');
				$admin_cadastro->is_draft = $val->validated('is_draft');
				$admin_cadastro->order = $val->validated('order');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('admin_cadastro', $admin_cadastro, false);
		}

		$this->template->title = "Admin_cadastros";
		$this->template->content = View::forge('admin/admin/cadastro/edit');

	}

	public function action_delete($id = null)
	{
		if ($admin_cadastro = Model_Admin_Cadastro::find($id))
		{
			$admin_cadastro->delete();

			Session::set_flash('success', e('Deleted admin_cadastro #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete admin_cadastro #'.$id));
		}

		Response::redirect('admin/admin/cadastro');

	}


}