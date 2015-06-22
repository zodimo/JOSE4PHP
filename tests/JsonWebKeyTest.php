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
use jwk\impl\RSAJWKFactory;
use jwk\impl\RSAJWKKeyLengthSpecification;
use \jwk\utils\rsa\RSAFacade;
use jwk\impl\RSAJWK;
use jwk\RSAKeysParameters;
use \jwk\JSONWebKeyParameters;
use jwk\JSONWebKeyPublicKeyUseValues;
use jwk\utils\rsa\RSAPublicKey;
use \jwk\impl\RSAJWKPEMPrivateKeySpecification;
use \jwk\impl\JWKSet;
use jwk\impl\RSAJWKParamsPublicKeySpecification;

class JsonWebKeyTest extends PHPUnit_Framework_TestCase {

    static $private_key_pem = <<<PPK
-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAqxyNMb6jgaMpiezj7cV5sFVGiMJ+tSGw4cMxA8Oo0a3Swwvb
KqK+QyijbTl8c5i4nG19aQzPKqAmcRBEH3LoR9qPxJGYirQaNfyHanRIDYcNUDb4
cZRv8a6zb+/psJmNMO6Hh1LMx6L2glKl2zCMOWJW4dW+ad1hSy8pOMEIodfNfBzU
VquQfxh3ndk0wcTqnryhAJrdDbDweM2e4zt1kjpfLch17FZnBCJVVHpSbn+Z+Ohu
+Ncc5Cv7zBcDNrs+HkmZ4xCMO+IPTIuphmS74FTTPlmVBziP+Hc2pyv8DTEruQBu
qyHC+oLvz4+gbAzvW9AW2C/Mq8js5db4LolZwwIDAQABAoIBAGp1Gwtl9khDgSaE
sdJO2ETy6S1RBJAg4/GyBR64bqH1qXkcOUEve3xBHlxoNZud2s3H+QyQoZt9hC03
14pRbV63Bldf1i4Fm4EXGhELQ4DXE1tit/PCTFtrO8xa0WPEROm6nat9wlY6d2/h
h7r1W2igXDmpSAyJZWznbJgY0QwPOPjPcKcrgXflrW4y5S92BwKTKtgMAXX80ExY
Rb9P2ovzqd33YSKcoNS77Pkm84iRUIfdY6U3u1HDh/CnPIeM7Hf+kCWLdFeUWFGl
9GDA+shsQNnJ9+I8OW+qLn25ZBNXT47Cc7knSYUD3DaH4FPQAb5Svi1oGobeEG+I
H8HWM+ECgYEA2QaJ8HJEPBltABSnbVztEmlTVQahxt057p4GdCQlmDMjIoDF5ycP
zLxe/Hc8Rhjp1AZopAK18fMnYLA2iWd4adS0/ifAK0BpY/aJQpAdXti7l/qOEf7U
XlsdhUmRHGhwfffqIyBkhYieTsJgNEd73MXa80fksxTegHu9DvNPDQkCgYEAydct
S3I1hkcCyu2JGrHpGE72t7VEqG2tupyBD4ATp9RcBohCpE5TGbNPKKnidywnc/FI
GwI2nJxdoxTZn/PxjCqr00u8GzJKf2ySmCS3+kj2wsE8BlpTRN2Br5u2dm+tj7E6
PiicwDMC6+bF0zZ7xCCfKGjjPcKcReEmnFUYb2sCgYBBmPFepRss0z6YFKYar0jV
FNLkU1HYywt0rX0j470dSO+owSWQXcUvzAwl4WBti6A5vwon8M3P6QARAJIrbAQA
cROX8qnqKNjyJxWL8gV+oqHpKQmCNPU54+6DWB4taP//g0zY+zSHDClVgvkTNDwj
Gga5HBTrcDZkvYICn9ZYCQKBgQCpVIkeY2k+BnL0VcURDTK1fwGCa2N3PdRi2wt3
OobC5OhzXnsyJreWtxRw0903B2bt4P0SE5BHYPM5brOIenopkl7mfAIKeu1+61Is
q5lhMzc5ei1mUv7Kpl43OhYgVF6yTwfCwAWJRQJtcASExo+coZWErEIAPTUndtUS
kF1YkwKBgGDScd0IfYpXkI/jAUkB2kxVW5WVsJQYOn0+Bq4gCNn6MP2Yr7qjCLdi
WgJSDtys/AfjNbqhSUMOgR7U4WCbRYtuifY0nPGJ9b2PM4BsYUG8CPexXq5vfivf
bmMMryEQPGg3pKD9YkkMBa4TmUm5J4CLNP+YM/RVqwa41756NtyQ
-----END RSA PRIVATE KEY-----
PPK;

    public function testCreate(){
        $jwk = RSAJWKFactory::build(new RSAJWKKeyLengthSpecification(2048));
        $this->assertTrue(!is_null($jwk));
    }

    public function testRSAFacade(){

        $keys = RSAFacade::getInstance()->buildKeyPair(2048);

        $this->assertTrue(!is_null($keys));
    }

    public function testCreateFromParams(){

        $jwk = RSAJWKFactory::build(new RSAJWKParamsPublicKeySpecification("0vx7agoebGcQSuuPiLJXZptN9nndrQmbXEps2aiAFbWhM78LhWx4cbbfAAtVT86zwu1RK7aPFFxuhDR1L6tSoc_BJECPebWKRXjBZCiFV4n3oknjhMstn64tZ_2W-5JsGY4Hc5n9yBXArwl93lqt7_RN5w6Cf0h4QyQ5v-65YGjQR0_FDW2QvzqY368QQMicAtaSqzs8KJZgnYb9c7d0zgdAZHzu6qMQvRL5hajrn1n91CbOpbISD08qNLyrdkt-bFTWhAI4vMQFh6WeZu0fM4lFd2NcRwr3XPksINHaQ-G_xBniIqbw0Ls1jF44-csFCur-kEgU8awapJzKnqDKgw", 'AQAB'));
        $jwk->setId('2011-04-29');

        $this->assertTrue(!is_null($jwk));

        $public_key = $jwk->getPublicKey();

        $this->assertTrue($public_key instanceof RSAPublicKey);

    }

    public function testCreateFromPrivateKey(){

        $jwk = RSAJWKFactory::build(new RSAJWKPEMPrivateKeySpecification(self::$private_key_pem));

        $this->assertTrue(!is_null($jwk));
    }

    public function testCreateKeySet(){

        $jwk  = RSAJWKFactory::build(new RSAJWKPEMPrivateKeySpecification(self::$private_key_pem));
        $jwk2 = RSAJWKFactory::build(new RSAJWKKeyLengthSpecification(2048));
        $jwk->setId('k1');
        $jwk2->setId('k2');
        $set = new JWKSet(array($jwk, $jwk2 ));
        $res = $set->toJson();

        $this->assertTrue(!is_null($set));
        $this->assertTrue(!empty($res));
    }
}