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

namespace jwe\impl;

use jwe\IJWEJOSEHeader;
use jwt\utils\JWTRawSerializer;

/**
 * Class JWEJOSEHeaderSerializer
 * @package jwe\impl
 * @access internal
 */
final class JWEJOSEHeaderSerializer {

    public static function serialize(IJWEJOSEHeader $header)
    {
        $json = $header->toJson();
        return JWTRawSerializer::serialize($json);
    }

    /**
     * @param string $input
     * @return IJWEJOSEHeader
     */
    public static function deserialize($input)
    {
        $json        = JWTRawSerializer::deserialize($input);
        $raw_headers = json_decode($json, true);

        return JWEJOSEHeaderFactory::build($raw_headers);
    }
}