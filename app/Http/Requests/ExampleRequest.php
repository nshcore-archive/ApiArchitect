<?php

namespace App\Http\Requests;

use Psr\Http\Message\ServerRequestInterface;
use Jkirkby91\LumenRestServerComponent\Http\Requests\AbstractValidateRequest;

/**
 * Class ExampleRequest
 *
 * @package Api\Requests
 * @author James Kirkby <me@jameskirkby.com>
 */
class ExampleRequest extends AbstractValidateRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author James Kirkby <me@jameskirkby.com>
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
