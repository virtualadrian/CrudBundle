<?php
/*
 * Copyright (c) 2017, whatwedo GmbH
 * All rights reserved
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 * IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
 * NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 * WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace whatwedo\CrudBundle\Normalizer;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use whatwedo\CrudBundle\Definition\DefinitionInterface;

/**
 * @author Nicolo Singer <nicolo@whatwedo.ch>
 */
class WhatwedoObjectNormalizer extends ObjectNormalizer
{
    /**
     * @var DefinitionInterface $definition
     */
    private $definition;

    /**
     * WhatwedoObjectNormalizer constructor.
     * @param DefinitionInterface $definition
     */
    public function __construct(DefinitionInterface $definition)
    {
        parent::__construct(null, null, null, null);
        $this->definition = $definition;
    }

    /**
     * @param object|string $classOrObject
     * @param array $context
     * @param bool $attributesAsString
     * @return array
     */
    protected function getAllowedAttributes($classOrObject, array $context, $attributesAsString = false)
    {
        return $this->definition->getExportAttributes();
    }
}
