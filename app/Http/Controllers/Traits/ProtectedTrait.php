<?php namespace DarkShare\Http\Controllers\Traits;

use DarkShare\Contracts\Models\Protectable;
use Illuminate\Session\Store;

trait ProtectedTrait {

	protected function protect(Protectable $model, Store $session)
	{
		$modelName = $this->getModelName($model);

		return $model->isProtected() && ! $session->get($modelName.'_auth');
	}

	private function getModelName(Protectable $model)
	{
		return $model->modelName();
	}
}
