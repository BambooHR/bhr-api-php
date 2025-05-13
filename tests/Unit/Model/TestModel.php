<?php

namespace BambooHR\SDK\Tests\Unit\Model;

use BambooHR\SDK\Model\AbstractModel;

class TestModel extends AbstractModel {

	public ?string $testProperty = null;
	public ?int $anotherProperty = null;
	public ?string $snake_case_property = null;
}
