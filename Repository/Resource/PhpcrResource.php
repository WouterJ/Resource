<?php

namespace Symfony\Cmf\Component\Resource\Repository\Resource;

use Puli\Repository\Api\Resource\Resource;
use PHPCR\NodeInterface;
use Symfony\Cmf\Component\Resource\Repository\Resource\Metadata\PhpcrMetadata;
use Puli\Repository\Resource\GenericResource;

/**
 * Resource representing a PHPCR node
 *
 * @author Daniel Leech <daniel@dantleech.com>
 */
class PhpcrResource extends CmfResource
{
    private $node;

    /**
     * @param string        $path
     * @param NodeInterface $node
     */
    public function __construct($path, NodeInterface $node)
    {
        parent::__construct($path);
        $this->node = $node;
    }

    /**
     * {@inheritDoc}
     */
    public function getPayload()
    {
        return $this->node;
    }

    /**
     * {@inheritDoc}
     */
    public function getPayloadType()
    {
        return $this->node->getPrimaryNodeType()->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return new PhpcrMetadata($this->node);
    }
}
