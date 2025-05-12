<?php

namespace BambooHR\SDK\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use BambooHR\SDK\Tests\Unit\Model\TestModel;

class AbstractModelTest extends TestCase {

	public function testJsonSerialize() {
		$model = new TestModel();
		$model->setTestProperty('test value');
		$model->setAnotherProperty(123);
		$model->setCamelCaseProperty('camel value');

		$json = json_encode($model);
		$data = json_decode($json, true);

		$this->assertArrayHasKey('test_property', $data);
		$this->assertArrayHasKey('another_property', $data);
		$this->assertArrayHasKey('camel_case_property', $data);

		$this->assertEquals('test value', $data['test_property']);
		$this->assertEquals(123, $data['another_property']);
		$this->assertEquals('camel value', $data['camel_case_property']);
	}

	public function testToArray() {
		$model = new TestModel();
		$model->setTestProperty('test value');
		$model->setAnotherProperty(123);

		$array = $model->toArray();

		$this->assertArrayHasKey('test_property', $array);
		$this->assertArrayHasKey('another_property', $array);

		$this->assertEquals('test value', $array['test_property']);
		$this->assertEquals(123, $array['another_property']);
	}

	public function testFromArray() {
		$data = [
			'test_property' => 'test value',
			'another_property' => 123,
			'camel_case_property' => 'camel value',
			'unknown_property' => 'should be ignored'
		];

		$model = TestModel::fromArray($data);

		$this->assertEquals('test value', $model->getTestProperty());
		$this->assertEquals(123, $model->getAnotherProperty());
		$this->assertEquals('camel value', $model->getCamelCaseProperty());
	}

	public function testNullValuesAreSkippedInJsonSerialize() {
		$model = new TestModel();
		$model->setTestProperty('test value');
		// Leave other properties as null

		$json = json_encode($model);
		$data = json_decode($json, true);

		$this->assertArrayHasKey('test_property', $data);
		$this->assertArrayNotHasKey('another_property', $data);
		$this->assertArrayNotHasKey('camel_case_property', $data);
	}
}
