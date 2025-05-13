<?php

namespace BambooHR\SDK\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use BambooHR\SDK\Tests\Unit\Model\TestModel;

class AbstractModelTest extends TestCase {

	public function testJsonSerialize() {
		$model = new TestModel();
		$model->testProperty = 'test value';
		$model->anotherProperty = 123;
		$model->snake_case_property = 'snake value';

		$json = json_encode($model);
		$data = json_decode($json, true);

		$this->assertArrayHasKey('testProperty', $data);
		$this->assertArrayHasKey('anotherProperty', $data);
		$this->assertArrayHasKey('snake_case_property', $data);

		$this->assertEquals('test value', $data['testProperty']);
		$this->assertEquals(123, $data['anotherProperty']);
		$this->assertEquals('snake value', $data['snake_case_property']);
	}

	public function testToArray() {
		$model = new TestModel();
		$model->testProperty = 'test value';
		$model->anotherProperty = 123;

		$array = $model->toArray();

		$this->assertArrayHasKey('testProperty', $array);
		$this->assertArrayHasKey('anotherProperty', $array);

		$this->assertEquals('test value', $array['testProperty']);
		$this->assertEquals(123, $array['anotherProperty']);
	}

	public function testFromArray() {
		$data = [
			'testProperty' => 'test value',
			'anotherProperty' => 123,
			'snake_case_property' => 'snake value',
			'unknown_property' => 'should be ignored'
		];

		$model = TestModel::fromArray($data);

		$this->assertEquals('test value', $model->testProperty);
		$this->assertEquals(123, $model->anotherProperty);
		$this->assertEquals('snake value', $model->snake_case_property);
	}

	public function testNullValuesAreSkippedInJsonSerialize() {
		$model = new TestModel();
		$model->testProperty = 'test value';
		// Leave other properties as null

		$json = json_encode($model);
		$data = json_decode($json, true);

		$this->assertArrayHasKey('testProperty', $data);
		$this->assertArrayNotHasKey('anotherProperty', $data);
		$this->assertArrayNotHasKey('camel_case_property', $data);
	}
}
