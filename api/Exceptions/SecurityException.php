<?php

	namespace Healer\Api\Exceptions;

	use Jkirkby91\Boilers\RestServerBoiler\Exceptions\AccessDeniedHttpException;

	/**
	 * Class SecurityException
	 *
	 * @package Healer\Api\Exceptions
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class SecurityException extends AccessDeniedHttpException
	{
		/**
		 * SecurityException constructor.
		 *
		 * @param string $message
		 */
		public function __construct($message = 'not acceptable security violation')
		{
			parent::__construct($message);
		}

	}
