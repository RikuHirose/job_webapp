<?php

namespace App\Repositories\Company;

Use App\Models\Company;
use App\Repositories\Base\BaseRepository;

class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{

		public function getBlankModel()
		{
			return new Company();
		}
}
