<?php
/**
 * Copyright 2015 OpenStack Foundation
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 **/

namespace jwt\utils;
use jwt\IJWTClaimSet;
use utils\Base64UrlRepresentation;

/**
 * Class JWTClaimSetAssembler
 * @package jwt\utils
 */
class JWTClaimSetAssembler extends JWTRawAssembler{

    /**
     * @param IJWTClaimSet $claim_set
     * @return string
     */
    public static function serialize(IJWTClaimSet $claim_set){
        $json = $claim_set->toJson();
        return parent::serialize($json);
    }

    /***
     * @param $input
     * @return IJWTClaimSet
     */
    public static function unSerialize($input){
        $json        = parent::unSerialize($input);
        $raw_claims  = json_decode($json, true);

        return  JWTClaimSetFactory::build($raw_claims);
    }

}