<?php namespace DarkShare\Http\Controllers\Traits;

trait ProtectedTrait {

	private function protect(Protectable $model, Store $session)
	{
		if($model->isProtected && ! $session->get('snippet_auth'))
			return redirect()->route('snippets.login', $model->id);
	}
}
