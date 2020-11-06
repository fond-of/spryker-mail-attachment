<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\MailAttachment\Business;

use FondOfSpryker\Zed\MailAttachment\Business\Model\Expander\ExpanderInterface;
use FondOfSpryker\Zed\MailAttachment\Business\Model\Expander\MailAttachmentExpander;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class MailAttachmentBusinessFactory
 *
 * @package FondOfSpryker\Zed\MailAttachment\Business
 *
 * @method \FondOfSpryker\Zed\MailAttachment\MailAttachmentConfig getConfig()
 */
class MailAttachmentBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\MailAttachment\Business\Model\Expander\ExpanderInterface
     */
    public function createMailAttachmentExpander(): ExpanderInterface
    {
        return new MailAttachmentExpander($this->getConfig());
    }
}
