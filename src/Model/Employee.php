<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Represents an employee in the BambooHR system.
 */
class Employee extends AbstractModel {

	protected ?int $id = null;
	protected ?string $firstName = null;
	protected ?string $lastName = null;
	protected ?string $preferredName = null;
	protected ?string $jobTitle = null;
	protected ?string $workEmail = null;
	protected ?string $mobilePhone = null;
	protected ?string $workPhone = null;
	protected ?string $department = null;
	protected ?string $location = null;
	protected ?string $division = null;
	protected ?string $status = null;
	protected ?string $hireDate = null;
	protected ?string $terminationDate = null;
	protected ?string $supervisor = null;
	protected ?string $photoUrl = null;
	protected ?string $linkedIn = null;
	protected ?array $customFields = null;

	/**
	 * Get the employee ID.
	 *
	 * @return int|null
	 */
	public function getId(): ?int {
		return $this->id;
	}

	/**
	 * Set the employee ID.
	 *
	 * @param int $id
	 * @return self
	 * @throws \InvalidArgumentException If ID is not positive
	 */
	public function setId(int $id): self {
		if ($id <= 0) {
			throw new \InvalidArgumentException('Employee ID must be a positive integer');
		}

		$this->id = $id;
		return $this;
	}

	/**
	 * Get the employee's first name.
	 *
	 * @return string|null
	 */
	public function getFirstName(): ?string {
		return $this->firstName;
	}

	/**
	 * Set the employee's first name.
	 *
	 * @param string $firstName
	 * @return self
	 * @throws \InvalidArgumentException If first name is empty
	 */
	public function setFirstName(string $firstName): self {
		$firstName = trim($firstName);
		if (empty($firstName)) {
			throw new \InvalidArgumentException('First name cannot be empty');
		}

		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * Get the employee's last name.
	 *
	 * @return string|null
	 */
	public function getLastName(): ?string {
		return $this->lastName;
	}

	/**
	 * Set the employee's last name.
	 *
	 * @param string $lastName
	 * @return self
	 * @throws \InvalidArgumentException If last name is empty
	 */
	public function setLastName(string $lastName): self {
		$lastName = trim($lastName);
		if (empty($lastName)) {
			throw new \InvalidArgumentException('Last name cannot be empty');
		}

		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * Get the employee's preferred name.
	 *
	 * @return string|null
	 */
	public function getPreferredName(): ?string {
		return $this->preferredName;
	}

	/**
	 * Set the employee's preferred name.
	 *
	 * @param string $preferredName
	 * @return self
	 */
	public function setPreferredName(string $preferredName): self {
		$this->preferredName = trim($preferredName);
		return $this;
	}

	/**
	 * Get the employee's job title.
	 *
	 * @return string|null
	 */
	public function getJobTitle(): ?string {
		return $this->jobTitle;
	}

	/**
	 * Set the employee's job title.
	 *
	 * @param string|null $jobTitle
	 * @return self
	 */
	public function setJobTitle(?string $jobTitle): self {
		$this->jobTitle = $jobTitle;
		return $this;
	}

	/**
	 * Get the employee's work email.
	 *
	 * @return string|null
	 */
	public function getWorkEmail(): ?string {
		return $this->workEmail;
	}

	/**
	 * Set the employee's work email.
	 *
	 * @param string|null $workEmail
	 * @return self
	 */
	public function setWorkEmail(?string $workEmail): self {
		$this->workEmail = $workEmail;
		return $this;
	}

	/**
	 * Get the employee's mobile phone.
	 *
	 * @return string|null
	 */
	public function getMobilePhone(): ?string {
		return $this->mobilePhone;
	}

	/**
	 * Set the employee's mobile phone.
	 *
	 * @param string $mobilePhone
	 * @return self
	 */
	public function setMobilePhone(string $mobilePhone): self {
		$this->mobilePhone = trim($mobilePhone);
		return $this;
	}

	/**
	 * Get the employee's work phone.
	 *
	 * @return string|null
	 */
	public function getWorkPhone(): ?string {
		return $this->workPhone;
	}

	/**
	 * Set the employee's work phone.
	 *
	 * @param string $workPhone
	 * @return self
	 */
	public function setWorkPhone(string $workPhone): self {
		$this->workPhone = trim($workPhone);
		return $this;
	}

	/**
	 * Get the employee's department.
	 *
	 * @return string|null
	 */
	public function getDepartment(): ?string {
		return $this->department;
	}

	/**
	 * Set the employee's department.
	 *
	 * @param string|null $department
	 * @return self
	 */
	public function setDepartment(?string $department): self {
		$this->department = $department;
		return $this;
	}

	/**
	 * Get the employee's location.
	 *
	 * @return string|null
	 */
	public function getLocation(): ?string {
		return $this->location;
	}

	/**
	 * Set the employee's location.
	 *
	 * @param string|null $location
	 * @return self
	 */
	public function setLocation(?string $location): self {
		$this->location = $location;
		return $this;
	}

	/**
	 * Get the employee's division.
	 *
	 * @return string|null
	 */
	public function getDivision(): ?string {
		return $this->division;
	}

	/**
	 * Set the employee's division.
	 *
	 * @param string|null $division
	 * @return self
	 */
	public function setDivision(?string $division): self {
		$this->division = $division;
		return $this;
	}

	/**
	 * Get the employee's status.
	 *
	 * @return string|null
	 */
	public function getStatus(): ?string {
		return $this->status;
	}

	/**
	 * Set the employee's status.
	 *
	 * @param string|null $status
	 * @return self
	 */
	public function setStatus(?string $status): self {
		$this->status = $status;
		return $this;
	}

	/**
	 * Get the employee's hire date.
	 *
	 * @return string|null
	 */
	public function getHireDate(): ?string {
		return $this->hireDate;
	}

	/**
	 * Set the employee's hire date.
	 *
	 * @param string|null $hireDate
	 * @return self
	 */
	public function setHireDate(?string $hireDate): self {
		$this->hireDate = $hireDate;
		return $this;
	}

	/**
	 * Get the employee's termination date.
	 *
	 * @return string|null
	 */
	public function getTerminationDate(): ?string {
		return $this->terminationDate;
	}

	/**
	 * Set the employee's termination date.
	 *
	 * @param string|null $terminationDate
	 * @return self
	 */
	public function setTerminationDate(?string $terminationDate): self {
		$this->terminationDate = $terminationDate;
		return $this;
	}

	/**
	 * Get the employee's supervisor.
	 *
	 * @return string|null
	 */
	public function getSupervisor(): ?string {
		return $this->supervisor;
	}

	/**
	 * Set the employee's supervisor.
	 *
	 * @param string $supervisor
	 * @return self
	 */
	public function setSupervisor(string $supervisor): self {
		$this->supervisor = trim($supervisor);
		return $this;
	}

	/**
	 * Get the employee's photo URL.
	 *
	 * @return string|null
	 */
	public function getPhotoUrl(): ?string {
		return $this->photoUrl;
	}

	/**
	 * Set the employee's photo URL.
	 *
	 * @param string|null $photoUrl
	 * @return self
	 */
	public function setPhotoUrl(?string $photoUrl): self {
		$this->photoUrl = $photoUrl;
		return $this;
	}

	/**
	 * Get the employee's LinkedIn profile URL.
	 *
	 * @return string|null
	 */
	public function getLinkedIn(): ?string {
		return $this->linkedIn;
	}

	/**
	 * Set the employee's LinkedIn profile URL.
	 *
	 * @param string|null $linkedIn
	 * @return self
	 */
	public function setLinkedIn(?string $linkedIn): self {
		$this->linkedIn = $linkedIn;
		return $this;
	}

	/**
	 * Get the employee's custom fields.
	 *
	 * @return array|null
	 */
	public function getCustomFields(): ?array {
		return $this->customFields;
	}

	/**
	 * Set the employee's custom fields.
	 *
	 * @param array|null $customFields
	 * @return self
	 */
	public function setCustomFields(?array $customFields): self {
		$this->customFields = $customFields;
		return $this;
	}

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
