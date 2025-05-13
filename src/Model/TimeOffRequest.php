<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

use DateTime;

/**
 * Represents a time off request in the BambooHR system.
 */
class TimeOffRequest extends AbstractModel {
	public ?int $id = null;
	public ?int $employeeId = null;
	public ?string $name = null;
	public ?array $status = null;
	public ?string $start = null;
	public ?string $end = null;
	public ?string $created = null;
	public ?array $type = null;
	public ?array $amount = null;
	public ?array $notes = null;
	public ?array $dates = null;
	public ?array $actions = null;

	/**
	 * Get the status value.
	 *
	 * @return string|null
	 */
	public function getStatusValue(): ?string {
		return $this->status['status'] ?? null;
	}

	/**
	 * Get the status last changed date.
	 *
	 * @return string|null
	 */
	public function getStatusLastChanged(): ?string {
		return $this->status['lastChanged'] ?? null;
	}

	/**
	 * Get the ID of the user who last changed the status.
	 *
	 * @return string|null
	 */
	public function getStatusLastChangedByUserId(): ?string {
		return $this->status['lastChangedByUserId'] ?? null;
	}

	/**
	 * Get the type ID.
	 *
	 * @return string|null
	 */
	public function getTypeId(): ?string {
		return $this->type['id'] ?? null;
	}

	/**
	 * Get the type name.
	 *
	 * @return string|null
	 */
	public function getTypeName(): ?string {
		return $this->type['name'] ?? null;
	}

	/**
	 * Get the type icon.
	 *
	 * @return string|null
	 */
	public function getTypeIcon(): ?string {
		return $this->type['icon'] ?? null;
	}

	/**
	 * Get the amount value.
	 *
	 * @return string|null
	 */
	public function getAmountValue(): ?string {
		return $this->amount['amount'] ?? null;
	}

	/**
	 * Get the amount unit.
	 *
	 * @return string|null
	 */
	public function getAmountUnit(): ?string {
		return $this->amount['unit'] ?? null;
	}

	/**
	 * Get the amount as a float value.
	 *
	 * @return float|null
	 */
	public function getAmountAsFloat(): ?float {
		$amount = $this->amount['amount'] ?? null;

		return $amount !== null ? (float)$amount : null;
	}

	/**
	 * Get the employee notes.
	 *
	 * @return string|null
	 */
	public function getEmployeeNotes(): ?string {
		return $this->notes['employee'] ?? null;
	}

	/**
	 * Get the manager notes.
	 *
	 * @return string|null
	 */
	public function getManagerNotes(): ?string {
		return $this->notes['manager'] ?? null;
	}

	/**
	 * Check if the time off request is approved.
	 *
	 * @return bool
	 */
	public function isApproved(): bool {
		return $this->getStatusValue() === 'approved';
	}

	/**
	 * Check if the time off request is pending.
	 *
	 * @return bool
	 */
	public function isPending(): bool {
		return $this->getStatusValue() === 'requested';
	}

	/**
	 * Check if the time off request is denied.
	 *
	 * @return bool
	 */
	public function isDenied(): bool {
		return $this->getStatusValue() === 'denied';
	}

	/**
	 * Check if the time off request is canceled.
	 *
	 * @return bool
	 */
	public function isCanceled(): bool {
		return $this->getStatusValue() === 'canceled';
	}

	/**
	 * Calculate the duration in days.
	 *
	 * @return int
	 * @throws \Exception
	 */
	public function getDurationDays(): int {
		if (!$this->start || !$this->end) {
			return 0;
		}

		$startDate = new DateTime($this->start);
		$endDate = new DateTime($this->end);
		$interval = $startDate->diff($endDate);

		return $interval->days + 1; // Include both start and end days
	}
}
