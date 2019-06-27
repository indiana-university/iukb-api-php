<?php
declare(strict_types=1);
/**
 * This file contains the Content trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Traits;

/**
 * This trait represents some content
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Content
{
    /** @var The given content of this item */
    private $content;
    
    /**
     * Get the content for this item
     *
     * @return string The content for this item
     */
    public function getContent(): string
    {
        return $this->content;
    }
    
    /**
     * Set the content for this item
     *
     * @param string $input The content for this time
     * @return object The instance of this object
     */
    public function setContent(string $input)
    {
        $this->content = $input;
        return $this;
    }
}
