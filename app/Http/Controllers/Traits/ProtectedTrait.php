<?php namespace DarkShare\Http\Controllers\Traits;

use DarkShare\Contracts\Models\Protectable;
use Illuminate\Session\Store;

trait ProtectedTrait {

	/**
	 * Protect model against getting viewed if it's password protected.
	 *
	 * @param Protectable $model
	 * @param Store       $session
	 * @return bool
	 */
	protected function protect(Protectable $model, Store $session)
	{
		$modelName = $this->getModelName($model);

		return ! $model->userHasAccess() && ! $session->get($modelName . '_auth');
	}

	/**
	 * Get the model name
	 *
	 * @param Protectable $model
	 * @return mixed
	 */
	private function getModelName(Protectable $model)
	{
		return $model->modelName();
	}
}
