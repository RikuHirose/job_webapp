<?php

namespace App\Repositories\User;

Use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

		public function getBlankModel()
		{
			return new User();
		}
}
