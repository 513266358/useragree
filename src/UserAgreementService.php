<?php

namespace Useragree\UseragreeService;

use App\Models\UserAgreementRecord;

class UserAgreementService
{
    public function saveUserAgreementRecord($requestParams, $user)
    {
        if (isset($requestParams["service_agreement"]) && isset($requestParams["service_agreement_time"]) && isset($requestParams["privacy_agreement"]) && isset($requestParams["privacy_agreement_time"])) {
            $userAgreementRecord = [
                'service_agreement'      => $requestParams['service_agreement'],
                'service_agreement_time' => $requestParams['service_agreement_time'],
                'privacy_agreement'      => $requestParams['privacy_agreement'],
                'privacy_agreement_time' => $requestParams['privacy_agreement_time'],
                'user_id'                => $user['id'],
                'user_name'              => $user['nick_name'],
                'cust_order_id'          => $requestParams['cust_order_id'] ?? '',
                'consignee_info'         => $requestParams['consignee_info'] ?? '',
                'telephone'              => $requestParams['telephone'] ?? '',
                'province_name'          => $requestParams['province_name'] ?? '',
                'city_name'              => $requestParams['city_name'] ?? '',
                'area_name'              => $requestParams['area_name'] ?? '',
                'receiving_address'      => ($requestParams['province_name'] . $requestParams['city_name'] . $requestParams['area_name'] . $requestParams['receiving_address']) ?? '',
                'source'                 => $requestParams['source'],
                'type'                   => $requestParams['type'],
            ];
            $res = UserAgreementRecord::query()->create($userAgreementRecord);
            return $res;
        }
        return false;
    }

}
