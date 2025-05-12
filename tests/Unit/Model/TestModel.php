<?php

namespace BambooHR\SDK\Tests\Unit\Model;

class TestModel extends \BambooHR\SDK\Model\AbstractModel {

	protected ?string $testProperty = null;
	protected ?int $anotherProperty = null;
	protected ?string $camelCaseProperty = null;

	public function getTestProperty(): ?string {
		return $this->testProperty;
	}

	public function setTestProperty(?string $testProperty): self {
		$this->testProperty = $testProperty;
		return $this;
	}

	public function getAnotherProperty(): ?int {
		return $this->anotherProperty;
	}

	public function setAnotherProperty(?int $anotherProperty): self {
		$this->anotherProperty = $anotherProperty;
		return $this;
	}

	public function getCamelCaseProperty(): ?string {
		return $this->camelCaseProperty;
	}

	public function setCamelCaseProperty(?string $camelCaseProperty): self {
		$this->camelCaseProperty = $camelCaseProperty;
		return $this;
	}
}
