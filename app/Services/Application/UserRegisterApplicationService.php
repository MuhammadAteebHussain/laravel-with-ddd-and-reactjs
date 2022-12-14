<?php

namespace App\Services\Application;

use App\Components\CustomStatusCodes;
use App\Abstracts\AbstractUsers;
use App\Services\Domain\UserRegisterDomainService;
use App\Services\Application\Contracts\ApplicationServiceInterface;
use App\Services\General\GeneralResponseService;

class UserRegisterApplicationService extends AbstractUsers implements ApplicationServiceInterface
{
    protected $user_register_service;

    const USER_REGISTER_FAILED_MESSAGE = 'Invalid User Name or Password';
    const USER_REGISTER_SUCCESSFULLY = 'Register Successfully';

    public function __construct(UserRegisterDomainService $user_register_service)
    {
        $this->user_register_service = $user_register_service;
    }

    public function execute($request) : array
    {
        try {
            $data['name'] = $request['name'];
            $data['email'] = $request['email'];
            $data['password'] = bcrypt($request['password']);
            $content = $this->user_register_service->execute($data);
            $result['code'] = CustomStatusCodes::REGISTER_SUCCESS;
            $result['message'] = self::USER_REGISTER_SUCCESSFULLY;
            $result['body'] = $content['token'];
            $result['body']['id'] = $content['user_id'];
            $result['http_code'] = CustomStatusCodes::HTTP_INSERTED_SUCCESS_CODE;
            $result['status'] = CustomStatusCodes::RESPONSE_SUCCESS_TRUE;
            return $result;
        } catch (\Exception $ex) {

            return GeneralResponseService::GenerateMessageByException($ex);
        }
    }
}
