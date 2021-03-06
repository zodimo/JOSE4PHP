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

namespace jwe\compression_algorithms\impl;


use jwe\compression_algorithms\CompressionAlgorithm;
use jwe\compression_algorithms\CompressionAlgorithmsNames;

/**
 * Class Deflate
 * @package jwe\compression_algorithms\impl
 */
final class Deflate extends CompressionAlgorithm
{

    /**
     * @return string
     */
    public function getName()
    {
        return CompressionAlgorithmsNames::Deflate;
    }

    /**
     * @param string $data
     * @return string
     */
    public function compress($data)
    {
        return gzdeflate($data, $this->getCompressionLevel());
    }

    /**
     * @param string $data
     * @return string
     */
    public function uncompress($data)
    {
        return gzinflate($data);
    }
}