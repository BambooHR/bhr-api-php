<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Represents an employee entry in the company directory.
 */
class DirectoryEntry extends AbstractModel {
    public ?int $id = null;
    public ?string $displayName = null;
    public ?string $firstName = null;
    public ?string $lastName = null;
    public ?string $preferredName = null;
    public ?string $gender = null;
    public ?string $jobTitle = null;
    public ?string $department = null;
    public ?string $location = null;
    public ?string $workPhone = null;
    public ?string $workPhoneExtension = null;
    public ?string $mobilePhone = null;
    public ?string $workEmail = null;
    public ?string $photoUrl = null;
    public ?string $canUploadPhoto = null;
    public ?string $skypeUsername = null;
    public ?string $facebook = null;


    
    /**
     * Get the employee's full name (first + last).
     *
     * @return string
     */
    public function getFullName(): string {
        $name = '';
        
        if ($this->firstName) {
            $name = $this->firstName;
        }
        
        if ($this->lastName) {
            $name = $name ? "$name {$this->lastName}" : $this->lastName;
        }
        
        return $name ?: 'Unknown';
    }

    /**
     * Get the employee's formatted display name (preferred name or first name).
     *
     * @return string
     */
    public function getFormattedDisplayName(): string {
        return $this->displayName ?: $this->preferredName ?: $this->firstName ?: 'Unknown';
    }
}
