<?php

namespace WordPruss\Notices;

/**
 * Notice
 *
 * Notices displayed near the top of admin pages.
 * The hook function should echo a message to be displayed.
 * @see https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
 *
 * @author Mystro Ken <mystroken@gmail.com>
 * @since v1.0
 */
class Notice
{

    /**
     * @var string $type
     */
	protected $type;

    /**
     * @var bool $isRemovable
     */
	protected $isRemovable;

    /**
     * @var string $message
     */
	protected $message;

    /**
     * @var array $allowedTypes
     */
    protected $allowedTypes = [
        'info',
        'error',
        'success',
        'warning',
    ];


    /**
     * Notice constructor.
     *
     * @param string $type
     * @param string $message
     * @param bool $isRemovable
     */
    public function __construct($type, $message, $isRemovable = true)
    {
        $this->type = $type;
        $this->message = $message;
        $this->isRemovable = $isRemovable;
    }

    /**
     * Generate the className of the Notice
     *
     * @return string
     */
	protected function generateClassName()
	{
	    // Set the first required className
		$className = 'notice';

		// Add specific className from type
        if( array_key_exists($this->type, $this->allowedTypes) ) $className .= ' notice-' . $this->type;

        // Add specific className for a removable notice
        if( true === $this->isRemovable ) $className .= ' is-dismissible';

		return $className;
	}

	public function __toString()
	{
		return '<div class="'. $this->generateClassName() .'"><p>'. $this->message .'</p></div>';
	}

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRemovable()
    {
        return $this->isRemovable;
    }

    /**
     * @param bool $isRemovable
     * @return $this
     */
    public function removable($isRemovable)
    {
        $this->isRemovable = $isRemovable;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}