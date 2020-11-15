<?php namespace App\Controllers\Cpanel;


class Home extends CpanelController
{
	public function index()
	{
		$data['temp'] = 'cpanel/home';
		echo view('cpanel/layout', $data);
	}

	//--------------------------------------------------------------------

}
