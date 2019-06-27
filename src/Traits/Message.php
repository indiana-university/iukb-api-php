<?php
declare(strict_types=1);
/**
 * This file contains the Message trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents a message
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Message
{
    /** @var The given message of this item */
    private $message;
    
    /**
     * Get the message for this item
     *
     * @return string The message for this item
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    
    /**
     * Set the message for this item
     *
     * @param string $input The message for this time
     * @return object The instance of this object
     */
    public function setMessage(string $input)
    {
        $this->message = $input;
        return $this;
    }
}
