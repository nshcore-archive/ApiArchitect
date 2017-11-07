<?php

	namespace Healer\Api\Http\Requests;

	use Psr\Http\Message\ServerRequestInterface;
	use Jkirkby91\LumenRestServerComponent\Http\Requests\AbstractValidateRequest;

	/**
	 * Class ExampleRequest
	 *
	 * @package Healer\Api\Http\Requests
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class ExampleRequest extends AbstractValidateRequest
	{

		/**
		 * rules()
		 * @return array
		 */
		public function rules()
		{
			return [
				'POST'    => [
					'profile_id' => 'required|max:255'
				]
			];
		}

	}
