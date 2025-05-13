<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Represents an employee in the BambooHR system.
 */
class Employee extends AbstractModel {

	// Basic information
	public ?int $id = null;
	public ?string $firstName = null;
	public ?string $lastName = null;
	public ?string $middleName = null;
	public ?string $preferredName = null;
	public ?string $gender = null;
	public ?string $dateOfBirth = null;
	public ?int $age = null;
	public ?string $birthday = null;
	public ?string $maritalStatus = null;

	// Contact information
	public ?string $address1 = null;
	public ?string $address2 = null;
	public ?string $city = null;
	public ?string $state = null;
	public ?string $stateCode = null;
	public ?string $zipcode = null;
	public ?string $country = null;
	public ?string $workEmail = null;
	public ?string $homeEmail = null;
	public ?string $bestEmail = null;
	public ?string $workPhone = null;
	public ?string $workPhoneExtension = null;
	public ?string $workPhonePlusExtension = null;
	public ?string $homePhone = null;
	public ?string $mobilePhone = null;

	// Employment information
	public ?string $jobTitle = null;
	public ?string $department = null;
	public ?string $location = null;
	public ?string $division = null;
	public ?string $status = null;
	public ?string $employeeNumber = null;
	public ?string $hireDate = null;
	public ?string $originalHireDate = null;
	public ?string $terminationDate = null;
	public ?string $supervisor = null;
	public ?int $supervisorId = null;
	public ?int $supervisorEId = null;
	public ?string $supervisorEmail = null;
	public ?string $eeo = null;
	public ?string $acaStatusCategory = null;

	// Compensation information
	public ?string $payType = null;
	public ?string $paidPer = null;
	public ?string $payRate = null;
	public ?string $payRateEffectiveDate = null;
	public ?string $payChangeReason = null;
	public ?string $payGroup = null;
	public ?int $payGroupId = null;
	public ?string $paySchedule = null;
	public ?int $payScheduleId = null;
	public ?string $payFrequency = null;
	public ?bool $includeInPayroll = null;
	public ?bool $timeTrackingEnabled = null;
	public ?int $standardHoursPerWeek = null;

	// Bonus and commission information
	public ?string $bonusAmount = null;
	public ?string $bonusComment = null;
	public ?string $bonusDate = null;
	public ?string $bonusReason = null;
	public ?string $commissionAmount = null;
	public ?string $commissionComment = null;
	public ?string $commissionDate = null;

	// Identification information
	public ?string $ssn = null;
	public ?string $sin = null;
	public ?string $nationalId = null;
	public ?string $nationality = null;
	public ?string $nin = null;

	// Other information
	public ?string $photoUrl = null;
	public ?bool $isPhotoUploaded = null;
	public ?string $linkedIn = null;
	public ?string $lastChanged = null;
	public ?int $createdByUserId = null;
	public ?array $customFields = null;

	/**
	 * Get a specific custom field value.
	 *
	 * @param string $fieldName The name of the custom field
	 * @return mixed|null The value of the custom field or null if not found
	 */
	public function getCustomField(string $fieldName): mixed {
		if ($this->customFields === null || !isset($this->customFields[$fieldName])) {
			return null;
		}

		return $this->customFields[$fieldName];
	}

	/**
	 * Set a specific custom field value.
	 *
	 * @param string $fieldName The name of the custom field
	 * @param mixed  $value     The value to set
	 * @return self
	 */
	public function setCustomField(string $fieldName, mixed $value): self {
		if ($this->customFields === null) {
			$this->customFields = [];
		}

		$this->customFields[$fieldName] = $value;
		return $this;
	}

	/**
	 * Get the employee's full name.
	 *
	 * @return string|null
	 */
	public function getFullName(): ?string {
		if ($this->firstName === null || $this->lastName === null) {
			return null;
		}

		return $this->firstName . ' ' . $this->lastName;
	}

	/**
	 * Get the employee's display name (preferred name or full name).
	 *
	 * @return string|null
	 */
	public function getDisplayName(): ?string {
		if ($this->preferredName !== null) {
			return $this->preferredName;
		}

		return $this->getFullName();
	}
}
