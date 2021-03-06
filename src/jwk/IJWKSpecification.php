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

namespace jwk;

/**
 * Interface IJWKSpecification
 * @package jwk
 */
interface IJWKSpecification {

    /**
     * The "alg" (algorithm) parameter identifies the algorithm intended for
     * use with the key
     * @return string
     */
    public function getAlg();

    /**
     * https://tools.ietf.org/html/rfc7517#section-4.2
     *
     * The "use" (public key use) parameter identifies the intended use of
     * the public key.  The "use" parameter is employed to indicate whether
     * a public key is used for encrypting data or verifying the signature
     * on data.
     * @return string
     */
    public function getUse();

    /**
     * @return string
     */
    public function getKeyId();

}