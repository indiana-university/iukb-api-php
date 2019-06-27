<?php
declare(strict_types=1);
/**
 * This file contains the BirthDate trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a birthDate
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait BirthDate
{
    /** @var The given birthDate of this item */
    private $birthDate;
    
    /**
     * Get the birthDate for this item
     *
     * @return \DateTime The birthDate for this item
     */
    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }
    
    /**
     * Set the birthDate for this item
     *
     * @param string $input The birthDate for this time
     * @return object The instance of this object
     */
    public function setBirthDate(\DateTime $input)
    {
        $this->birthDate = $input;
        return $this;
    }
}
