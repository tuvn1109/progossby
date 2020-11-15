<?php namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
	public function index()
	{
		if (session('user')) {
			return redirect()->to('/');
		} else {
			$data = [];
			echo view('cpanel/singin', $data);
		}
	}


	public function submitsignin()
	{
		$model = new UsersModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		if ($username && $password) {
			$checkUser = $model->getUserByUsername($username, $password);
			if ($checkUser) {
				session()->set(['user' => $checkUser]);
				$JSON = [
					'stt' => true,
					'error' => 0,
				];
			} else {
				$JSON = [
					'stt' => false,
					'error' => 0,
				];
			}
		} else {
			$JSON = [
				'stt' => false,
				'error' => 1,
			];
		}
		echo json_encode($JSON);
	}

	public function submitsignout()
	{
		session()->destroy();
		return redirect()->to('/');
	}

	//--------------------------------------------------------------------

}
